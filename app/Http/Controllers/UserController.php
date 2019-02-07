<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('user-all', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('input-user', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required | unique:users',
            'password' => 'required | min:6',
        ], [
            'required' => 'kolom di tidak boleh kosong',
            'unique' => 'username tersebut telah digunakan',
            'min' => 'password minimal berjumlah 6 karakter'
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.create')->withInput()
                ->withErrors($validator);
        }

        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id
        ]);

        return redirect()->route('user.index')->with('success', 'Berhasil menambahkan user baru.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * x     * @return \Illuminate\Http\Response
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
        $user = User::find($id);
        $roles = Role::all();
        return view('user-edit', [
            'user' => $user,
            'roles' => $roles
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
            'nama' => 'required',
            'username' => 'required|unique:users',
        ], [
            'required' => 'kolom di tidak boleh kosong',
            'unique' => 'username tersebut telah digunakan',
        ]);

        User::find($id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'role_id' => $request->role_id
        ]);

        return redirect()->route('user.index')->with('edited', 'Data user "' . $request->nama . '" berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->id != $id) {
            $user = User::find($id);
            User::find($id)->delete();

            return redirect()->route('user.index')->with('deleted', 'User "' . $user->nama . '" berhasil dihapus.');
        } else {
            return redirect()->route('user.index')->with('deleted', 'User tersebut sedang digunakan!');
        }

    }


    public function gantiPassword(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
        ], [
            'required' => 'kolom di tidak boleh kosong',
            'min' => 'Password setidaknya mengandung 6 karakter',
            'confirmed' => 'Password yang anda masukkan tidak sama'
        ]);

        User::find($id)->update([
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('user.index')->with('edited', 'Password berhasil diperbarui');
    }

    public function gantiRole(Request $request, $id)
    {
        User::find($id)->update([
            'role_id' => $request->role_id
        ]);

        return redirect()->route('user.index')->with('edited', 'Role berhasil diperbarui');
    }
}
