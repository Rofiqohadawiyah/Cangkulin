@extends('layout')

@section('content')

<style>
    body {
        margin: 0;
        padding: 0;
        background:
            linear-gradient(rgba(46, 125, 50, 0.25), rgba(46, 125, 50, 0.25)),
            url('{{ asset('img/hero9.jpg') }}') center/cover no-repeat fixed;
        background-attachment: fixed;
        font-family: 'Poppins', sans-serif;
    }

    .page-wrapper {
        max-width: 1200px;
        margin: 40px auto;
        background: #f1f8f4;
        border-radius: 12px;
        padding: 28px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

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

    .alat-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 18px;
        margin-top: 10px;
    }

    .alat-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 12px;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
    }

    .alat-img-wrap {
        width: 100%;
        height: 180px;
        border-radius: 10px;
        overflow: hidden;
        background: #f1f1f1;
        margin-bottom: 8px;
    }

    .alat-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .alat-name {
        font-size: 15px;
        font-weight: bold;
        color: #1b5e20;
        margin-bottom: 4px;
    }

    .alat-info {
        font-size: 13px;
        color: #607d8b;
        margin-bottom: 6px;
    }

    .badge-status {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 600;
        margin-top: 4px;
    }

    .badge-green {
        background: #c8e6c9;
        color: #1b5e20;
    }

    .badge-red {
        background: #ffcdd2;
        color: #b71c1c;
    }

    .alat-actions {
        display: flex;
        justify-content: center;
        gap: 8px;
        margin-top: 10px;
    }

    .btn-small {
        padding: 6px 18px;
        font-size: 13px;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        transition: 0.2s;
    }

    .btn-edit {
        background: #4CAF50;
        color: white;
    }

    .btn-edit:hover {
        background: #388E3C;
    }

    .btn-delete {
        background: #e57373;
        color: white;
    }

    .btn-delete:hover {
        background: #c62828;
    }

    @media (max-width: 992px) {
        .page-wrapper {
            margin: 20px;
            padding: 20px;
        }
        .alat-grid {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        }
    }
</style>

    <div class="page-header">
        <div>
            <h2 class="page-title">Alat Pertanian</h2>
            <p class="page-subtitle">Daftar alat yang dikelola admin. Kamu bisa menambah, mengubah, dan menghapus alat di sini.</p>
        </div>

        <a href="{{ route('alat.create') }}" class="btn-add">+ Tambah Alat</a>
    </div>

    @if(session('success'))
        <div style="background:#e8f5e9; color:#2e7d32; padding:8px 12px; border-radius:6px; margin-bottom:15px; font-size:14px;">
            {{ session('success') }}
        </div>
    @endif

    @if($alat->count())
        <div class="alat-grid">
            @foreach($alat as $item)
                <div class="alat-card">
                    <div class="alat-img-wrap">
                        @if($item->gambar_alat)
                            <img src="{{ asset('uploads/alat/'.$item->gambar_alat) }}" alt="{{ $item->nama_alat }}">
                        @else
                            <img src="{{ asset('img/default-alat.jpg') }}" alt="Alat Pertanian">
                        @endif
                    </div>

                    <div class="alat-name">{{ $item->nama_alat }}</div>
                    <div class="alat-info">Jumlah tersedia: <strong>{{ $item->jumlah }}</strong></div>

                    @if($item->jumlah > 0)
                        <span class="badge-status badge-green">Tersedia</span>
                    @else
                        <span class="badge-status badge-red">Habis</span>
                    @endif

                    <div class="alat-actions">
                        <a href="{{ route('alat.edit', $item->id_alat) }}" class="btn-small btn-edit">Edit</a>
                        <a href="{{ route('alat.delete', $item->id_alat) }}"
                           class="btn-small btn-delete"
                           onclick="return confirm('Yakin ingin menghapus alat ini?')">Hapus</a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p style="text-align:center; color:#607d8b; margin-top:20px;">
            Belum ada data alat. Klik <strong>+ Tambah Alat</strong> untuk menambahkan.
        </p>
    @endif

@endsection
