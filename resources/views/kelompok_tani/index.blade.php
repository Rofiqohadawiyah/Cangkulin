@extends('layout')

@section('content')
<h2>Data Kelompok Tani</h2>

<a href="{{ route('kelompok.create') }}" style="background:#43a047;color:white;padding:7px 15px;border-radius:4px;text-decoration:none;">+ Tambah Kelompok</a>

<table border="1" width="100%" cellpadding="8" style="margin-top:15px;">
    <tr style="background:#c5e1a5;">
        <th>No</th>
        <th>ID</th>
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

    @foreach($kelompok as $k)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $k->id_kelompoktani }}</td>
        <td>{{ $k->nama_kelompoktani }}</td>
        <td>{{ $k->jumlah_kelompoktani }}</td>
        <td>{{ $k->no_hp_kelompoktani }}</td>
        <td>{{ $k->desa }}</td>
        <td>{{ $k->kecamatan }}</td>
        <td>{{ $k->kabupaten }}</td>
        <td>{{ $k->nik }}</td>
        <td>{{ $k->deskripsi_jalan }}</td>
        <td>
            <a href="{{ route('kelompok.edit', $k->id_kelompoktani) }}" class="btn btn-orange">Edit</a>
            <a href="{{ route('kelompok.delete', $k->id_kelompoktani) }}" class="btn btn-red" onclick="return confirm('Hapus data?')">Hapus</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
