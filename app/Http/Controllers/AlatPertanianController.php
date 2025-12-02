<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlatPertanian; // model yang kemarin kamu buat

class AlatPertanianController extends Controller
{
    public function index()
    {
        $alat = AlatPertanian::orderBy('nama_alat')->get();
        return view('alat.index', compact('alat'));
    }

    public function create()
    {
        return view('alat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_alat'   => 'required',
            'jumlah'      => 'required|integer|min:0',
            'gambar_alat' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $filename = null;
        if ($request->hasFile('gambar_alat')) {
            $file = $request->file('gambar_alat');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/alat'), $filename);
        }

        AlatPertanian::create([
            'nama_alat'   => $request->nama_alat,
            'jumlah'      => $request->jumlah,
            'gambar_alat' => $filename,
            'is_active'   => true,
        ]);

        return redirect()->route('alat.index')->with('success', 'Alat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $alat = AlatPertanian::findOrFail($id);
        return view('alat.edit', compact('alat'));
    }

    public function update(Request $request, $id)
    {
        $alat = AlatPertanian::findOrFail($id);

        $request->validate([
            'nama_alat'   => 'required',
            'jumlah'      => 'required|integer|min:0',
            'gambar_alat' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $filename = $alat->gambar_alat;

        if ($request->hasFile('gambar_alat')) {
            // hapus gambar lama kalau ada
            if ($filename && file_exists(public_path('uploads/alat/' . $filename))) {
                @unlink(public_path('uploads/alat/' . $filename));
            }

            $file = $request->file('gambar_alat');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/alat'), $filename);
        }

        $alat->update([
            'nama_alat'   => $request->nama_alat,
            'jumlah'      => $request->jumlah,
            'gambar_alat' => $filename,
        ]);

        return redirect()->route('alat.index')->with('success', 'Data alat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $alat = AlatPertanian::findOrFail($id);

        if ($alat->gambar_alat && file_exists(public_path('uploads/alat/' . $alat->gambar_alat))) {
            @unlink(public_path('uploads/alat/' . $alat->gambar_alat));
        }

        $alat->delete();

        return redirect()->route('alat.index')->with('success', 'Alat berhasil dihapus.');
    }
}
