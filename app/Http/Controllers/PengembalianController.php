<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    // 📌 list data pengembalian (petugas)
    public function index()
    {
        $data = Pengembalian::with('peminjaman.user', 'peminjaman.buku')
            ->latest()
            ->paginate(10);

        return view('petugas.pengembalian.index', compact('data'));
    }

    // ➕ form pengembalian (opsional)
    public function create()
    {
        $peminjaman = Peminjaman::where('status', 'disetujui')->get();

        return view('petugas.pengembalian.create', compact('peminjaman'));
    }

    // 💾 simpan pengembalian
    public function store(Request $request)
    {
        $request->validate([
            'peminjaman_id' => 'required|exists:peminjamans,id',
            'tanggal_kembali' => 'required|date',
        ]);

        // 🔍 ambil data peminjaman
        $pinjam = Peminjaman::findOrFail($request->peminjaman_id);

        // 📅 hitung keterlambatan
        $tglHarusKembali = $pinjam->tanggal_kembali;
        $tglDikembalikan = $request->tanggal_kembali;

        $terlambat = 0;
        $denda = 0;

        if ($tglDikembalikan > $tglHarusKembali) {
            $terlambat = \Carbon\Carbon::parse($tglHarusKembali)
                ->diffInDays($tglDikembalikan);

            $denda = $terlambat * 1000; // 💰 contoh 1000/hari
        }

        // 💾 simpan data pengembalian
        Pengembalian::create([
            'peminjaman_id' => $request->peminjaman_id,
            'tanggal_kembali' => $request->tanggal_kembali,
            'terlambat' => $terlambat,
            'denda' => $denda,
        ]);

        // 🔄 update status peminjaman
        $pinjam->update([
            'status' => 'dikembalikan'
        ]);

        return redirect()->route('petugas.pengembalian.index')
            ->with('success', 'Buku berhasil dikembalikan');
    }

    // 👀 detail pengembalian
    public function show(Pengembalian $pengembalian)
    {
        return view('petugas.pengembalian.show', compact('pengembalian'));
    }

    // ✏️ edit (jarang dipakai, optional)
    public function edit(Pengembalian $pengembalian)
    {
        return view('petugas.pengembalian.edit', compact('pengembalian'));
    }

    // 🔄 update
    public function update(Request $request, Pengembalian $pengembalian)
    {
        $pengembalian->update($request->all());

        return back()->with('success', 'Data diupdate');
    }

    // 🗑️ hapus
    public function destroy(Pengembalian $pengembalian)
    {
        $pengembalian->delete();

        return back()->with('success', 'Data dihapus');
    }
}
