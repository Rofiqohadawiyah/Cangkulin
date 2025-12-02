@extends('layout')

@section('title', 'Data Admin')

@section('content')

<style>
    /* === LATAR BELAKANG DAN TEMA WARNA === */
    body {
        background: url('{{ asset('img/hero9.jpg') }}') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Poppins', sans-serif;
    }

    
    .admin-container {
        background: #f1f8f4;
        padding: 24px;
        border-radius: 12px;
        max-width: 1200px;
        margin: 40px auto;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    }

    /* === HEADER === */
    .admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 18px;
    }

    .admin-header h2 {
        color: #1b5e20;
        font-weight: 800;
        margin: 0;
    }

    .admin-header p {
        color: #607d8b;
        font-size: 14px;
        margin: 4px 0 0;
    }

    /* === TABEL === */
    .admin-table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 12px;
        overflow: hidden;
        background: #ffffff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .admin-table th {
        background: #2e7d32;
        color: #ffffff;
        font-weight: 600;
        font-size: 14px;
        text-align: left;
        padding: 12px 16px;
    }

    .admin-table td {
        padding: 12px 16px;
        font-size: 14px;
        color: #1b5e20;
        border-bottom: 1px solid #e0e0e0;
    }

    .admin-table tr:hover {
        background: #e8f5e9;
        transition: 0.2s;
    }

    /* === BARIS KOSONG === */
    .admin-table-empty {
        text-align: center;
        color: #78909c;
        padding: 14px;
        font-size: 14px;
    }

    /* === CARD BAYANGAN & TOMBOL === */
    .btn-green {
        padding: 8px 16px;
        border-radius: 999px;
        background: #2e7d32;
        color: #fff;
        font-weight: 600;
        text-decoration: none;
        transition: 0.2s;
    }

    .btn-green:hover {
        background: #256427;
    }

    /* === FOOTER === */
    footer {
        text-align: center;
        color: #607d8b;
        font-size: 13px;
        margin-top: 30px;
    }
</style>

<div class="admin-container">
    <div class="admin-header">
        <div>
            <h2>Data Admin</h2>
            <p>Daftar admin yang terdaftar dalam sistem Cangkullin.</p>
        </div>

        {{-- Tombol nambah admin kalau kamu butuh --}}
        {{-- <a href="{{ route('admin.create') }}" class="btn-green">+ Tambah Admin</a> --}}
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Admin</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Username</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($admin as $a)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $a->nama_admin }}</td>
                    <td>{{ $a->email }}</td>
                    <td>{{ $a->no_hp_admin }}</td>
                    <td>{{ $a->username }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="admin-table-empty">
                        Belum ada data admin.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


@endsection
