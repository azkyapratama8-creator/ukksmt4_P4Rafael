<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;

class RakBuku extends Model
{
    protected $table = 'rak_bukus';

    protected $fillable = [
        'kode_rak',
        'nama_rak',
        'lokasi',
    ];

    public function buku()
    {
        return $this->hasMany(Buku::class);
    }
}
