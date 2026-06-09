<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $admin = DB::table('admin')->get();

        return view('admin', compact('admin'));
    }
}
