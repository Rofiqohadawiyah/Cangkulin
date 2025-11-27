@extends('layouts.front')

@section('title', 'Login')

{{-- CSS KHUSUS HALAMAN LOGIN --}}
@section('head')
<style>
    .auth-bg {
        position: relative;
        min-height: calc(100vh - 60px); /* tinggi layar dikurangi tinggi navbar kira-kira */
        background: url('{{ asset("img/hero4.png") }}') center/cover no-repeat;
    }

    .auth-bg::before {
        content:"";
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.45);
        backdrop-filter: blur(1px);
        z-index: 0; /* di belakang card */
    }

    .auth-wrapper {
        position: relative;
        z-index: 1;
        min-height: inherit;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 25px;
    }

    .login-card {
        width: 380px;
        background: rgba(255, 255, 255, 0.92);
        padding: 30px;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 6px 25px rgba(0,0,0,0.25);
        backdrop-filter: blur(4px);
    }

    .login-card img.logo {
        width: 90px;
        margin-bottom: 10px;
    }

    .login-card h2 {
        font-weight: 600;
        margin-bottom: 5px;
        color: #2e7d32;
    }

    .subtitle {
        font-size: 13px;
        color: #546e7a;
        margin-bottom: 18px;
    }

    .login-card label {
        text-align: left;
        display: block;
        color: #37474f;
        font-size: 14px;
        margin-top: 12px;
    }

    .login-card input {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 8px;
        border: 1px solid #b0bec5;
        font-size: 14px;
    }

    .login-card input:focus {
        outline: none;
        border-color: #43a047;
        box-shadow: 0 0 0 3px rgba(67,160,71,0.25);
    }

    .login-card button {
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

    .login-card button:hover {
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
        margin-top: 10px;
        font-size: 13px;
        color: #c62828;
        font-weight: bold;
    }
</style>
@endsection

{{-- KONTEN LOGIN --}}
@section('content')
<div class="auth-bg">
    <div class="auth-wrapper">
        <div class="login-card">
            <img src="{{ asset('img/logo.png') }}" class="logo" alt="Logo Cangkulin">

            <h2>Login</h2>
            <p class="subtitle">Masuk sebagai admin untuk mengelola data Cangkullin.</p>

            @if(session('error'))
                <div class="error-message">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <label>Username</label>
                <input type="text" name="username" required>

                <label>Password</label>
                <input type="password" name="password" required>

                <button type="submit">Masuk</button>

                <p class="bottom-text">
                    Belum punya akun?
                    <a href="{{ route('register') }}">Daftar</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
