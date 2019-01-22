<?php

namespace App\Http\Controllers;

use App\JenisKendaraan;
use App\Kendaraan;
use App\User;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataKendaraan = Kendaraan::all();

        return view('home',[
            'kendaraan' => $dataKendaraan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis_kendaraan = JenisKendaraan::all();
        $supirs = User::where('role_id',4)->get();

        return view('input-kendaraan', [
            'jenis_kendaraan' => $jenis_kendaraan,
            'supirs' => $supirs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'plat_nomor' => 'required|unique:kendaraan|regex:/[A-Z]{1,2} [1-9]{1,4} [A-Z]{1,3}/',
            'nomor_rangka' => 'required',
            'nomor_mesin' => 'required',
        ], [
            'required' => 'kolom di atas tidak boleh kosong',
            'regex' => 'pola plat nomor salah',
            'unique' => 'plat nomor tersebut sudah ada.'
        ]);

        Kendaraan::create([
            'plat_nomor' => $request->plat_nomor,
            'nomor_rangka' => $request->nomor_rangka,
            'nomor_mesin' => $request->nomor_mesin,
            'stnk' => $request->stnk,
            'pajak' => $request->pajak,
            'kir' => $request->kir,
            'supir_id' => $request->supir_id,
            'jenis_kendaraan_id' => $request->jenis_kendaraan_id
        ]);

        return redirect()->route('kendaraan.index')->with('success', 'Berhasil menambahkan kendaraan baru dengan plat nomor "'.$request->plat_nomor.'"');
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
        $kendaraan = Kendaraan::where('plat_nomor',$id)->first();
        $supirs = User::where('role_id',4)->get();
        $jenis_kendaraan = JenisKendaraan::all();

        return view('kendaraan-edit', [
            'kendaraan' => $kendaraan,
            'jenis_kendaraan' => $jenis_kendaraan,
            'supirs' => $supirs
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
        $this->validate($request, [
            'plat_nomor' => 'required|unique:kendaraan|regex:/[A-Z]{1,2} [1-9]{1,4} [A-Z]{1,3}/',
            'nomor_rangka' => 'required',
            'nomor_mesin' => 'required',
        ], [
            'required' => 'kolom di atas tidak boleh kosong',
            'unique' => 'plat nomor sudah ada',
            'regex' => 'pola plat nomor salah',
        ]);

        Kendaraan::where('plat_nomor',$id)->update([
            'plat_nomor' => $request->plat_nomor,
            'nomor_rangka' => $request->nomor_rangka,
            'nomor_mesin' => $request->nomor_mesin,
            'stnk' => $request->stnk,
            'pajak' => $request->pajak,
            'kir' => $request->kir,
            'supir_id' => $request->supir_id,
            'jenis_kendaraan_id' => $request->jenis_kendaraan_id
        ]);

        return redirect()->route('kendaraan.index')->with('edited', 'Berhasil mengedit kendaraan dengan plat nomor "'.$request->plat_nomor.'"');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kendaraan = Kendaraan::where('plat_nomor', $id)->first();
        $plat_nomor = $kendaraan->plat_nomor;

        Kendaraan::where('plat_nomor', $id)->delete();

        return redirect()->route('kendaraan.index')->with('deleted', 'Kendaraan dengan plat nomor "'.$plat_nomor.'" berhasil dihapus.');
    }
}
