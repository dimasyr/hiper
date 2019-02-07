<?php

namespace App\Http\Controllers;

use App\Kendaraan;
use App\Onderdil;
use App\OnderdilKendaraan;
use App\Permintaan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permintaans = new Permintaan();

        if(request()->has('tanggal')){
            $permintaans = $permintaans->where('tanggal', request('tanggal'));
        }

        if(request()->has('bulan') && (request('bulan') != null)){
            $permintaans = $permintaans->where('tanggal', 'like', '%'.request('bulan').'%');
        }

        if(request()->has('sort')){
            $permintaans = $permintaans->orderBy('tanggal', request('sort'));
        }
        else{
            $permintaans = $permintaans->orderBy('tanggal');
        }

        $permintaans = $permintaans->paginate(5)->appends([
            'tanggal' => request('tanggal'),
            'sort' => request('sort'),
            'bulan' => request('bulan')
        ]);

        return view('perbaikan-all', [
            'permintaans' => $permintaans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kendaraan = Kendaraan::all();
        $teknisis = User::where('role_id',3)->get();
        $supirs = User::where('role_id',4)->get();
        $onderdils = Onderdil::all();

        $permintaan = Permintaan::find($id);
        $onderdilkendaraans = OnderdilKendaraan::where('permintaan_id', $id)->get();

        return view('perbaikan-edit', [
            'kendaraan' => $kendaraan,
            'teknisis' => $teknisis,
            'supirs' => $supirs,
            'onderdils' => $onderdils,

            'permintaan' => $permintaan,
            'onderdilkendaraans' => $onderdilkendaraans
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'onderdil_id.*' => 'required',
            'tanggal' => array('required','regex:/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/'),
            'merk.*' => 'required',
            'masa_berlaku.*' => 'required | numeric',
            'tempat_pembelian.*' => 'required',
            'jumlah.*' => 'numeric',
            'harga.*' => 'numeric'
        ], [
            'required' => 'Tidak boleh kosong',
            'numeric' => 'Harus berupa angka',
            'regex' => 'format salah'
        ]);

        if ($validator->fails()) {
            $jum = 0;
            foreach ($request->input('onderdil_id.*') as $index => $value){
                $jum++;
            }

            return redirect()->route('permintaan.edit',[ 'id' => $id])->withInput()
                ->withErrors($validator)->with('jumlah', $jum);
        }

        Permintaan::find($id)->update([
            'supir_id' => $request->supir_id,
            'teknisi_id' => $request->teknisi_id,
            'operator_id' => $request->operator_id,
            'tanggal' => $request->tanggal,
            'kendaraan_id' => $request->plat_nomor,
        ]);

        $onderdilkendaraans = OnderdilKendaraan::where('permintaan_id', $id)->get();

        $total_onderdil = 0;

        foreach ($onderdilkendaraans as $data){
            $total_onderdil++;
        }

        $total_onderdil_terbaru = 0;

        foreach ($request->input('onderdil_id.*') as $index => $value){
            if($index < $total_onderdil){
                $total_onderdil_terbaru++;
                $onderdilkendaraans[$index]->update([
                    'onderdil_id' => $value,
                    'nomor_seri' => $request->input('nomor_seri.*')[$index],
                    'ukuran' => $request->input('ukuran.*')[$index],
                    'merk' => $request->input('merk.*')[$index],
                    'masa_berlaku' => $request->input('masa_berlaku.*')[$index],
                    'tempat_pembelian' => $request->input('tempat_pembelian.*')[$index],
                    'jumlah' => $request->input('jumlah.*')[$index],
                    'harga' => $request->input('harga.*')[$index],
                    'permintaan_id' => $id,
                    'created_at' => $request->tanggal
                ]);
            }
            else {
                OnderdilKendaraan::create([
                    'onderdil_id' => $value,
                    'nomor_seri' => $request->input('nomor_seri.*')[$index],
                    'ukuran' => $request->input('ukuran.*')[$index],
                    'merk' => $request->input('merk.*')[$index],
                    'masa_berlaku' => $request->input('masa_berlaku.*')[$index],
                    'tempat_pembelian' => $request->input('tempat_pembelian.*')[$index],
                    'jumlah' => $request->input('jumlah.*')[$index],
                    'harga' => str_replace(".","",$request->input('harga.*')[$index]),
                    'permintaan_id' => $id,
                    'created_at' => $request->tanggal
                ]);
            }
        }

        //proses hapus data
        for($i=1 ; $i <= $total_onderdil; $i++){
            if($i > $total_onderdil_terbaru){
                $onderdilkendaraans[$i-1]->delete();
            }
        }

        return redirect()->route('permintaan.edit', ['id' => $id])->with('success','Berhasil melakukan edit data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permintaan::find($id)->delete();

        return redirect()->route('permintaan.index')->with('deleted', 'Data berhasil dihapus');
    }
}
