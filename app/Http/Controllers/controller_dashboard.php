<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controller_dashboard extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
}
