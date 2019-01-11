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

    public function detailTruck(){
        return view('info');
    }

    public function perbaikan(){
        return view('form');
    }
}
