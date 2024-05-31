<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.daftar_user', ['users' => $users]);
    }

    public function tambahUser()
    {
        return view('admin.tambah_user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.daftar_user')->with('success', 'Berhasil menambahkan user baru');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.edit_user', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.daftar_user')->with('success', 'Berhasil mengupdate user');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin.daftar_user')->with('success', 'Berhasil menghapus user');
    }
}

