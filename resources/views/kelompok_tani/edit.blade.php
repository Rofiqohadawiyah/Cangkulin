@extends('layout')

@section('content')
<h2>Edit Kelompok Tani</h2>

<div style="background:white; padding:20px; border-radius:6px; border:1px solid #c8e6c9; width:500px;">
    <form action="{{ route('kelompok.update', $kelompok->id_kelompoktani) }}" method="POST">
        @csrf

        <label>Nama Kelompok</label><br>
        <input type="text" name="nama_kelompoktani" value="{{ $kelompok->nama_kelompoktani }}" required style="width:100%; padding:7px; border:1px solid #aaa; border-radius:4px;"><br><br>

        <label>Jumlah Anggota</label><br>
        <input type="number" name="jumlah_kelompoktani" value="{{ $kelompok->jumlah_kelompoktani }}" required style="width:100%; padding:7px; border:1px solid #aaa; border-radius:4px;"><br><br>

        <label>No HP</label><br>
        <input type="text" name="no_hp_kelompoktani" value="{{ $kelompok->no_hp_kelompoktani }}" required style="width:100%; padding:7px; border:1px solid #aaa; border-radius:4px;"><br><br>

        <label>Desa / Kecamatan / Kabupaten</label><br>
        <input type="text" name="desa" value="{{ $kelompok->desa }}" required style="width:100%; padding:7px; border:1px solid #aaa; border-radius:4px;"><br><br>
        <input type="text" name="kecamatan" value="{{ $kelompok->kecamatan }}" required style="width:100%; padding:7px; border:1px solid #aaa; border-radius:4px;"><br><br>
        <input type="text" name="kabupaten" value="{{ $kelompok->kabupaten }}" required style="width:100%; padding:7px; border:1px solid #aaa; border-radius:4px;"><br><br>

        <label>NIK</label><br>
        <input type="text" name="nik" value="{{ $kelompok->nik }}" required style="width:100%; padding:7px; border:1px solid #aaa; border-radius:4px;"><br><br>

        <label>Deskripsi Jalan</label><br>
        <textarea name="deskripsi_jalan" style="width:100%; padding:7px; border:1px solid #aaa; border-radius:4px;">{{ $kelompok->deskripsi_jalan }}</textarea><br><br>

        <button type="submit" style="background:#43a047; color:white; padding:8px 14px; border:none; border-radius:5px;">Update</button>
        <a href="{{ route('kelompok.index') }}" style="margin-left:10px; color:#ef6c00; text-decoration:none;">Kembali</a>
    </form>
</div>
@endsection
