<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengembalian;

class LaporanPengembalianController extends Controller
{
    public function index()
    {
        $data = Pengembalian::with(['peminjaman.user', 'peminjaman.buku'])->get();
        return view('admin.laporan.pengembalian', compact('data')); 
    }
}
