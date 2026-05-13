<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    // 📚 menampilkan semua data penerbit
    public function index()
    {
        // ambil semua data penerbit dari database
        $data = Penerbit::all();

        // kirim ke view index penerbit
        return view('admin.penerbit.index', compact('data'));
    }

    // ➕ menampilkan form tambah penerbit
    public function create()
    {
        return view('admin.penerbit.create');
    }

    // 💾 menyimpan data penerbit baru
    public function store(Request $request)
    {
        // 🔐 validasi input (biar tidak kosong / error)
        $request->validate([
            'nama_penerbit' => 'required',
        ]);

        // simpan data ke database
        Penerbit::create($request->all());

        // redirect ke halaman index
        return redirect('/admin/penerbit')->with('success', 'Data berhasil ditambahkan');
    }

    // 👀 show tidak dipakai (boleh dihapus kalau tidak digunakan)
    public function show(Penerbit $penerbit)
    {
        //
    }

    // ✏️ menampilkan form edit penerbit
    public function edit(Penerbit $penerbit)
    {
        return view('admin.penerbit.edit', compact('penerbit'));
    }

    // 🔄 update data penerbit
    public function update(Request $request, Penerbit $penerbit)
    {
        // 🔐 validasi input
        $request->validate([
            'nama_penerbit' => 'required',
        ]);

        // update data
        $penerbit->update($request->all());

        return redirect('/admin/penerbit')->with('success', 'Data berhasil diupdate');
    }

    // 🗑️ hapus data penerbit
    public function destroy(Penerbit $penerbit)
    {
        $penerbit->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
