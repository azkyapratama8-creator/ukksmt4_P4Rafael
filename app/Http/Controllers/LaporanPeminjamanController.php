<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class LaporanPeminjamanController extends Controller
{
     public function index()
    {
        $data = Peminjaman::with(['user', 'buku'])->get();

        return view('admin.laporan.peminjaman', compact('data'));
    }   
}