<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    // 🧾 field yang boleh diisi
    protected $fillable = [
        'peminjaman_id',
        'jumlah_denda',
        'status_bayar' // lunas / belum
    ];

    // 🔗 relasi ke peminjaman
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }
}
