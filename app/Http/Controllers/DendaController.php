<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class DendaController extends Controller
{
    // 📌 tampil semua data denda
    public function index()
    {
        $data = Denda::with('peminjaman.user', 'peminjaman.buku')
            ->latest()
            ->get();

        return view('petugas.denda.index', compact('data'));
    }

    // ➕ simpan denda baru
    public function store(Request $request)
    {
        $request->validate([
            'peminjaman_id' => 'required|exists:peminjamans,id',
            'jumlah_denda' => 'required|integer',
        ]);

        Denda::create([
            'peminjaman_id' => $request->peminjaman_id,
            'jumlah_denda' => $request->jumlah_denda,
            'status_bayar' => 'belum',
        ]);

        return back()->with('success', 'Denda berhasil ditambahkan');
    }

    // ✔ update status bayar
    public function bayar($id)
    {
        $denda = Denda::findOrFail($id);

        $denda->update([
            'status_bayar' => 'lunas'
        ]);

        return back()->with('success', 'Denda sudah lunas');
    }
}
