<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        $filterKelompok = $request->get('kelompok');
        $filterTanggal = $request->get('tanggal');

        $query = DB::table('detail_peminjaman')
            ->join('peminjaman', 'detail_peminjaman.id_pinjam', '=', 'peminjaman.id_pinjam')
            ->join('alat_pertanian', 'detail_peminjaman.id_alat', '=', 'alat_pertanian.id_alat')
            ->join('kelompok_tani', 'peminjaman.id_kelompoktani', '=', 'kelompok_tani.id_kelompoktani')
            ->join('status', 'peminjaman.id_status', '=', 'status.id_status')
            ->select(
                'alat_pertanian.nama_alat',
                'detail_peminjaman.jumlah',
                'kelompok_tani.nama_kelompoktani',
                'peminjaman.tanggal_pinjam',
                'peminjaman.tenggat_pinjam',
                'status.deskripsi as status_peminjaman'
            )
            ->orderBy('peminjaman.tanggal_pinjam', 'desc');

        if (!empty($filterKelompok)) {
            $query->where('kelompok_tani.nama_kelompoktani', 'like', "%$filterKelompok%");
        }

        if (!empty($filterTanggal)) {
            $query->whereDate('peminjaman.tanggal_pinjam', $filterTanggal);
        }

        $riwayat = $query->get();

        return view('riwayat.index', compact('riwayat'));
    }
}