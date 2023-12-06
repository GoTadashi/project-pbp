<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class controller_api_register extends Controller
{
    public function actionRegister(Request $request)
    {
        try {
            // Validasi
            $request->validate([
                'email' => 'required|email|unique:users',
                'name' => 'required',
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

            // Return JSON response for successful registration
            return response()->json(['message' => 'Registration successful']);
        } catch (\Exception $e) {
            // Tangani pengecualian di sini, misalnya:
            return response()->json([
                'message' => 'Registration failed: ' . $e->getMessage()
            ], 500); // Status code 500 untuk kesalahan server
        }
    }
}
