@extends('layout')

@section('content')

<style>
    body {
        margin: 0;
        padding: 0;
        background: 
            linear-gradient(rgba(46, 125, 50, 0.25), rgba(46, 125, 50, 0.25)),
            url('{{ asset('img/hero9.jpg') }}') center/cover no-repeat fixed;
        font-family: 'Poppins', sans-serif;
    }

    /* === WRAPPER BESAR === */
    .page-wrapper {
        max-width: 1200px;
        margin: 40px auto;
        background: #eaf5ea; /* sedikit lebih lembut */
        border-radius: 12px;
        padding: 28px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    /* === HEADER === */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 18px;
    }

    .page-title {
        font-size: 24px;
        font-weight: 800;
        color: #1b5e20;
        margin: 0;
    }

    .page-subtitle {
        font-size: 14px;
        color: #607d8b;
        margin-top: 4px;
    }

    /* === BUTTON TAMBAH (sama seperti kelompok tani) === */
    .btn-add {
        background: #2e7d32;
        color: #fff;
        padding: 10px 20px;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 700;
        text-decoration: none;
        transition: 0.2s;
        box-shadow: 0 6px 15px rgba(46, 125, 50, 0.25);
    }

    .btn-add:hover {
        background: #256427;
    }

    /* === TABEL === */
    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    thead tr {
        background: #2e7d32;
        color: white;
        font-weight: 700;
    }

    thead th {
        padding: 12px 14px;
        text-align: left;
    }

    tbody td {
        padding: 12px 14px;
        border-bottom: 1px solid #e0e0e0;
        color: #1b5e20;
        background: #ffffff;
    }

    /* === ZEBRA STRIPING === */
    tbody tr:nth-child(even) {
        background-color: #f9fff5; /* krem muda */
    }

    tbody tr:hover {
        background-color: #f1f8f4;
    }

    /* === STATUS BADGE === */
    .status {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 999px;
        font-weight: 600;
        font-size: 13px;
        color: white;
    }

    .status-1 { background: #43a047; } /* Dipinjam */
    .status-2 { background: #fbc02d; } /* Perlu Pengingat */
    .status-3 { background: #9e9e9e; } /* Dikembalikan */

    .empty {
        text-align: center;
        padding: 28px;
        color: #607d8b;
        font-weight: 600;
    }

    @media (max-width: 992px) {
        .page-wrapper {
            margin: 20px;
            padding: 20px;
        }
        table { font-size: 13px; }
    }
</style>

    {{-- HEADER --}}
    <div class="page-header">
        <div>
            <h2 class="page-title">Data Peminjaman</h2>
            <p class="page-subtitle">Daftar seluruh data peminjaman alat oleh kelompok tani.</p>
        </div>
        <a href="{{ route('peminjaman.create') }}" class="btn-add">+ Tambah Peminjaman</a>
    </div>

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div style="background:#e8f5e9; color:#2e7d32; padding:8px 12px; border-radius:6px; margin-bottom:15px; font-size:14px;">
            {{ session('success') }}
        </div>
    @endif

    {{-- TABEL --}}
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kelompok Tani</th>
                    <th>Admin</th>
                    <th>Status</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tenggat</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($peminjaman as $index => $d)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $d->nama_kelompoktani ?? '-' }}</td>
                        <td>{{ $d->nama_admin ?? '-' }}</td>
                        <td>
                            @php
                                $cls = 'status-1'; $text = 'Dipinjam';
                                if (isset($d->status_deskripsi)) {
                                    $map = strtolower($d->status_deskripsi);
                                    if (strpos($map, 'pengingat') !== false) { $cls = 'status-2'; $text = 'Perlu Pengingat'; }
                                    elseif (strpos($map, 'dikembalikan') !== false) { $cls = 'status-3'; $text = 'Dikembalikan'; }
                                }
                            @endphp
                            <span class="status {{ $cls }}">{{ $text }}</span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($d->tanggal_pinjam)->translatedFormat('d F Y') }}</td>
                        <td>{{ $d->tenggat_pinjam ? \Carbon\Carbon::parse($d->tenggat_pinjam)->translatedFormat('d F Y') : '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty">Belum ada data peminjaman.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
