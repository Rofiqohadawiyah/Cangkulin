<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $start = $request->start;
        $end   = $request->end;

        $query = Peminjaman::with(['kelompokTani', 'status', 'detailPeminjaman.alat']);

        if ($start && $end) {
            $query->whereBetween('tanggal_pinjam', [$start, $end]);
        }

        $data = $query->orderBy('tanggal_pinjam', 'desc')->get();

        // ================================
        // GRAFIK ALAT PALING BANYAK DIPINJAM
        // ================================
        $group = []; // [id_alat => ['nama' => ..., 'total' => ...]]

        foreach ($data as $pinjam) {
            foreach ($pinjam->detailPeminjaman as $detail) {
                $alatId = $detail->id_alat;

                if (!isset($group[$alatId])) {
                    $group[$alatId] = [
                        'nama'  => optional($detail->alat)->nama_alat ?? 'Tidak diketahui',
                        'total' => 0,
                    ];
                }

                // kalau mau berdasarkan jumlah pinjam, ganti 1 jadi $detail->jumlah / qty
                $group[$alatId]['total']++;
            }
        }

        // siapkan data untuk Chart.js
        $labels = [];
        $values = [];

        foreach ($group as $alatId => $item) {
            $labels[] = $item['nama'];
            $values[] = $item['total'];
        }

        return view('laporan.index', [
            'data'   => $data,
            'labels' => $labels,
            'values' => $values,
            'start'  => $start,
            'end'    => $end,
        ]);
    }
}