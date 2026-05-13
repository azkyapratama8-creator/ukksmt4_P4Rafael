<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Pengarang;
use App\Models\RakBuku;
use App\Models\Kelas;
use App\Models\Peminjaman;
use App\Models\Pengembalian;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalBuku = Buku::count();
        $totalPenerbit = Penerbit::count();
        $totalPengarang = Pengarang::count();
        $totalRakBuku = RakBuku::count();
        $totalKelas = Kelas::count();


        $peminjaman = Peminjaman::with(['user', 'buku'])
            ->latest()
            ->limit(5)
            ->get();

        $pengembalian = Pengembalian::with(['peminjaman.user', 'peminjaman.buku'])
            ->latest()
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalBuku',
            'totalPenerbit',
            'totalPengarang',
            'totalRakBuku',
            'totalKelas',
            'peminjaman',
            'pengembalian'
        ));
    }
}
