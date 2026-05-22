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
use App\Models\Denda;
use Illuminate\Support\Facades\Auth;

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

    public function petugas()
    {
        // total pending
        $pending = Peminjaman::where('status', 'pending')->count();

        // total buku
        $buku = Buku::count();

        // total denda
        $denda = Pengembalian::sum('denda');

        // data peminjaman pending
        $peminjaman = Peminjaman::with(['user', 'buku'])
            ->where('status', 'pending')
            ->latest()
            ->take(5)
            ->get();

        // data pengembalian
        $pengembalian = Pengembalian::with([
            'peminjaman.user',
            'peminjaman.buku'
        ])
            ->latest()
            ->take(5)
            ->get();

        return view('petugas.dashboard', compact(
            'pending',
            'buku',
            'denda',
            'peminjaman',
            'pengembalian'
        ));
    }

    public function anggotaDashboard()
    {
        $bukuTersedia = Buku::count();
        $sedangDipinjam = Peminjaman::where('user_id', Auth::id())
            ->whereIn('status', ['pending', 'approved'])
            ->count();
        $riwayatPeminjaman = Peminjaman::where('user_id', Auth::id())->count();
        $totalDenda = Denda::whereHas('peminjaman', function ($query) {
            $query->where('user_id', Auth::id());
        })
            ->sum('jumlah_denda');

        $popularBooks = Buku::latest()
            ->take(4)
            ->get();

        return view('anggota.dashboard', compact(
            'bukuTersedia',
            'sedangDipinjam',
            'riwayatPeminjaman',
            'totalDenda',
            'popularBooks'
        ));
    }
}
