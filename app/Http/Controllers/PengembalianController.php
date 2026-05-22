<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Peminjaman;
use App\Models\Denda;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PengembalianController extends Controller
{
    /**
     * 📋 Menampilkan data pengembalian
     */
    public function index()
    {
        // ambil data pengembalian + relasi user & buku
        $data = Pengembalian::with([
            'peminjaman.user',
            'peminjaman.buku'
        ])
            ->latest()
            ->paginate(10);

        return view(
            'petugas.pengembalian.index',
            compact('data')
        );
    }

    /**
     * ➕ Form pengembalian buku
     */
    public function create($id)
    {
        // ambil data peminjaman
        $peminjaman = Peminjaman::with([
            'user',
            'buku'
        ])->findOrFail($id);

        return view(
            'petugas.pengembalian.create',
            compact('peminjaman')
        );
    }

    /**
     * 💾 Simpan pengembalian
     */
    public function store(Request $request)
    {
        // validasi input
        $request->validate([
            'peminjaman_id' => 'required|exists:peminjamans,id',
            'tanggal_dikembalikan' => 'required|date',
        ]);

        // ambil data peminjaman
        $pinjam = Peminjaman::findOrFail(
            $request->peminjaman_id
        );

        // deadline pengembalian
        $tglHarusKembali = Carbon::parse(
            $pinjam->tanggal_kembali
        );

        // tanggal dikembalikan
        $tglDikembalikan = Carbon::parse(
            $request->tanggal_dikembalikan
        );

        // default tidak telat
        $terlambat = 0;

        // cek apakah telat
        if ($tglDikembalikan->gt($tglHarusKembali)) {

            // hitung jumlah hari telat
            $terlambat = $tglHarusKembali
                ->diffInDays($tglDikembalikan);
        }

        // jika sudah pernah dikembalikan, jangan buat pengembalian baru
        if ($pinjam->pengembalian) {
            return back()->with('error', 'Peminjaman ini sudah dikembalikan.');
        }

        // simpan data pengembalian
        $pengembalian = Pengembalian::create([

            'peminjaman_id' => $request->peminjaman_id,

            'tanggal_kembali' => $request->tanggal_dikembalikan,

            'terlambat' => $terlambat,

            'denda' => $terlambat * 1000,

            'status_denda' => $terlambat > 0 ? 'belum_lunas' : 'lunas',

        ]);

        // update status peminjaman jadi dikembalikan
        $pinjam->update([
            'status' => 'dikembalikan'
        ]);

        // kembalikan stok buku ke perpustakaan
        $pinjam->buku()->increment('stok');

        // jika telat → buat atau perbarui denda di tabel denda
        if ($terlambat > 0) {

            Denda::updateOrCreate(
                ['peminjaman_id' => $pinjam->id],
                [
                    'jumlah_denda' => $terlambat * 1000,
                    'status_bayar' => 'belum',
                ]
            );
        }

        return redirect()
            ->route('petugas.pengembalian.index')
            ->with(
                'success',
                'Buku berhasil dikembalikan'
            );
    }

    /**
     * 👀 Detail pengembalian
     */
    public function show(Pengembalian $pengembalian)
    {
        return view(
            'petugas.pengembalian.show',
            compact('pengembalian')
        );
    }

    /**
     * ✏️ Form edit
     */
    public function edit(Pengembalian $pengembalian)
    {
        return view(
            'petugas.pengembalian.edit',
            compact('pengembalian')
        );
    }

    /**
     * 🔄 Update data
     */
    public function update(
        Request $request,
        Pengembalian $pengembalian
    ) {
        $pengembalian->update(
            $request->all()
        );

        return back()->with(
            'success',
            'Data berhasil diupdate'
        );
    }

    /**
     * 🗑️ Hapus data
     */
    public function destroy(
        Pengembalian $pengembalian
    ) {
        $pengembalian->delete();

        return back()->with(
            'success',
            'Data berhasil dihapus'
        );
    }
}
