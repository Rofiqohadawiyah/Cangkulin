<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cangkulin - @yield('title', 'Dashboard')</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #e8f5e9;
            font-family: Arial, sans-serif;
            color: #1b5e20;
        }

        /* === NAVBAR === */
        .navbar {
            background: #2e7d32;
            padding: 14px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 10;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        }

        /* === KIRI: LOGO + TEKS === */
        .navbar-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-img {
            height: 45px;
            width: auto;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            color: white;
        }

        .logo span {
            font-size: 11px;
            display: block;
            opacity: 0.8;
        }

        /* === MENU === */
        .menu {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .menu a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: 0.2s;
        }

        .menu a:hover {
            color: #ffebc8;
        }

        /* === TOMBOL LOGOUT === */
        .btn-red {
            background: #43a047;
            color: white !important;
            padding: 6px 14px;
            border-radius: 8px;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-red:hover {
            background: #43a047;
        }

        /* === KONTEN UTAMA === */
        .page-wrapper {
            max-width: 1100px;
            margin: 24px auto 40px;
            padding: 0 20px;
        }

        footer {
            text-align: center;
            font-size: 12px;
            color: #78909c;
            padding: 12px 0 18px;
        }

        /* === RESPONSIVE === */
        @media (max-width: 900px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
                padding: 14px 24px;
                gap: 8px;
            }

            .menu {
                flex-wrap: wrap;
                justify-content: flex-start;
                gap: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="navbar-left">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo-img">
            <div class="logo">
                CANGKULIN
                <span>Sistem Peminjaman Alat Pertanian</span>
            </div>
        </div>

        <div class="menu">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('admin') }}">Admin</a>
            <a href="{{ route('kelompok.index') }}">Kelompok Tani</a>
            <a href="{{ route('alat.index') }}">Alat Pertanian</a>
            <a href="{{ route('peminjaman.index') }}">Peminjaman</a>
            <a href="{{ route('pengembalian.index')}}">Pengembalian</a>
            <a href="{{ route('laporan.index') }}">Laporan</a>
            <a href="{{ route('riwayat.index') }}">Riwayat</a>
            <a href="{{ route('logout') }}" class="btn-red">Logout</a>
        </div>
    </div>

    <div class="page-wrapper">
        @yield('content')
    </div>

    <footer>
        &copy; {{ date('Y') }} Cangkulin · Sistem Peminjaman dan Pengembalian Alat Pertanian
    </footer>
</body>
</html>
