@extends('layout')

@section('content')
<h2>Tambah Kelompok Tani</h2>

<div style="background:white; padding:20px; border-radius:6px; border:1px solid #c8e6c9; width:500px;">
    <form action="{{ route('kelompok.store') }}" method="POST">
        @csrf

        <label>Nama Kelompok</label><br>
        <input type="text" name="nama_kelompoktani" required style="width:100%; padding:7px; border:1px solid #aaa; border-radius:4px;"><br><br>

        <label>Jumlah Anggota</label><br>
        <input type="number" name="jumlah_kelompoktani" required style="width:100%; padding:7px; border:1px solid #aaa; border-radius:4px;"><br><br>

        <label>No HP</label><br>
        <input type="text" name="no_hp_kelompoktani" required style="width:100%; padding:7px; border:1px solid #aaa; border-radius:4px;"><br><br>

        <label>Desa / Kecamatan / Kabupaten</label><br>
        <input type="text" name="desa" required style="width:100%; padding:7px; border:1px solid #aaa; border-radius:4px;" placeholder="Desa"><br><br>
        <input type="text" name="kecamatan" required style="width:100%; padding:7px; border:1px solid #aaa; border-radius:4px;" placeholder="Kecamatan"><br><br>
        <input type="text" name="kabupaten" required style="width:100%; padding:7px; border:1px solid #aaa; border-radius:4px;" placeholder="Kabupaten"><br><br>

        <label>NIK</label><br>
        <input type="text" name="nik" required style="width:100%; padding:7px; border:1px solid #aaa; border-radius:4px;"><br><br>

        <label>Deskripsi Jalan</label><br>
        <textarea name="deskripsi_jalan" style="width:100%; padding:7px; border:1px solid #aaa; border-radius:4px;"></textarea><br><br>

        <button type="submit" style="background:#43a047; color:white; padding:8px 14px; border:none; border-radius:5px;">Simpan</button>
        <a href="{{ route('kelompok.index') }}" style="margin-left:10px; color:#ef6c00; text-decoration:none;">Kembali</a>
    </form>
</div>
@endsection