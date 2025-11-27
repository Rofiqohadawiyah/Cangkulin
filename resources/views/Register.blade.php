@extends('layouts.front')

@section('title', 'Register')

{{-- CSS khusus halaman register --}}
@section('head')
<style>
    /* BACKGROUND + OVERLAY, TIDAK MENGGANGGU NAVBAR */
    .auth-bg {
        position: relative;
        min-height: calc(100vh - 60px); /* tinggi layar dikurangi tinggi navbar */
        background: url('{{ asset("img/hero5.png") }}') center/cover no-repeat;
    }

    .auth-bg::before {
        content:"";
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.45);
        backdrop-filter: blur(1px);
        z-index: 0; /* di belakang card */
    }

    /* WRAPPER CARD */
    .auth-wrapper {
        position: relative;
        z-index: 1;
        min-height: inherit;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 25px;
    }

    /* CARD REGISTER */
    .register-card {
        width: 390px;
        background: rgba(255, 255, 255, 0.92);
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 6px 25px rgba(0,0,0,0.25);
        text-align: center;
        backdrop-filter: blur(4px);
    }

    .register-card img.logo {
        width: 90px;
        margin-bottom: 10px;
    }

    .register-card h2 {
        font-weight: 600;
        margin-bottom: 5px;
        color: #2e7d32;
    }

    .subtitle {
        font-size: 13px;
        color: #546e7a;
        margin-bottom: 18px;
    }

    .register-card label {
        text-align: left;
        display: block;
        color: #37474f;
        font-size: 14px;
        margin-top: 12px;
    }

    .register-card input {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 8px;
        border: 1px solid #b0bec5;
        font-size: 14px;
    }

    .register-card input:focus {
        outline: none;
        border-color: #43a047;
        box-shadow: 0 0 0 3px rgba(67,160,71,0.25);
    }

    .register-card button {
        width: 100%;
        padding: 11px;
        margin-top: 20px;
        background: #43a047;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 15px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.25s;
    }

    .register-card button:hover {
        background: #2e7d32;
    }

    .bottom-text {
        margin-top: 15px;
        font-size: 13px;
        color: #37474f;
    }

    .bottom-text a {
        color: #ff9800;
        font-weight: bold;
        text-decoration: none;
    }

    .error-message {
        margin-bottom:10px;
        color:#c62828;
        font-size:13px;
        font-weight:bold;
    }

    .success-message {
        margin-bottom:10px;
        color:#1b5e20;
        font-size:13px;
        font-weight:bold;
    }
</style>
@endsection

{{-- KONTEN REGISTER --}}
@section('content')
<div class="auth-bg">
    <div class="auth-wrapper">
        <div class="register-card">

            <!-- LOGO -->
            <img src="{{ asset('img/logo.png') }}" class="logo" alt="Logo Cangkulin">

            <h2>Register</h2>
            <p class="subtitle">Buat akun admin untuk mengakses sistem Cangkullin.</p>

            {{-- pesan sukses (misal diarahkan dari controller) --}}
            @if(session('success'))
                <div class="success-message">{{ session('success') }}</div>
            @endif

            {{-- pesan error kode / validasi umum --}}
            @if(session('error'))
                <div class="error-message">{{ session('error') }}</div>
            @endif

            {{-- error validasi Laravel (misal field wajib kosong, email salah, dsb) --}}
            @if($errors->any())
                <div class="error-message">
                    Terjadi kesalahan pada input. Periksa kembali data yang kamu isi.
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <label>Nama</label>
                <input type="text" name="nama_admin" value="{{ old('nama_admin') }}" required>

                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required>

                <label>No HP</label>
                <input type="text" name="no_hp_admin" value="{{ old('no_hp_admin') }}" required>

                <label>Username</label>
                <input type="text" name="username" value="{{ old('username') }}" required>

                <label>Password</label>
                <input type="password" name="password" required>

                {{-- KODE DAFTAR ADMIN – biar bukan sembarang orang bisa daftar --}}
                <label>Kode Daftar Admin</label>
                <input type="password" name="kode_daftar" required>

                <button type="submit">Daftar</button>

                <p class="bottom-text">
                    Sudah punya akun? <a href="{{ route('login') }}">Login</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
