<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pengembalian;

class Peminjaman extends Model
{
    use HasFactory;

    // 📌 nama tabel
    protected $table = 'peminjamans';

    // 📌 field yang boleh diisi
    protected $fillable = [
        'user_id',
        'buku_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];

    // 🔗 relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔗 relasi ke buku
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    // 🔗 relasi ke pengembalian
    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class);
    }
}
