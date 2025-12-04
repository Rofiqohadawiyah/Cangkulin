<?php

namespace App\Http\Controllers;
use App\Models\AlatPertanian;
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
        $alat = AlatPertanian::all();
        return view('dashboard', compact('alat'));
    }
}
