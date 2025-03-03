<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendidikan; // Pastikan model berada di App\Models

class PendidikanController extends Controller
{
    public function index()
    {
        // Mengambil semua data pendidikan
        $pendidikan = Pendidikan::all();
        return view('backend.pendidikan.index', compact('pendidikan'));
    }

    public function create()
    {
        return view('backend.pendidikan.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'tingkatan' => 'required|string',
            'tahun_masuk' => 'required|integer',
            'tahun_keluar' => 'nullable|integer',
        ]);

        // Menyimpan data ke database
        Pendidikan::create($request->all());

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('pendidikan.index')
            ->with('success', 'Data Pendidikan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Mengambil data pendidikan berdasarkan ID
        $pendidikan = Pendidikan::findOrFail($id);
        return view('backend.pendidikan.edit', compact('pendidikan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'tingkatan' => 'required|string',
            'tahun_masuk' => 'required|integer',
            'tahun_keluar' => 'nullable|integer',
        ]);

        // Mengupdate data
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->update($request->all());

        return redirect()->route('pendidikan.index')
            ->with('success', 'Data Pendidikan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Menghapus data berdasarkan ID
        Pendidikan::findOrFail($id)->delete();

        return redirect()->route('pendidikan.index')
            ->with('success', 'Data Pendidikan berhasil dihapus.');
    }
}
