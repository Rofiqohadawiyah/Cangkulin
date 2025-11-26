@extends('layout')

@section('title', 'Dashboard')

@section('content')
    <div class="page-header">
        <h1>Dashboard</h1>
        <p>Selamat datang di Dashboard Cangkulin. Kelola data alat, peminjaman, dan pengembalian dengan lebih mudah.</p>
    </div>

    <div class="card">
        <h3 style="margin-top:0; margin-bottom:10px;">Ringkasan Sistem</h3>
        <p style="font-size:13px; color:#607d8b; margin-top:0;">
            Sistem ini membantu admin dalam melakukan pencatatan peminjaman dan pengembalian alat pertanian.
            User hanya dapat melihat ketersediaan alat dari rumah tanpa melakukan pemesanan.
        </p>

        <div style="display:flex; flex-wrap:wrap; gap:14px; margin-top:14px;">
            <div style="flex:1 1 160px; background:#f1f8e9; border-radius:10px; padding:12px 14px;">
                <div style="font-size:12px; color:#78909c;">Menu</div>
                <div style="font-weight:bold; margin-top:4px;">Kelompok Tani</div>
                <div style="font-size:12px; color:#607d8b;">Kelola data kelompok tani.</div>
            </div>
            <div style="flex:1 1 160px; background:#f1f8e9; border-radius:10px; padding:12px 14px;">
                <div style="font-size:12px; color:#78909c;">Menu</div>
                <div style="font-weight:bold; margin-top:4px;">Alat Pertanian</div>
                <div style="font-size:12px; color:#607d8b;">Atur dan cek ketersediaan alat.</div>
            </div>
            <div style="flex:1 1 160px; background:#f1f8e9; border-radius:10px; padding:12px 14px;">
                <div style="font-size:12px; color:#78909c;">Menu</div>
                <div style="font-weight:bold; margin-top:4px;">Peminjaman</div>
                <div style="font-size:12px; color:#607d8b;">Catat peminjaman & pengembalian.</div>
            </div>
        </div>
    </div>
@endsection
