<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPeminjaman;
use App\Models\Pengembalian;
use App\Models\Peminjaman;
use Carbon\Carbon;

class PengembalianController extends Controller
{
    /**
     * =============================
     *  HALAMAN DAFTAR PENGEMBALIAN
     * =============================
     */
    public function index(Request $request)
    {
        $query = DetailPeminjaman::with(['peminjaman.kelompokTani', 'alat'])
                    ->doesntHave('pengembalian');

        // 🔍 FITUR SEARCH — berdasarkan nama alat
        if ($request->has('search') && $request->search != '') {
            $query->whereHas('alat', function ($q) use ($request) {
                $q->where('nama_alat', 'like', '%'.$request->search.'%');
            });
        }

        $data = $query->get();

        return view('pengembalian.index', compact('data'));
    }

    /**
     * =============================
     *  PROSES KEMBALIKAN ALAT
     * =============================
     */
    public function kembalikan(Request $request)
    {
        $id_pinjam = $request->id_pinjam;
        $id_alat = $request->id_alat;

        $detail = DetailPeminjaman::where('id_pinjam', $id_pinjam)
                    ->where('id_alat', $id_alat)
                    ->firstOrFail();

        // 🔒 CEGAH DUPLIKAT PENGEMBALIAN
        if (Pengembalian::where('id_pinjam', $id_pinjam)->exists()) {
            return redirect()->back()->with('warning', 'Data ini sudah dikembalikan sebelumnya.');
        }

        // 💾 SIMPAN DATA PENGEMBALIAN
        Pengembalian::create([
            'id_pinjam' => $id_pinjam,
            'tanggal_pengembalian' => Carbon::now(),
        ]);

        // 🔄 UBAH STATUS PEMINJAMAN MENJADI "DIKEMBALIKAN"
        $detail->peminjaman->update([
            'id_status' => 3, // pastikan 3 = 'Dikembalikan'
        ]);

        return redirect()->route('pengembalian.index')->with('success', 'Barang berhasil dikembalikan.');
    }

    /**
     * =============================
     *  UBAH STATUS JADI PENGINGAT
     * =============================
     */
    public function perluPengingat($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // 🔄 UPDATE STATUS MENJADI "PERLU PENGINGAT"
        $peminjaman->update([
            'id_status' => 2, // pastikan 2 = 'Perlu Pengingat'
        ]);

        return redirect()->route('pengembalian.index')->with('success', 'Status diubah menjadi Perlu Pengingat.');
    }
}
