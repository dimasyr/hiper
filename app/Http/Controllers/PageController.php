<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kendaraan;
use App\JenisOnderdil;

class PageController extends Controller
{
    public function dashboard(){
        $dataKendaraan = Kendaraan::all();

        return view('home',[
            'kendaraan' => $dataKendaraan
        ]);
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
}
