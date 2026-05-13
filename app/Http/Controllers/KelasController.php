<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    // 📚 menampilkan semua data kelas
    public function index()
    {
        // ambil semua data kelas dari database
        $data = Kelas::all();

        // kirim ke view index kelas
        return view('admin.kelas.index', compact('data'));
    }

    // ➕ form tambah kelas
    public function create()
    {
        return view('admin.kelas.create');
    }

    // 💾 simpan data kelas baru
    public function store(Request $request)
    {
        // 🔐 validasi input
        $request->validate([
            'nama_kelas' => 'required',
        ]);

        // simpan ke database
        Kelas::create($request->all());

        return redirect('/admin/kelas')->with('success', 'Data berhasil ditambahkan');
    }

    // 👀 show (tidak dipakai, boleh dihapus)
    public function show(Kelas $kelas)
    {
        //
    }

    // ✏️ form edit kelas
    public function edit(Kelas $kelas)
    {
        return view('admin.kelas.edit', compact('kelas'));
    }

    // 🔄 update data kelas
    public function update(Request $request, Kelas $kelas)
    {
        // 🔐 validasi input
        $request->validate([
            'nama_kelas' => 'required',
        ]);

        // update data
        $kelas->update($request->all());

        return redirect('/admin/kelas')->with('success', 'Data berhasil diupdate');
    }

    // 🗑️ hapus data kelas
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect('/admin/kelas')->with('success', 'Data berhasil dihapus');
    }
}
