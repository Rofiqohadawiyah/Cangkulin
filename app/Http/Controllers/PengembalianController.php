<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPeminjaman;
use App\Models\Pengembalian;
use App\Models\Peminjaman;
use Carbon\Carbon;

class PengembalianController extends Controller
{
    public function index(Request $request)
    {
        $query = DetailPeminjaman::with(['peminjaman.kelompokTani', 'alat'])
                    ->doesntHave('pengembalian');

        if ($request->has('search') && $request->search != '') {
            $query->whereHas('alat', function ($q) use ($request) {
                $q->where('nama_alat', 'like', '%'.$request->search.'%');
            });
        }

        $data = $query->get();

        return view('pengembalian.index', compact('data'));
    }

    public function kembalikan(Request $request)
    {
        $id_pinjam = $request->id_pinjam;
        $id_alat = $request->id_alat;

        $detail = DetailPeminjaman::where('id_pinjam', $id_pinjam)
                    ->where('id_alat', $id_alat)
                    ->firstOrFail();

        if (Pengembalian::where('id_pinjam', $id_pinjam)->exists()) {
            return redirect()->back()->with('warning', 'Data ini sudah dikembalikan sebelumnya.');
        }

        Pengembalian::create([
            'id_pinjam' => $id_pinjam,
            'tanggal_pengembalian' => Carbon::now(),
        ]);

        $detail->peminjaman->update([
            'id_status' => 3,
        ]);

        return redirect()->route('pengembalian.index')->with('success', 'Barang berhasil dikembalikan.');
    }

    public function perluPengingat($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'id_status' => 2,
        ]);

        return redirect()->route('pengembalian.index')->with('success', 'Status diubah menjadi Perlu Pengingat.');
    }
}
