<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    // 📌 daftar peminjaman pending (untuk petugas)
    public function index()
    {
        $data = Peminjaman::with(['user', 'buku'])
            ->where('status', 'pending') // hanya yang menunggu approval
            ->latest()
            ->paginate(10); // ⚡ biar tidak berat

        return view('petugas.peminjaman.index', compact('data'));
    }

    // ➕ form peminjaman (anggota)
    public function create()
    {
        $bukus = Buku::all();

        return view('anggota.peminjaman.create', compact('bukus'));
    }

    // 💾 simpan pengajuan peminjaman
    public function store(Request $request)
    {
        // 🔐 validasi input
        $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
        ]);

        // 💾 simpan ke database
        Peminjaman::create([
            'user_id' => Auth::id(),
            'buku_id' => $request->buku_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'pending', // ⏳ menunggu petugas
        ]);

        return redirect()->route('anggota.dashboard')
            ->with('success', 'Pengajuan peminjaman berhasil dikirim.');
    }

    // ✅ APPROVE peminjaman (petugas)
    public function approve($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // ✔ ubah status jadi approved
        $peminjaman->update([
            'status' => 'approved'
        ]);

        return back()->with('success', 'Peminjaman disetujui.');
    }

    // ❌ REJECT peminjaman (petugas)
    public function reject($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // ❌ ubah status jadi rejected
        $peminjaman->update([
            'status' => 'rejected'
        ]);

        return back()->with('success', 'Peminjaman ditolak.');
    }
}