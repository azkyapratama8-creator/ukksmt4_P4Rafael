<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    // 🧾 kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'peminjaman_id',   // relasi ke peminjaman
        'tanggal_kembali', // tanggal buku dikembalikan
        'terlambat',       // jumlah hari telat
        'denda',           // total denda
        'status_denda',    // status bayar denda (lunas / belum)
    ];

    // 🔗 relasi ke peminjaman
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }
}
