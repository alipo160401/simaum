<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $username = $request['username'];
        $credentials = $request->only('username', 'password');

        $validUsername = User::where('username', $username)->first();
        if ($validUsername == null) {
            return redirect()->back()->with('ERR', 'Username salah!');
        } elseif (!Auth::attempt($credentials)) {
            return redirect()->back()->with('ERR', 'Password salah!');
        }

        return redirect()->route('check-role');
    }

    public function checkRole()
    {
        switch (Auth::user()->role) {
            case 'P3':
                return redirect('/user/index');
                break;
            case 'P2':
                return redirect('/asset/index');
                break;
            case 'P1':
                return redirect('/asset/index');
                break;

            default:
                return redirect('login');
                break;
        }
    }

    public function doLogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
