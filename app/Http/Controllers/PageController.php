<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Kendaraan;
use App\JenisOnderdil;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function dashboard(){
        $dataKendaraan = Kendaraan::paginate(10);

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
        $jenis_onderdil = JenisOnderdil::all();

        return view('info', [
            'kendaraan' => $kendaraan,
            'jenis_onderdil' => $jenis_onderdil
        ]);
    }

    public function perbaikan(){
        return view('form');
    }

    public function inputkendaraan(){
        return view('input-kendaraan');
    }

    public function inputonderdil(){
        return view('input-onderdil');
    }

    public function inputuser(){
        return view('input-user');
    }
}
