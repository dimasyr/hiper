<?php

namespace App\Http\Controllers;

use App\OnderdilKendaraan;
use App\Permintaan;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Kendaraan;
use App\Onderdil;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function dashboard(){
        $dataKendaraan = Kendaraan::all();

        return view('home',[
            'kendaraan' => $dataKendaraan
        ]);
    }

    public function cariPlatNomor(){
        $q = Input::get('q');
        if($q){
           $dataKendaraan = Kendaraan::where('plat_nomor', 'LIKE', '%'.$q.'%')
           ->paginate(5);
           $jum= count($dataKendaraan);
           if($jum != 0){
               Session::flash('success','Berhasil menemukan plat nomor dengan keyword "'.$q.'"');

               return view('home',[
                   'kendaraan' => $dataKendaraan,
                   'q' => $q
               ]);
           }
           else{
               if(session()->has('success')) session_reset();
               return back()->with('deleted','Plat nomor tersebut tidak ada!');
           }
        }
        else{
            return back();
        }
    }

    public function detailTruck($plat_nomor){
        $kendaraan = Kendaraan::where('plat_nomor', $plat_nomor)->first();
        $onderdils = Onderdil::all();
        $permintaan = Permintaan::where('kendaraan_id', $kendaraan->plat_nomor)->paginate(10);

        return view('info', [
            'kendaraan' => $kendaraan,
            'onderdils' => $onderdils,
            'riwayat' => $permintaan
        ]);
    }

    public function perbaikan(){
        $kendaraan = Kendaraan::all();
        $teknisis = User::where('role_id',3)->get();
        $supirs = User::where('role_id',4)->get();
        $onderdils = Onderdil::all();

        return view('form',[
            'kendaraan' => $kendaraan,
            'teknisis' => $teknisis,
            'supirs' => $supirs,
            'onderdils' => $onderdils
        ]);
    }

    public function perbaikiSekarang($plat_nomor){
        $kendaraan_terpilih = Kendaraan::where('plat_nomor', $plat_nomor)->first();
        $kendaraan = Kendaraan::all();
        $teknisis = User::where('role_id',3)->get();
        $supirs = User::where('role_id',4)->get();
        $onderdils = Onderdil::all();

        return view('form',[
            'kendaraan' => $kendaraan,
            'teknisis' => $teknisis,
            'supirs' => $supirs,
            'onderdils' => $onderdils,
            'kendaraan_terpilih' => $kendaraan_terpilih
        ]);
    }

    public function prosesPerbaikan(Request $request){
        $validator = Validator::make($request->all(), [
            'onderdil_id.*' => 'required',
            'nomor_seri.*' => 'required',
            'tanggal' => array('required','regex:/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/'),
            'merk.*' => 'required',
            'masa_berlaku.*' => 'required | numeric',
            'tempat_pembelian.*' => 'required',
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

            return redirect()->route('perbaikan')->withInput()
                ->withErrors($validator)->with('jumlah', $jum);
        }

        $permintaan = Permintaan::create([
            'supir_id' => $request->supir_id,
            'teknisi_id' => $request->teknisi_id,
            'operator_id' => $request->operator_id,
            'tanggal' => $request->tanggal,
            'kendaraan_id' => $request->plat_nomor
        ]);

        foreach ($request->input('onderdil_id.*') as $index => $value){
            OnderdilKendaraan::create([
                'onderdil_id' => $value,
                'nomor_seri' => $request->input('nomor_seri.*')[$index],
                'merk' => $request->input('merk.*')[$index],
                'masa_berlaku' => $request->input('masa_berlaku.*')[$index],
                'tempat_pembelian' => $request->input('tempat_pembelian.*')[$index],
                'permintaan_id' => $permintaan->id
            ]);
        }

        return redirect()->route('perbaikan')->with('success','Berhasil melakukan perbaikan.');
    }

    public function infoRiwayat($id)
    {
        $permintaan = Permintaan::where('id',$id)->first();
        $kendaraan = Kendaraan::where('plat_nomor',$permintaan->kendaraan_id)->first();
        $onderdils = OnderdilKendaraan::where('permintaan_id',$id)->get();

        return view('info-riwayat', [
            'onderdils' => $onderdils,
            'permintaan' => $permintaan,
            'kendaraan' => $kendaraan
        ]);
    }
}