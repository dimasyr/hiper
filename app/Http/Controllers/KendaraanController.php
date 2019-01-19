<?php

namespace App\Http\Controllers;

use App\JenisKendaraan;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis_kendaraan = JenisKendaraan::all();

        return view('input-kendaraan', [
            'jenis_kendaraan' => $jenis_kendaraan
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
            'plat_nomor' => 'required|regex:/[A-Z]{1,2} [1-9]{1,4} [A-Z]{1,3}/',
            'nomor_rangka' => 'required',
            'nomor_mesin' => 'required',
            'stnk' => 'required',
            'pajak' => 'required',
            'kir' => 'required',
        ], [
            'required' => 'kolom di atas tidak boleh kosong',
            'regex' => 'pola plat nomor salah'
        ]);

        return redirect()->route('create.kendaraan')->with('success', 'Berhasil menambahkan kendaraan baru.');
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
