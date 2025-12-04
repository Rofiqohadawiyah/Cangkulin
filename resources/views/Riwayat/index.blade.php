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

    /* WRAPPER */
    .riwayat-bg {
        max-width: 1200px;
        margin: 40px auto;
        background: #f1f8f4;
        border-radius: 12px;
        padding: 28px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    }

    /* HEADER + FILTER */
    .header-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
    }

    .riwayat-title {
        font-size: 24px;
        font-weight: 800;
        color: #1b5e20;
        margin: 0;
    }

    .riwayat-subtitle {
        font-size: 14px;
        color: #607d8b;
        margin-top: 4px;
    }

    /* FILTER MIRIP PENGEMBALIAN */
    .filter-box {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        align-items: center;
    }

    .filter-box input {
        border: 1px solid #a5d6a7;
        border-radius: 8px;
        padding: 8px 12px;
        font-size: 14px;
        outline: none;
        background: #fff;
        min-width: 180px;
        transition: 0.2s;
    }

    .filter-box input:focus {
        border-color: #43a047;
        box-shadow: 0 0 4px rgba(67, 160, 71, 0.3);
    }

    .filter-box button {
        background: #2e7d32;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 8px 16px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
    }

    .filter-box button:hover {
        background: #256427;
    }

    /* TABEL */
    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
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
        border: 1px solid #c8dec8;
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

    .empty-row {
        text-align: center;
        padding: 28px;
        color: #607d8b;
        font-weight: 600;
    }

    @media (max-width: 992px) {
        .riwayat-bg {
            margin: 20px;
            padding: 20px;
        }

        .filter-box input,
        .filter-box button {
            width: 100%;
        }

        .header-row {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<div class="riwayat-bg">

    {{-- HEADER + FILTER (kanan) --}}
    <div class="header-row">
        <div>
            <h2 class="riwayat-title">Riwayat</h2>
            <p class="riwayat-subtitle">Daftar riwayat alat yang sudah atau pernah dipinjam.</p>
        </div>

        <form method="GET" action="{{ route('riwayat.index') }}" class="filter-box">
            <input type="text" name="kelompok" placeholder="Cari nama kelompok..." value="{{ request('kelompok') }}">
            <input type="date" name="tanggal" value="{{ request('tanggal') }}">
            <button type="submit">Filter</button>
        </form>
    </div>

    {{-- TABLE --}}
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>Nama Alat</th>
                    <th>Jumlah</th>
                    <th>Kelompok Tani</th>
                    <th>Tgl Pinjam</th>
                    <th>Tenggat</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($riwayat as $item)
                    <tr>
                        <td>{{ $item->nama_alat }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->nama_kelompoktani }}</td>
                        <td>{{ $item->tanggal_pinjam }}</td>
                        <td>{{ $item->tenggat_pinjam }}</td>
                        <td>{{ $item->status_peminjaman }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty-row">Tidak ada data ditemukan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
