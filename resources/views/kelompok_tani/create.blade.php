@extends('layout')

@section('content')

<style>
    body {
        background: linear-gradient(rgba(46, 125, 50, 0.25), rgba(46, 125, 50, 0.25)),
                    url('{{ asset('img/hero7.png') }}') center/cover fixed no-repeat;
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
    }

    .form-container {
        background: #f1f8f4;
        padding: 32px;
        border-radius: 14px;
        box-shadow: 0 8px 28px rgba(0,0,0,0.15);
        width: 92%;
        max-width: 700px;
        margin: 40px auto;
        border: 1px solid #c8e6c9;
    }

    h2 {
        color: #1b5e20;
        font-weight: 800;
        margin-bottom: 6px;
        text-align: center;
    }

    p.description {
        color: #607d8b;
        font-size: 14px;
        text-align: center;
        margin-top: -2px;
        margin-bottom: 18px;
    }

    label {
        font-weight: 700;
        color: #4caf50;
        display: block;
        font-size: 14px;
        margin-top: 12px;
        margin-bottom: 6px;
    }

    input, textarea {
        width: 100%;
        padding: 10px 12px;
        border-radius: 8px;
        border: 1px solid #c8e6c9;
        outline: none;
        font-size: 14px;
        color: #374151;
        background: white;
        transition: 0.25s;
        margin-bottom: 12px;
    }

    input:focus, textarea:focus {
        border-color: #43a047;
        box-shadow: 0 0 5px rgba(67,160,71,0.35);
    }

    .is-invalid {
        border-color: #e53935 !important;
        background: #ffebee !important;
    }

    .text-danger {
        color: #c62828;
        font-size: 13px;
        margin-top: -8px;
        margin-bottom: 8px;
    }

    .alert-error {
        background:#ffebee;
        color:#b71c1c;
        padding:10px 14px;
        border-radius:10px;
        margin-bottom:14px;
        font-size:14px;
        border: 1px solid #ffcdd2;
    }

    .btn-submit {
        width: 100%;
        padding: 12px;
        background: #43a047;
        border: none;
        color: white;
        border-radius: 10px;
        font-size: 16px;
        cursor: pointer;
        font-weight: 700;
        transition: 0.25s;
        margin-top: 18px;
    }

    .btn-submit:hover {
        background: #2e7d32;
        transform: translateY(-1px);
    }

    .btn-back {
        width: 100%;
        padding: 11px;
        text-align: center;
        display: inline-block;
        margin-top: 10px;
        background: #ef6c00;
        color: white;
        border-radius: 10px;
        font-weight: 700;
        text-decoration: none;
        font-size: 15px;
        transition: 0.25s;
    }

    .btn-back:hover {
        background: #d84315;
        transform: translateY(-1px);
    }
</style>

<div class="form-container">
    <h2>Tambah Kelompok Tani</h2>
    <p class="description">Lengkapi data kelompok tani.</p>

    @if ($errors->any())
        <div class="alert-error">
            <strong>Periksa kembali input Anda:</strong>
            <ul style="margin-top: 6px; padding-left: 18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kelompok.store') }}" method="POST">
        @csrf

        <label>Nama Kelompok</label>
        <input type="text" name="nama_kelompoktani"
               value="{{ old('nama_kelompoktani') }}"
               class="@error('nama_kelompoktani') is-invalid @enderror">
        @error('nama_kelompoktani') <div class="text-danger">{{ $message }}</div> @enderror

        <label>Jumlah Anggota</label>
        <input type="number" name="jumlah_kelompoktani"
               value="{{ old('jumlah_kelompoktani') }}"
               class="@error('jumlah_kelompoktani') is-invalid @enderror">
        @error('jumlah_kelompoktani') <div class="text-danger">{{ $message }}</div> @enderror

        <label>No HP</label>
        <input type="text" name="no_hp_kelompoktani"
               value="{{ old('no_hp_kelompoktani') }}"
               class="@error('no_hp_kelompoktani') is-invalid @enderror">
        @error('no_hp_kelompoktani') <div class="text-danger">{{ $message }}</div> @enderror

        <label>Kabupaten</label>
        <input type="text" name="kabupaten"
               value="{{ old('kabupaten') }}"
               class="@error('kabupaten') is-invalid @enderror">
        @error('kabupaten') <div class="text-danger">{{ $message }}</div> @enderror

        <label>Kecamatan</label>
        <input type="text" name="kecamatan"
               value="{{ old('kecamatan') }}"
               class="@error('kecamatan') is-invalid @enderror">
        @error('kecamatan') <div class="text-danger">{{ $message }}</div> @enderror

        <label>Desa</label>
        <input type="text" name="desa"
               value="{{ old('desa') }}"
               class="@error('desa') is-invalid @enderror">
        @error('desa') <div class="text-danger">{{ $message }}</div> @enderror

        <label>NIK</label>
        <input type="text" name="nik"
               value="{{ old('nik') }}"
               class="@error('nik') is-invalid @enderror">
        @error('nik') <div class="text-danger">{{ $message }}</div> @enderror

        <label>Deskripsi Jalan</label>
        <textarea name="deskripsi_jalan" rows="3"
                  class="@error('deskripsi_jalan') is-invalid @enderror">{{ old('deskripsi_jalan') }}</textarea>
        @error('deskripsi_jalan') <div class="text-danger">{{ $message }}</div> @enderror

        <button type="submit" class="btn-submit">Simpan</button>
        <a href="{{ route('kelompok.index') }}" class="btn-back">Kembali</a>
    </form>
</div>

@endsection
