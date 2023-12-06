<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class controller_api_login extends Controller
{
    public function actionLogin(Request $request)
    {
        try {
            $data = [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ];

            if (Auth::attempt($data)) {
                return response()->json(['success' => 'Login successful'], 200);
            } else {
                return response()->json(['error' => 'Invalid email or password'], 401);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Login failed: ' . $e->getMessage()], 500);
        }
    }
}
