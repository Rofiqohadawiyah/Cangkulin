@extends('layout')

@section('content')
<div style="background:white; padding:20px; border-radius:10px; box-shadow:0 0 10px #ccc;">

    <h2 style="color:#2e7d32; margin-bottom:20px;">Data Admin</h2>

    <table width="100%" cellspacing="0" cellpadding="10"
        style="border-collapse: collapse;">

        <tr style="background:#a5d6a7; color:#1b5e20;">
            <th style="border-bottom:2px solid #ccc;">No</th>
            <th style="border-bottom:2px solid #ccc;">Nama Admin</th>
            <th style="border-bottom:2px solid #ccc;">Email</th>
            <th style="border-bottom:2px solid #ccc;">No HP</th>
            <th style="border-bottom:2px solid #ccc;">Username</th>
        </tr>

        @foreach($admin as $a)
        <tr style="background:#f1f8e9;">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $a->nama_admin }}</td>
            <td>{{ $a->email }}</td>
            <td>{{ $a->no_hp_admin }}</td>
            <td>{{ $a->username }}</td>
        </tr>
        @endforeach
    </table>

</div>
@endsection
