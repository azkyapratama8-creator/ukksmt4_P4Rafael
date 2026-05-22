<nav class="nxl-navigation">
    <div class="navbar-wrapper">

        <!-- LOGO -->
        <div class="m-header">
            <a href="#" class="b-brand">
                <img src="{{ asset('assets/images/logo-full.png') }}" class="logo logo-lg" />
                <img src="{{ asset('assets/images/logo-abbr.png') }}" class="logo logo-sm" />
            </a>
        </div>

        <div class="navbar-content">
            <ul class="nxl-navbar">

                <!-- DASHBOARD -->
                <li class="nxl-item nxl-caption">
                    <label>MAIN MENU</label>
                </li>

                {{-- ================= ADMIN ================= --}}
                @if(Auth::check() && Auth::user()->role == 'admin')
                <li class="nxl-item">
                    <a href="/admin/dashboard" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-airplay"></i></span>
                        <span class="nxl-mtext">Dashboard</span>
                    </a>
                </li>

                <li class="nxl-item nxl-caption mt-3">
                    <label>MASTER DATA</label>
                </li>
                <li class="nxl-item"><a href="/admin/users" class="nxl-link"><i class="feather-users"></i> Users</a></li>
                <li class="nxl-item"><a href="/admin/buku" class="nxl-link"><i class="feather-book"></i> Buku</a></li>
                <li class="nxl-item"><a href="/admin/penerbit" class="nxl-link"><i class="feather-printer"></i> Penerbit</a></li>
                <li class="nxl-item"><a href="/admin/pengarang" class="nxl-link"><i class="feather-edit"></i> Pengarang</a></li>
                <li class="nxl-item"><a href="/admin/rak-buku" class="nxl-link"><i class="feather-grid"></i> Rak Buku</a></li>
                <li class="nxl-item"><a href="/admin/kelas" class="nxl-link"><i class="feather-layers"></i> Kelas</a></li>

                <li class="nxl-item nxl-caption mt-3">
                    <label>LAPORAN</label>
                </li>
                <li class="nxl-item"><a href="/admin/laporan-peminjaman" class="nxl-link"><i class="feather-file-text"></i> Laporan Peminjaman</a></li>
                <li class="nxl-item"><a href="/admin/laporan-pengembalian" class="nxl-link"><i class="feather-file-text"></i> Laporan Pengembalian</a></li>
                <li class="nxl-item"><a href="/admin/laporan-denda" class="nxl-link"><i class="feather-file-text"></i> Laporan Denda</a></li>


                @elseif(Auth::check() && Auth::user()->role == 'petugas')
                <li class="nxl-item">
                    <a href="/petugas/dashboard" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-airplay"></i></span>
                        <span class="nxl-mtext">Dashboard</span>
                    </a>
                </li>
                <li class="nxl-item nxl-caption mt-3">
                    <label>TRANSAKSI</label>
                </li>
                <li class="nxl-item"><a href="/petugas/peminjaman" class="nxl-link"><i class="feather-calendar"></i>Peminjaman</a> </li>
                <li class="nxl-item"><a href="/petugas/pengembalian" class="nxl-link"><i class="feather-rotate-ccw"></i> Pengembalian</a></li>


                @elseif(Auth::check() && Auth::user()->role == 'anggota')
                <li class="nxl-item">
                    <a href="/anggota/dashboard" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-airplay"></i></span>
                        <span class="nxl-mtext">Dashboard</span>
                    </a>
                </li>
                <li class="nxl-item nxl-caption mt-3">
                    <label>BUKU</label>
                </li>
                <li class="nxl-item"><a href="/anggota/buku" class="nxl-link"><i class="feather-book-open"></i> Buku Tersedia</a></li>
                <li class="nxl-item nxl-caption mt-3">
                    <label>TRANSAKSI</label>
                </li>
                <li class="nxl-item"><a href="/anggota/peminjaman/create" class="nxl-link"><i class="feather-calendar"></i> Form Peminjaman Buku</a></li>
                <li class="nxl-item nxl-caption mt-3">
                    <label>RIWAYAT</label>
                </li>
                <li class="nxl-item"><a href="/anggota/history" class="nxl-link"><i class="feather-clock"></i> History Peminjaman</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>