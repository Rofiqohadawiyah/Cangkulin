<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $admin = DB::table('admin')->where('username', $request->username)->first();

        if (!$admin) {
            return back()->with('error', 'Username tidak ditemukan.');
        }

        if (!Hash::check($request->password, $admin->password)) {
            return back()->with('error', 'Password salah.');
        }

        session([
            'admin_id'   => $admin->id_admin,
            'admin_nama' => $admin->nama_admin,
        ]);

        return redirect('/dashboard');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_admin'   => 'required',
            'email'        => 'required|email|unique:admin,email',
            'no_hp_admin'  => 'required',
            'username'     => 'required|unique:admin,username',
            'password'     => 'required|min:6',
            'kode_daftar'  => 'required',
        ]);

        $kodeValid = [
            'CANGKULIN-ADMIN-1',
            'CANGKULIN-ADMIN-2',
            'ADM-2025-A',
            'ADM-2025-B',
        ];

        if (!in_array($request->kode_daftar, $kodeValid)) {
            return back()
                ->withInput()
                ->with('error', 'Kode daftar tidak valid. Hubungi admin Cangkullin.');
        }

 
        DB::table('admin')->insert([
            'nama_admin'  => $request->nama_admin,
            'email'       => $request->email,
            'no_hp_admin' => $request->no_hp_admin,
            'username'    => $request->username,
            'password'    => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Register berhasil. Silakan login.');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home'); // langsung ke halaman beranda user
    }
}
