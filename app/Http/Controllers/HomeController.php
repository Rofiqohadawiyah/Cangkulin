<?php

namespace App\Http\Controllers;

use App\Models\AlatPertanian; // sesuaikan dengan modelmu
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $alat = AlatPertanian::all();  
    return view('home', compact('alat'));
    }

    public function dashboard()
    {
        $alat = AlatPertanian::all();      // query yang sama
        return view('dashboard', compact('alat')); // kirim ke dashboard.blade.php
    }
}
