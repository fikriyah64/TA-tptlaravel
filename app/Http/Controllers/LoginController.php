<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login',
        ]);
    }

    //PROSES LOGIN
    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        //MENYIMPAN DATA LOGIN
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        //PROSES PENGECEKAN LOGIN
        if (Auth::attempt($data)) {
            //JIKA OTENTIKASI SUSKSES
            return redirect()->route('dashboard');
        } else {
            //JIKA OTENTIKASI GAGAL
            return redirect()->route('login')->with('failed', 'Email atau Password Salah');
        }
    }

    //REGISTER
    public function register()
    {
        return view('auth.register', [
            'title' => 'Register',
        ]);
    }

    public function register_proses(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'passwordConfirm' => 'required|same:password',
        ]);

        //MENYIMPAN DATA REGISTER
        $data = [
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'passwordConfirm'=> bcrypt($request->password),
        ];

        // Proses pengecekan register
        User::create($data); //menyimpan data user kedalam database

        //Proses pengecekan Register
        return redirect()->route('login')->with('success', 'Registrasi Telah Berhasil');
    }

        //LOGOUT
        public function logout()
        {
            Auth::logout();
    
            request()->session()->invalidate();
            request()->session()->regenerateToken();
    
            return redirect()->route('login')->with('success', 'Kamu Berhasil Logout');
        }
}
