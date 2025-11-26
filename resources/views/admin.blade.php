@extends('layout')

@section('title', 'Data Admin')

@section('content')
    <div class="page-header">
        <h1>Data Admin</h1>
        <p>Daftar admin yang terdaftar dalam sistem Cangkulin.</p>
    </div>

    <div class="card">
        <div class="table-wrapper">
            <table>
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
                    @foreach($admin as $a)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $a->nama_admin }}</td>
                            <td>{{ $a->email }}</td>
                            <td>{{ $a->no_hp_admin }}</td>
                            <td>{{ $a->username }}</td>
                        </tr>
                    @endforeach

                    @if($admin->isEmpty())
                        <tr>
                            <td colspan="5" style="text-align:center; color:#78909c; padding:14px;">
                                Belum ada data admin.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
