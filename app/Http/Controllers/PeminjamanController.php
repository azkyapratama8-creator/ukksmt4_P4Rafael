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
        $data = Peminjaman::with(['user', 'buku', 'pengembalian'])
            ->latest()
            ->paginate(10); // tidak berat

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
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        // 🔒 CEK apakah user sudah pinjam buku yang sama dan belum selesai
        $cek = Peminjaman::where('user_id', Auth::id())
            ->where('buku_id', $request->buku_id)
            ->whereIn('status', ['pending', 'approved'])
            ->first();

        if ($cek) {
            return back()->with('error', 'Buku ini masih dipinjam atau menunggu approval.');
        }

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
        $peminjaman = Peminjaman::with('buku')->findOrFail($id);

        if ($peminjaman->buku->stok <= 0) {
            return back()->with('error', 'Stok buku tidak tersedia, tidak bisa disetujui.');
        }

        // ✔ kurangi stok buku karena disetujui dan dipinjam
        $peminjaman->buku->decrement('stok');

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

    public function history()
    {
        $data = Peminjaman::with(['buku', 'pengembalian'])
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('anggota.history.history', compact('data'));
    }
}
