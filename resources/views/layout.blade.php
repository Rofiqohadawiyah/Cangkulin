<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cangkulin</title>
    <style>
        body {margin:0; background:#f1f8f4; font-family: Arial, sans-serif;}
        .navbar {background:#2e7d32; padding:15px 30px; display:flex; justify-content:space-between; color:white;}
        .navbar .brand {font-size:22px; font-weight:bold;}
        .navbar .menu a {margin-left:25px; color:white; text-decoration:none; font-size:15px; font-weight:bold;}
        .navbar .menu a:hover {color:#ffcc80;}
        .content {padding:30px;}
        table {width:100%; border-collapse:collapse; margin-top:15px;}
        table th {background:#2e7d32; color:white; padding:10px;}
        table td {padding:10px; border-bottom:1px solid #ddd;}
        table tr:hover {background:#f7fff8;}
        .btn {padding:8px 12px; border-radius:6px; border:none; cursor:pointer; font-size:14px; text-decoration:none;}
        .btn-green {background:#2e7d32; color:white;}
        .btn-orange {background:#ef6c00; color:white;}
        .btn-red {background:#c62828; color:white;}
    </style>
</head>
<body>
    <div class="navbar">
        <div class="brand">CANGKULIN</div>
        <div class="menu">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('admin') }}">Admin</a>
            <a href="{{ route('kelompok.index') }}">Kelompok Tani</a>
            <a href="#">Alat Pertanian</a>
            <a href="#">Peminjaman</a>
            <a href="#">Pengembalian</a>
            <a href="#">Laporan</a>
            <a href="#">Riwayat</a>
            <a href="{{ route('logout') }}" class="btn-red" style="padding:6px 10px;">Logout</a>
        </div>
    </div>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>
