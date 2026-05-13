<?php

namespace App\Http\Controllers;

use App\Models\RakBuku;
use Illuminate\Http\Request;

class RakBukuController extends Controller
{
    // 📚 menampilkan semua data rak buku
    public function index()
    {
        // ambil semua data rak buku
        $data = RakBuku::all();

        return view('admin.rak_buku.index', compact('data'));
    }

    // ➕ form tambah rak buku
    public function create()
    {
        return view('admin.rak_buku.create');
    }

    // 💾 simpan data rak buku baru
    public function store(Request $request)
    {
        // 🔐 validasi input
        $request->validate([
            'nama_rak' => 'required',
            'lokasi' => 'required',
        ]);

        // 🔢 generate kode rak otomatis
        $jumlah = RakBuku::count() + 1;

        $kode = 'RK' . str_pad($jumlah, 3, '0', STR_PAD_LEFT);

        // 💾 simpan ke database
        RakBuku::create([
            'kode_rak' => $kode,
            'nama_rak' => $request->nama_rak,
            'lokasi' => $request->lokasi,
        ]);

        return redirect('/admin/rak-buku')->with('success', 'Data berhasil ditambahkan');
    }

    // 👀 detail rak buku
    public function show(RakBuku $rakBuku)
    {
        return view('admin.rak_buku.show', compact('rakBuku'));
    }

    // ✏️ form edit rak buku
    public function edit(RakBuku $rakBuku)
    {
        return view('admin.rak_buku.edit', compact('rakBuku'));
    }

    // 🔄 update data rak buku
    public function update(Request $request, RakBuku $rakBuku)
    {
        // 🔐 validasi input
        $request->validate([
            'nama_rak' => 'required',
            'lokasi' => 'required',
        ]);

        // update data
        $rakBuku->update($request->all());

        return redirect('/admin/rak-buku')->with('success', 'Data berhasil diupdate');
    }

    // 🗑️ hapus data rak buku
    public function destroy(RakBuku $rakBuku)
    {
        $rakBuku->delete();

        return redirect('/admin/rak-buku')->with('success', 'Data berhasil dihapus');
    }
}
