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

    public function detailTruck($plat_nomor){
        $kendaraan = Kendaraan::where('plat_nomor', $plat_nomor)->first();
        $onderdils = Onderdil::all();
        $permintaan = Permintaan::where('kendaraan_id', $kendaraan->plat_nomor)->orderBy('tanggal')->paginate(10);

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