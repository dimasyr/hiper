<?php

namespace App\Http\Controllers;

use App\AlatBerat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlatBeratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alatberats = AlatBerat::all();
        return view('alatberat-all', [
            'alatberats' => $alatberats
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alatberat-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'tahun' => 'required | numeric'
        ], [
            'required' => 'tidak boleh kosong',
            'numeric' => 'harus berupa angka'
        ]);

        if($validator->fails()){
            return redirect()->route('alatberat.create')->withErrors($validator)->withInput();
        }

        AlatBerat::create([
            'nama' => $request->nama,
            'tahun' => $request->tahun
        ]);

        return redirect()->route('alatberat.index')->with('success','Berhasil menambahkan data.');
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
        $alatberat = AlatBerat::find($id);

        return view('alatberat-edit', [
            'alatberat' => $alatberat
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
        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'tahun' => 'required | numeric'
        ], [
            'required' => 'tidak boleh kosong',
            'numeric' => 'harus berupa angka'
        ]);

        if($validator->fails()){
            return redirect()->route('alatberat.edit', ['id' => $id])->withErrors($validator)->withInput();
        }

        AlatBerat::find($id)->update([
            'nama' => $request->nama,
            'tahun' => $request->tahun
        ]);

        return redirect()->route('alatberat.index')->with('edited','Berhasil mengedit data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alatberat = AlatBerat::find($id);
        AlatBerat::find($id)->delete();

        return redirect()->route('alatberat.index')->with('deleted', 'Alat berat "' . $alatberat->nama . '" berhasil dihapus');
    }
}
