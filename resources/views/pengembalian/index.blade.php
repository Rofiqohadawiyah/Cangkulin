@extends('layout')

@section('content')

<style>
    body {
        margin: 0;
        padding: 0;
        background:
            linear-gradient(rgba(46, 125, 50, 0.25), rgba(46, 125, 50, 0.25)),
            url('{{ asset('img/hero10.jpg') }}') center/cover no-repeat fixed;
        font-family: 'Poppins', sans-serif;
    }

    /* === WRAPPER UTAMA === */
    .page-wrapper {
        max-width: 1200px;
        margin: 40px auto;
        background: #f1f8f4;
        border-radius: 12px;
        padding: 28px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    }

    /* === HEADER === */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 10px;
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

    /* === FORM FILTER === */
    .filter-form {
        display: flex;
        gap: 10px;
        align-items: center;
        flex-wrap: wrap;
    }

    .filter-form input,
    .filter-form select {
        border: 1px solid #a5d6a7;
        border-radius: 8px;
        padding: 8px 10px;
        font-size: 14px;
        outline: none;
    }

    .filter-form input:focus,
    .filter-form select:focus {
        border-color: #43a047;
        box-shadow: 0 0 4px rgba(67, 160, 71, 0.3);
    }

    .filter-form button {
        background: #2e7d32;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 8px 16px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
    }

    .filter-form button:hover {
        background: #256427;
    }

    /* === TABEL === */
    table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    thead {
        background: #2e7d32;
        color: white;
    }

    th, td {
        padding: 12px 14px;
        text-align: left;
        font-size: 14px;
    }

    tbody tr:nth-child(even) {
        background-color: #f9fff5;
    }

    tbody tr:hover {
        background-color: #e8f5e9;
        transition: 0.2s;
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
    .status-2 { background: #fbc02d; color: #3e2723; } /* Perlu Pengingat */
    .status-3 { background: #9e9e9e; } /* Dikembalikan */

    /* === TOMBOL AKSI === */
    .btn-aksi {
        border: none;
        border-radius: 8px;
        padding: 6px 14px;
        font-size: 13px;
        font-weight: 600;
        color: white;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-kembali {
        background: #43a047;
    }

    .btn-kembali:hover {
        background: #2e7d32;
    }

    .btn-pengingat {
        background: #fbc02d;
        color: #3e2723;
    }

    .btn-pengingat:hover {
        background: #f9a825;
    }

    .empty {
        text-align: center;
        padding: 28px;
        color: #607d8b;
        font-weight: 600;
    }

    @media (max-width: 992px) {
        .page-wrapper { margin: 20px; padding: 20px; }
        table { font-size: 13px; }
        .filter-form input, .filter-form select { width: 100%; }
    }
</style>

    {{-- HEADER --}}
    <div class="page-header">
        <div>
            <h2 class="page-title">Data Pengembalian</h2>
            <p class="page-subtitle">Daftar alat yang masih dalam status peminjaman dan perlu pengingat.</p>
        </div>

        {{-- FILTER & SEARCH --}}
        <form action="{{ route('pengembalian.index') }}" method="GET" class="filter-form">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama alat / kelompok...">
            <select name="filter_status">
                <option value="">Semua Status</option>
                <option value="1" {{ request('filter_status') == 1 ? 'selected' : '' }}>Dipinjam</option>
                <option value="2" {{ request('filter_status') == 2 ? 'selected' : '' }}>Perlu Pengingat</option>
            </select>
            <button type="submit">Filter</button>
        </form>
    </div>

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div style="background:#e8f5e9; color:#2e7d32; padding:8px 12px; border-radius:6px; margin-bottom:15px; font-size:14px;">
            {{ session('success') }}
        </div>
    @endif

    {{-- TABEL UTAMA --}}
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Alat</th>
                    <th>Jumlah</th>
                    <th>Kelompok Tani</th>
                    <th>Tanggal Pinjam</th>
                    <th>Status</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->alat->nama_alat }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->peminjaman->kelompokTani->nama_kelompoktani ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->peminjaman->tanggal_pinjam)->translatedFormat('d F Y') }}</td>
                        <td>
                            @php $status = $item->peminjaman->id_status ?? 1; @endphp
                            @if($status == 1)
                                <span class="status status-1">Dipinjam</span>
                            @elseif($status == 2)
                                <span class="status status-2">Perlu Pengingat</span>
                            @else
                                <span class="status status-3">Dikembalikan</span>
                            @endif
                        </td>
                        <td style="text-align:center;">
                            <form action="{{ route('pengembalian.kembalikan') }}" method="POST" style="display:inline-block;">
                                @csrf
                                <input type="hidden" name="id_pinjam" value="{{ $item->id_pinjam }}">
                                <input type="hidden" name="id_alat" value="{{ $item->id_alat }}">
                                <button type="submit" class="btn-aksi btn-kembali">Kembalikan</button>
                            </form>

                            <form action="{{ route('pengembalian.perluPengingat', $item->id_pinjam) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn-aksi btn-pengingat">Perlu Pengingat</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="empty">Belum ada data alat yang perlu dikembalikan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
