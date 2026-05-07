<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;

class penerbit extends Model
{
    protected $fillable = ['nama'];

    public function buku()
    {
        return $this->hasMany(Buku::class);
    }
}
