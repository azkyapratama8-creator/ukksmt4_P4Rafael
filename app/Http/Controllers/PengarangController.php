<?php

namespace App\Http\Controllers;

use App\Models\Pengarang;
use Illuminate\Http\Request;

class PengarangController extends Controller
{
    // 📚 menampilkan semua data pengarang
    public function index()
    {
        // ambil semua data dari database
        $data = Pengarang::all();

        // kirim ke view index pengarang
        return view('admin.pengarang.index', compact('data'));
    }

    // ➕ form tambah pengarang
    public function create()
    {
        return view('admin.pengarang.create');
    }

    // 💾 simpan data pengarang baru
    public function store(Request $request)
    {
        // 🔐 validasi input
        $request->validate([
            'nama_pengarang' => 'required'
        ]);

        // simpan ke database
        Pengarang::create($request->all());

        // redirect + pesan sukses
        return redirect('/admin/pengarang')->with('success', 'Data berhasil ditambahkan');
    }

    // 👀 detail pengarang
    public function show(Pengarang $pengarang)
    {
        return view('admin.pengarang.show', compact('pengarang'));
    }

    // ✏️ form edit pengarang
    public function edit(Pengarang $pengarang)
    {
        return view('admin.pengarang.edit', compact('pengarang'));
    }

    // 🔄 update data pengarang
    public function update(Request $request, Pengarang $pengarang)
    {
        // 🔐 validasi input
        $request->validate([
            'nama_pengarang' => 'required'
        ]);

        // update data
        $pengarang->update($request->all());

        return redirect('/admin/pengarang')->with('success', 'Data berhasil diupdate');
    }

    // 🗑️ hapus data pengarang
    public function destroy(Pengarang $pengarang)
    {
        $pengarang->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
