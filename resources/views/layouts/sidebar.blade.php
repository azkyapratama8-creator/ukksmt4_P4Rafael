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

                <li class="nxl-item">
                    <a href="#" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-airplay"></i></span>
                        <span class="nxl-mtext">Dashboard</span>
                    </a>
                </li>

                {{-- ================= ADMIN ================= --}}
                @if(Auth::check() && Auth::user()->role == 'admin')

                <li class="nxl-item nxl-caption mt-3">
                    <label>MASTER DATA</label>
                </li>

                <li class="nxl-item"><a href="/admin/anggota" class="nxl-link"><i class="feather-users"></i> Anggota</a></li>
                <li class="nxl-item"><a href="/admin/petugas" class="nxl-link"><i class="feather-user-check"></i> Petugas</a></li>
                <li class="nxl-item"><a href="/admin/buku" class="nxl-link"><i class="feather-book"></i> Buku</a></li>
                <li class="nxl-item"><a href="/admin/rak-buku" class="nxl-link"><i class="feather-grid"></i> Rak Buku</a></li>
                <li class="nxl-item"><a href="/admin/kelas" class="nxl-link"><i class="feather-layers"></i> Kelas</a></li>
                <li class="nxl-item"><a href="/admin/penerbit" class="nxl-link"><i class="feather-printer"></i> Penerbit</a></li>
                <li class="nxl-item"><a href="/admin/pengarang" class="nxl-link"><i class="feather-edit"></i> Pengarang</a></li>

                <li class="nxl-item nxl-caption mt-3">
                    <label>TRANSAKSI</label>
                </li>

                <li class="nxl-item"><a href="#" class="nxl-link"><i class="feather-calendar"></i> Peminjaman</a></li>
                <li class="nxl-item"><a href="#" class="nxl-link"><i class="feather-rotate-ccw"></i> Pengembalian</a></li>
                <li class="nxl-item"><a href="#" class="nxl-link"><i class="feather-dollar-sign"></i> Denda</a></li>
                @endif
                {{-- ================= PETUGAS ================= --}}
                @if(Auth::check() && Auth::user()->role == 'petugas')

                <li class="nxl-item nxl-caption mt-3">
                    <label>TRANSAKSI</label>
                </li>

                <li class="nxl-item"><a href="#" class="nxl-link"><i class="feather-calendar"></i> Peminjaman</a></li>
                <li class="nxl-item"><a href="#" class="nxl-link"><i class="feather-rotate-ccw"></i> Pengembalian</a></li>
                <li class="nxl-item"><a href="#" class="nxl-link"><i class="feather-dollar-sign"></i> Denda</a></li>

                <li class="nxl-item nxl-caption mt-3">
                    <label>DATA</label>
                </li>

                <li class="nxl-item"><a href="#" class="nxl-link"><i class="feather-book"></i> Buku</a></li>

                @endif
                {{-- ================= ANGGOTA ================= --}}
                @if(Auth::check() && Auth::user()->role == 'anggota')

                <li class="nxl-item nxl-caption mt-3">
                    <label>BUKU</label>
                </li>

                <li class="nxl-item"><a href="#" class="nxl-link"><i class="feather-book-open"></i> Buku Tersedia</a></li>

                <li class="nxl-item nxl-caption mt-3">
                    <label>TRANSAKSI</label>
                </li>

                <li class="nxl-item"><a href="#" class="nxl-link"><i class="feather-calendar"></i> Peminjaman Buku</a></li>
                <li class="nxl-item"><a href="#" class="nxl-link"><i class="feather-rotate-ccw"></i> Pengembalian Buku</a></li>

                <li class="nxl-item nxl-caption mt-3">
                    <label>RIWAYAT</label>
                </li>

                <li class="nxl-item"><a href="#" class="nxl-link"><i class="feather-clock"></i> History</a></li>



                <!-- OPSIONAL -->
                <li class="nxl-item nxl-caption mt-3">
                    <label>OPSIONAL</label>
                </li>

                <li class="nxl-item">
                    <a href="#" class="nxl-link">
                        <i class="feather-search"></i> Search
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>