@extends('layout')

@section('content')

<style>
    /* === BACKGROUND & GLOBAL RESET === */
    body {
        margin: 0;
        padding: 0;
        background: 
            linear-gradient(rgba(46, 125, 50, 0.25), rgba(46, 125, 50, 0.25)),
            url('{{ asset('img/hero8.png') }}') center/cover no-repeat fixed;
        background-attachment: fixed;
        font-family: 'Poppins', sans-serif;
    }

    /* === WRAPPER KONTEN UTAMA === */
    .page-wrapper {
        max-width: 1200px;
        margin: 40px auto;
        background: #f1f8f4;
        border-radius: 12px;
        padding: 28px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    /* === HEADER (judul dan tombol tambah) === */
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

    /* === TOMBOL TAMBAH === */
    .btn-add {
        background: #2e7d32;
        color: white;
        padding: 10px 18px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: 0.2s;
    }

    .btn-add:hover {
        background: #256427;
    }

    /* === TABEL === */
    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    thead {
        background: #2e7d32;
        color: white;
    }

    th, td {
        padding: 12px 16px;
        text-align: left;
        font-size: 14px;
    }

    th {
        font-weight: 600;
    }

    tbody tr:nth-child(even) {
        background: #f9fbe7;
    }

    tbody tr:hover {
        background: #e8f5e9;
        transition: 0.2s;
    }

    /* === TOMBOL AKSI === */
    .aksi-container {
        display: flex;
        gap: 8px;
    }

    .btn-edit, .btn-delete {
        font-size: 13px;
        font-weight: 600;
        border-radius: 8px;
        padding: 6px 16px;
        text-decoration: none;
        transition: 0.2s;
        display: inline-block;
    }

    .btn-edit {
        background: #4caf50;
        color: white;
    }

    .btn-edit:hover {
        background: #388e3c;
    }

    .btn-delete {
        background: #e57373;
        color: white;
    }

    .btn-delete:hover {
        background: #c62828;
    }

    /* === RESPONSIVE === */
    @media (max-width: 992px) {
        .page-wrapper {
            margin: 20px;
            padding: 20px;
        }

        table {
            font-size: 13px;
        }

        .btn-add {
            padding: 8px 14px;
            font-size: 13px;
        }
    }
</style>

    <div class="page-header">
        <div>
            <h2 class="page-title">Data Kelompok Tani</h2>
            <p class="page-subtitle">Daftar kelompok tani yang terdaftar dalam sistem Cangkulin.</p>
        </div>
        <a href="{{ route('kelompok.create') }}" class="btn-add">+ Tambah Kelompok</a>
    </div>

    {{-- TABEL DATA --}}
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>No HP</th>
                <th>Desa</th>
                <th>Kecamatan</th>
                <th>Kabupaten</th>
                <th>NIK</th>
                <th>Deskripsi Jalan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kelompok as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->nama_kelompoktani }}</td>
                    <td>{{ $k->jumlah_kelompoktani }}</td>
                    <td>{{ $k->no_hp_kelompoktani }}</td>
                    <td>{{ $k->desa }}</td>
                    <td>{{ $k->kecamatan }}</td>
                    <td>{{ $k->kabupaten }}</td>
                    <td>{{ $k->nik }}</td>
                    <td>{{ $k->deskripsi_jalan }}</td>
                    <td>
                        <div class="aksi-container">
                            <a href="{{ route('kelompok.edit', $k->id_kelompoktani) }}" class="btn-edit">Edit</a>
                            <a href="{{ route('kelompok.delete', $k->id_kelompoktani) }}"
                               class="btn-delete"
                               onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" style="text-align:center; color:#78909c; padding:14px;">
                        Belum ada data kelompok tani.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
