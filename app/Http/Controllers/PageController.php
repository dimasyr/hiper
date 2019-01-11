<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kendaraan;

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
//        dd($kendaraan);
        return view('info', [
            'kendaraan' => $kendaraan
        ]);
    }

    public function perbaikan(){
        return view('form');
    }
}
