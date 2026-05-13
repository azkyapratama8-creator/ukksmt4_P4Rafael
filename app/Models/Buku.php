<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    // 🧾 kolom yang boleh diisi mass assignment
    protected $fillable = [
        'judul',        // judul buku
        'pengarang_id', // relasi ke pengarang
        'penerbit_id',  // relasi ke penerbit
        'rak_buku_id',  // relasi ke rak buku
        'kelas_id',     // relasi ke kelas
        'tahun',        // tahun terbit
        'stok',         // jumlah stok buku
        'foto',         // cover buku
    ];

    // 👨‍🏫 relasi: buku dimiliki oleh 1 pengarang
    public function pengarang()
    {
        return $this->belongsTo(Pengarang::class);
    }

    // 🏢 relasi: buku dimiliki oleh 1 penerbit
    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class);
    }

    // 📚 relasi: buku disimpan di 1 rak
    public function rakBuku()
    {
        return $this->belongsTo(RakBuku::class);
    }

    // 🏫 relasi: buku untuk kelas tertentu
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    // 🔄 relasi: 1 buku bisa dipinjam banyak kali
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
