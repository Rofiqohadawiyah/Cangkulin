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
}
