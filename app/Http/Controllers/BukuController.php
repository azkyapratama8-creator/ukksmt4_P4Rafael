<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Pengarang;
use App\Models\RakBuku;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BukuController extends Controller
{
    //  menampilkan semua data buku
    public function index()
    {
        //  ambil data buku + relasi (pengarang, penerbit, dll)
        //  pakai cache supaya tidak query terus ke database
        $data = Cache::remember('buku_list', 60, function () {
            return Buku::with(['pengarang', 'penerbit', 'rakBuku', 'kelas'])
                ->latest()   // urutkan dari data terbaru
                ->paginate(10); // batasi 10 data per halaman biar ringan
        });

        // kirim data ke view index buku
        return view('admin.buku.index', compact('data'));
    }

    //  menampilkan form tambah buku
    public function create()
    {
        //  data master untuk dropdown (pakai cache biar ringan)
        $pengarang = Cache::remember('pengarang_all', 60, fn() => Pengarang::all());
        $penerbit = Cache::remember('penerbit_all', 60, fn() => Penerbit::all());
        $rakBuku = Cache::remember('rakbuku_all', 60, fn() => RakBuku::all());
        $kelas = Cache::remember('kelas_all', 60, fn() => Kelas::all());

        // kirim semua data ke form create
        return view('admin.buku.create', compact(
            'pengarang',
            'penerbit',
            'rakBuku',
            'kelas'
        ));
    }

    //  simpan data buku baru
    public function store(Request $request)
    {
        //  validasi input wajib
        $request->validate([
            'judul' => 'required',
            'pengarang_id' => 'required',
            'penerbit_id' => 'required',
        ]);

        //  default foto kosong
        $namaFoto = null;

        // jika user upload foto
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            // rename file biar unik
            $namaFoto = time() . '.' . $foto->getClientOriginalExtension();

            // simpan ke folder public/foto_buku
            $foto->move(public_path('foto_buku'), $namaFoto);
        }

        //  simpan data ke database
        Buku::create(array_merge($request->all(), [
            'foto' => $namaFoto
        ]));

        //  hapus cache supaya data baru muncul
        Cache::forget('buku_list');

        // redirect kembali dengan pesan sukses
        return redirect('/admin/buku')->with('success', 'Data berhasil ditambahkan');
    }

    // 👀 detail data buku
    public function show(int $id)
    {
        // ambil 1 data buku beserta relasinya
        $buku = Buku::with(['pengarang', 'penerbit', 'rakBuku', 'kelas'])
            ->findOrFail($id);

        return view('admin.buku.show', compact('buku'));
    }

    //  form edit buku
    public function edit(int $id)
    {
        // ambil data buku yang mau diedit
        $buku = Buku::findOrFail($id);

        // ambil data master dropdown
        $pengarang = Pengarang::all();
        $penerbit = Penerbit::all();
        $rakBuku = RakBuku::all();
        $kelas = Kelas::all();

        // kirim ke view edit
        return view('admin.buku.edit', compact(
            'buku',
            'pengarang',
            'penerbit',
            'rakBuku',
            'kelas'
        ));
    }

    //  update data buku
    public function update(Request $request, int $id)
    {
        // ambil data lama
        $buku = Buku::findOrFail($id);

        // foto default tetap pakai lama
        $namaFoto = $buku->foto;

        // jika upload foto baru
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            // rename file
            $namaFoto = time() . '.' . $foto->getClientOriginalExtension();

            // simpan file
            $foto->move(public_path('foto_buku'), $namaFoto);
        }

        // update data
        $buku->update(array_merge($request->all(), [
            'foto' => $namaFoto
        ]));

        //  hapus cache biar data update langsung muncul
        Cache::forget('buku_list');

        return redirect('/admin/buku')->with('success', 'Data berhasil diupdate');
    }

    //  hapus data buku
    public function destroy(int $id)
    {
        // hapus data dari database
        Buku::destroy($id);

        // bersihkan cache
        Cache::forget('buku_list');

        return back()->with('success', 'Data berhasil dihapus');
    }

    //  menampilkan katalog buku untuk anggota
    public function anggota()
    {
        //  ambil data buku + pengarang
        $bukus = Buku::with('pengarang')
            ->latest()
            ->get();

        // tampilkan view anggota
        return view('anggota.buku.index', compact('bukus'));
    }
}
