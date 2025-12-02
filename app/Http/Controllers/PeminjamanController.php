<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = DB::table('peminjaman')
            ->leftJoin('kelompok_tani', 'peminjaman.id_kelompoktani', '=', 'kelompok_tani.id_kelompoktani')
            ->leftJoin('admin', 'peminjaman.id_admin', '=', 'admin.id_admin')
            ->leftJoin('status', 'peminjaman.id_status', '=', 'status.id_status')
            ->select(
                'peminjaman.*',
                'kelompok_tani.nama_kelompoktani',
                'admin.nama_admin',
                'status.deskripsi as status_deskripsi'
            )
            ->orderBy('peminjaman.id_pinjam', 'desc')
            ->get();

        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $kelompok = DB::table('kelompok_tani')->get();
        $alat     = DB::table('alat_pertanian')->get();
        $status   = DB::table('status')->get();

        return view('peminjaman.create', compact('kelompok', 'alat', 'status'));
    }

    public function store(Request $request)
    {
        // 🧩 VALIDASI DASAR
        $request->validate([
            'tanggal_pinjam'  => 'required|date',
            'tenggat_pinjam'  => 'nullable|date|after_or_equal:tanggal_pinjam',
            'id_kelompoktani' => 'required|exists:kelompok_tani,id_kelompoktani',
            'id_status'       => 'required|exists:status,id_status',
            'id_alat'         => 'required|array|min:1',
            'id_alat.*'       => 'exists:alat_pertanian,id_alat',
        ], [
            'id_alat.required' => 'Pilih minimal 1 alat untuk dipinjam.'
        ]);

        // 🧠 Filter alat yang valid saja
        $idAlatDipilih = array_filter($request->id_alat ?? [], fn($id) => !empty($id));

        if (empty($idAlatDipilih)) {
            return back()->withErrors(['id_alat' => 'Pilih minimal 1 alat untuk dipinjam.'])->withInput();
        }

        DB::beginTransaction();
        try {
            // 🧱 Simpan ke tabel peminjaman
            $idPinjam = DB::table('peminjaman')->insertGetId([
                'tanggal_pinjam'  => $request->tanggal_pinjam,
                'tenggat_pinjam'  => $request->tenggat_pinjam,
                'id_kelompoktani' => $request->id_kelompoktani,
                'id_admin'        => auth()->user()->id_admin ?? 1,
                'id_status'       => $request->id_status,
                'created_at'      => now(),
                'updated_at'      => now(),
            ]);

            // 🧩 Simpan detail alat yang dipilih
            foreach ($idAlatDipilih as $idAlat) {
                $jumlah = isset($request->jumlah[$idAlat]) ? max(1, (int)$request->jumlah[$idAlat]) : 1;

                DB::table('detail_peminjaman')->insert([
                    'id_pinjam' => $idPinjam,
                    'id_alat'   => $idAlat,
                    'jumlah'    => $jumlah,
                ]);
            }

            DB::commit();
            return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()])->withInput();
        }
    }
}
