<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $fillable = [
        'judul',
        'pengarang_id',
        'penerbit_id',
        'tahun',
        'stok'
    ];

    public function pengarang()
    {
        return $this->belongsTo(Pengarang::class);
    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class);
    }
}
