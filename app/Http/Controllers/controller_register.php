<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class controller_register extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function actionRegister(Request $request)
    {
        // Validasi
        $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'email' => $request->email,
            'active' => 1
        ]);


        // Pesan flash
        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('register');
    }
}
