<?php

namespace App\Http\Controllers;

use App\Onderdil;
use Illuminate\Http\Request;

class OnderdilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onderdils = Onderdil::all();

        return view('onderdil-all', [
            'onderdils' => $onderdils
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('onderdil-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required | max:20',
        ], [
            'required' => 'kolom di tidak boleh kosong',
            'max' => 'nama terlalu panjang'
        ]);

        Onderdil::create([
            'nama' => $request->nama
        ]);

        return redirect()->route('onderdil.index')->with('success', 'Berhasil menambahkan onderdil baru.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $onderdil = Onderdil::find($id);

        return view('onderdil-edit', [
            'onderdil' => $onderdil
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required | max:20',
        ], [
            'required' => 'kolom di tidak boleh kosong',
            'max' => 'nama terlalu panjang'
        ]);

        Onderdil::find($id)->update([
            'nama' => $request->nama
        ]);

        return redirect()->route('onderdil.index')->with('edited', 'Berhasil mengedit onderdil.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $onderdil = Onderdil::find($id);
        Onderdil::find($id)->delete();

        return redirect()->route('onderdil.index')->with('deleted', 'Onderdil "' . $onderdil->nama . '" berhasil dihapus');
    }
}
