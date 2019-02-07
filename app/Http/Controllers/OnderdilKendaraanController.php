<?php

namespace App\Http\Controllers;

use App\OnderdilKendaraan;
use App\Permintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OnderdilKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'regex' => 'format salah',
        ]);

        if ($validator->fails()) {
            $jum = 0;
            foreach ($request->input('onderdil_id.*') as $index => $value){
                $jum++;
            }

            return redirect()->route('perbaikan')->withInput()
                ->withErrors($validator)->with('jumlah', $jum);
        }

        $permintaan = Permintaan::create([
            'supir_id' => $request->supir_id,
            'teknisi_id' => $request->teknisi_id,
            'operator_id' => $request->operator_id,
            'tanggal' => $request->tanggal,
            'kendaraan_id' => $request->plat_nomor,
        ]);

        foreach ($request->input('onderdil_id.*') as $index => $value){
            OnderdilKendaraan::create([
                'onderdil_id' => $value,
                'nomor_seri' => $request->input('nomor_seri.*')[$index],
                'ukuran' => $request->input('ukuran.*')[$index],
                'merk' => $request->input('merk.*')[$index],
                'masa_berlaku' => $request->input('masa_berlaku.*')[$index],
                'tempat_pembelian' => $request->input('tempat_pembelian.*')[$index],
                'jumlah' => $request->input('jumlah.*')[$index],
                'harga' => str_replace(".","",$request->input('harga.*')[$index]),
                'permintaan_id' => $permintaan->id,
                'created_at' => $request->tanggal
            ]);
        }

        return redirect()->route('perbaikan')->with('success','Berhasil melakukan perbaikan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
