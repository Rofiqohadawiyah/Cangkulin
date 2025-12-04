<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelompokTaniController extends Controller
{
    public function index()
    {
        $kelompok = DB::table('kelompok_tani')
            ->join('alamat', 'kelompok_tani.id_alamat', '=', 'alamat.id_alamat')
            ->select(
                'kelompok_tani.*',
                'alamat.desa',
                'alamat.kecamatan',
                'alamat.kabupaten'
            )
            ->get();

        return view('kelompok_tani.index', compact('kelompok'));
    }

    public function create()
    {
        return view('kelompok_tani.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelompoktani' => 'required|string|max:100',
            'jumlah_kelompoktani' => 'required|integer|min:1',
            'no_hp_kelompoktani' => 'required|string|max:20',
            'nik' => 'required|digits:16',
            'desa' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'kabupaten' => 'required|string|max:100',
            'deskripsi_jalan' => 'nullable|string|max:255',
        ]);
        
        $id_alamat = DB::table('alamat')->insertGetId([
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
        ]);

        DB::table('kelompok_tani')->insert([
            'nama_kelompoktani' => $request->nama_kelompoktani,
            'jumlah_kelompoktani' => $request->jumlah_kelompoktani,
            'no_hp_kelompoktani' => $request->no_hp_kelompoktani,
            'nik' => $request->nik,
            'deskripsi_jalan' => $request->deskripsi_jalan,
            'id_alamat' => $id_alamat,
            'is_active' => 1,
        ]);

        return redirect()->route('kelompok.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kelompok = DB::table('kelompok_tani')
            ->join('alamat', 'kelompok_tani.id_alamat', '=', 'alamat.id_alamat')
            ->where('id_kelompoktani', $id)
            ->select(
                'kelompok_tani.*',
                'alamat.desa',
                'alamat.kecamatan',
                'alamat.kabupaten',
                'alamat.id_alamat'
            )
            ->first();

        return view('kelompok_tani.edit', compact('kelompok'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelompoktani' => 'required|string|max:100',
            'jumlah_kelompoktani' => 'required|integer|min:1',
            'no_hp_kelompoktani' => 'required|string|max:20',
            'nik' => 'required|digits:16',
            'desa' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'kabupaten' => 'required|string|max:100',
            'deskripsi_jalan' => 'nullable|string|max:255',
        ]);

        $kelompok = DB::table('kelompok_tani')->where('id_kelompoktani', $id)->first();

        DB::table('alamat')->where('id_alamat', $kelompok->id_alamat)->update([
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
        ]);

        DB::table('kelompok_tani')->where('id_kelompoktani', $id)->update([
            'nama_kelompoktani' => $request->nama_kelompoktani,
            'jumlah_kelompoktani' => $request->jumlah_kelompoktani,
            'no_hp_kelompoktani' => $request->no_hp_kelompoktani,
            'nik' => $request->nik,
            'deskripsi_jalan' => $request->deskripsi_jalan,
        ]);

        return redirect()->route('kelompok.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function delete($id)
    {
        $kelompok = DB::table('kelompok_tani')->where('id_kelompoktani', $id)->first();

        if ($kelompok) {
            DB::table('alamat')->where('id_alamat', $kelompok->id_alamat)->delete();
            DB::table('kelompok_tani')->where('id_kelompoktani', $id)->delete();
        }

        return redirect()->route('kelompok.index')->with('success', 'Data berhasil dihapus!');
    }
}
