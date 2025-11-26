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

        .navbar {
            background: #2e7d32;
            padding: 12px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            position: sticky;
            top: 0;
            z-index: 10;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }

        .navbar .brand {
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .navbar .brand span {
            font-size: 14px;
            font-weight: normal;
            opacity: 0.85;
            display: block;
        }

        .navbar .menu {
            display: flex;
            gap: 18px;
            align-items: center;
        }

        .navbar .menu a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            padding: 6px 10px;
            border-radius: 999px;
            transition: background 0.2s, color 0.2s, transform 0.1s;
        }

        .navbar .menu a:hover {
            background: #388e3c;
            color: #ffebc8;
            transform: translateY(-1px);
        }

        .navbar .menu .btn-red {
            background: #c62828;
        }

        .navbar .menu .btn-red:hover {
            background: #b71c1c;
        }

        .page-wrapper {
            max-width: 1100px;
            margin: 24px auto 40px;
            padding: 0 20px;
        }

        .page-header {
            margin-bottom: 18px;
        }

        .page-header h1 {
            margin: 0;
            font-size: 24px;
            color: #1b5e20;
        }

        .page-header p {
            margin-top: 6px;
            font-size: 13px;
            color: #607d8b;
        }

        .card {
            background: white;
            padding: 20px 22px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            border: 1px solid #c8e6c9;
        }

        .table-wrapper {
            overflow-x: auto;
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        table thead {
            background: #2e7d32;
            color: white;
        }

        table th,
        table td {
            padding: 10px 12px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        table tr:nth-child(even) {
            background: #f9fff9;
        }

        table tr:hover {
            background: #f1f8e9;
        }

        .badge {
            display: inline-block;
            padding: 3px 8px;
            font-size: 11px;
            border-radius: 999px;
        }

        .badge-green {
            background: #c8e6c9;
            color: #1b5e20;
        }

        .btn {
            padding: 7px 12px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 13px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-green { background:#2e7d32; color:white; }
        .btn-orange { background:#ef6c00; color:white; }
        .btn-red-solid { background:#c62828; color:white; }

        .btn:hover {
            opacity: 0.9;
        }

        footer {
            text-align: center;
            font-size: 12px;
            color: #78909c;
            padding: 12px 0 18px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="brand">
            CANGKULIN
            <span>Sistem Peminjaman Alat Pertanian</span>
        </div>
        <div class="menu">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('admin') }}">Admin</a>
            <a href="{{ route('kelompok.index') }}">Kelompok Tani</a>
            <a href="#">Alat Pertanian</a>
            <a href="#">Peminjaman</a>
            <a href="#">Pengembalian</a>
            <a href="#">Laporan</a>
            <a href="#">Riwayat</a>
            <a href="{{ route('logout') }}" class="btn-red">Logout</a>
        </div>
    </div>

    <div class="page-wrapper">
        @yield('content')
    </div>

    <footer>
        &copy; {{ date('Y') }} Cangkulin · Membantu pencatatan peminjaman dan pengembalian alat
    </footer>
</body>
</html>
