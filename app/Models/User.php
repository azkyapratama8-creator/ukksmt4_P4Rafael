<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // 🧾 field yang boleh diisi (mass assignment)
    protected $fillable = [
        'name',     // nama user
        'email',    // email login
        'password', // password (akan di-hash otomatis)
        'role'      // role: admin / petugas / anggota
    ];

    // 🔒 field yang disembunyikan saat response / json
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // 🔄 casting otomatis tipe data
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // jadi format tanggal
            'password' => 'hashed',            // otomatis hash password
        ];
    }

    // 📚 relasi: 1 user bisa punya banyak peminjaman
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
