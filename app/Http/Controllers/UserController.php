<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $data['user'] = User::all();
        $data['nomor'] = 1;
        return view('user.index', $data);
    }

    public function create()
    {
        return view('user.tambah');
    }

    public function store(Request $request)
    {
        $user = User::where('username', $request['username'])->first();
        if ($user != null) {
            return redirect()->back()->with('ERR', 'Username telah digunakan, silahkan gunakan username yang lain');
        }

        $user = User::where('nik', $request['nik'])->first();
        if ($user != null) {
            return redirect()->back()->with('ERR', 'NIK sudah terdaftar, harap periksa NIK anda kembali!');
        }

        User::create([
            'nama' => $request['nama'],
            'nik' => $request['nik'],
            'no_telp' => $request['no_telp'],
            'alamat' => $request['alamat'],
            'role' => $request['role'],
            'username' => $request['username'],
            'password' => bcrypt($request['password'])
        ]); 

        return redirect('/user/index')->with('OK', 'Berhasil menambah User!');
    }

    public function detail(Request $request)
    {
        $data['user'] = User::find($request['id']);
        return view('user.detail', $data);
    }

    public function edit(Request $request)
    {
        $data['user'] = User::find($request['id']);
        return view('user.edit', $data);
    }

    public function update(Request $request)
    {
        $user = User::find($request['id']);
        $user->update([
            'nama' => $request['nama'],
            'nik' => $request['nik'],
            'no_telp' => $request['no_telp'],
            'alamat' => $request['alamat'],
        ]);

        return redirect()->back()->with('OK', 'Berhasil mengubah data');
    }

    public function destroy(Request $request)
    {
        $user = User::find($request['id']);
        $user->delete();
        return redirect()->back()->with('OK', 'Berhasil menghapus User!');   
    }

    public function editPassword(Request $request)
    {
        $data['user'] = User::find($request['id']);
        return view('user.changepassword', $data);
    }

    public function changePassword(Request $request)
    {
        $user = User::find($request['id']);
        $user->update([
            'password' => bcrypt($request['password']) 
        ]);

        return redirect('/user/index')->with('OK', 'Berhasil mengubah password');

    }
}
