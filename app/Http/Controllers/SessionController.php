<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    // index: untuk menampilkan form login
    function index()
    {
        return view("sesi/index");
    }
    // akan melakukan autentikasi email serta password yang dimasukan
    function login(Request $request)
    {
        // ketika email salah akan dimunculkan lagi oleh session flash dibawah
        Session::flash('email', $request->email);
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email wajib diisi',
                'password.required' => 'Password wajib diisi',
            ]
        );

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            // kalau autentikasi sukses
            return redirect('/sesi/awal')->with('success', Auth::user()->name . '
            Berhasil Login');
        } else {
            // kalau autentikasi gagal
            return redirect('sesi')->withErrors('Username dan password yg dimasukan tidak valid');
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect('/sesi')->with('success', 'Berhasil Logout');
    }

    function register()
    {
        return view('sesi/register');
    }

    function create(Request $request)
    {
        Session::flash('name', $request->name);
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users', // |email= ini untuk mengecek apakah emailnya valid |unique:users'= untuk memastikan email yang dimasukan merupkan email yg berbeda dari yg sdh ada dari table users
                'password' => 'required|min:5' // |min= minimum password yg dimasukan adalah 5
            ],
            [
                'name.required' => 'Nama wajib diisi',
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Silahkan masukan Email yang valid',
                'email.unique' => 'Email sudah pernah digunakan',
                'password.required' => 'Password wajib diisi',
                'password.min' => 'Minimum password yg diizinkan 5 karakter'
            ]
        );

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        User::create($data);  // memasukan data

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            // kalau autentikasi sukses
            return redirect('/sesi/awal')->with('success', Auth::user()->name . '
            Berhasil Login');
        } else {
            // kalau autentikasi gagal
            return redirect('sesi')->withErrors('Username dan password yg dimasukan tidak valid');
        }
    }

    function awal()
    {
        return view('/sesi/awal');
    }
}
