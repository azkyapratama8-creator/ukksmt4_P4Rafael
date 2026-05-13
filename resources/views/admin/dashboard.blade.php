@extends('layouts.app')

@section('content')

<div class="main-content">

  <!-- WELCOME -->
  <div class="card border-0 shadow-sm mb-4"
    style="background: linear-gradient(90deg,#4e73df,#224abe);">

    <div class="card-body text-white p-4">

      <h3 class="fw-bold">
        Selamat Datang, Admin 👋
      </h3>

      <p class="mb-0 opacity-75">
        Kelola data perpustakaan dengan mudah dan cepat.
      </p>

    </div>

  </div>


  <!-- STATISTIK -->
  <div class="row">

    <!-- BUKU -->
    <div class="col-xl-3 col-md-6 mb-4">

      <div class="card border-0 shadow-sm h-100">

        <div class="card-body">

          <div class="d-flex justify-content-between">

            <div>
              <div class="text-muted small">
                Total Buku
              </div>

              <h2 class="fw-bold mt-2">
                {{ $totalBuku }}
              </h2>
            </div>

            <div class="avatar-text bg-primary text-white">
              <i class="feather-book"></i>
            </div>

          </div>

        </div>

      </div>

    </div>


    <!-- USER -->
    <div class="col-xl-3 col-md-6 mb-4">

      <div class="card border-0 shadow-sm h-100">

        <div class="card-body">

          <div class="d-flex justify-content-between">

            <div>
              <div class="text-muted small">
                Total User
              </div>

              <h2 class="fw-bold mt-2">
                {{ $totalUsers }}
              </h2>
            </div>

            <div class="avatar-text bg-success text-white">
              <i class="feather-users"></i>
            </div>

          </div>

        </div>

      </div>

    </div>


    <!-- RAK -->
    <div class="col-xl-3 col-md-6 mb-4">

      <div class="card border-0 shadow-sm h-100">

        <div class="card-body">

          <div class="d-flex justify-content-between">

            <div>
              <div class="text-muted small">
                Rak Buku
              </div>

              <h2 class="fw-bold mt-2">
                {{ $totalRakBuku }}
              </h2>
            </div>

            <div class="avatar-text bg-warning text-white">
              <i class="feather-grid"></i>
            </div>

          </div>

        </div>

      </div>

    </div>


    <!-- KATEGORI -->
    <div class="col-xl-3 col-md-6 mb-4">

      <div class="card border-0 shadow-sm h-100">

        <div class="card-body">

          <div class="d-flex justify-content-between">

            <div>
              <div class="text-muted small">
                Kelas
              </div>

              <h2 class="fw-bold mt -2">
                {{ $totalKelas }}
              </h2>
            </div>

            <div class=" avatar-text bg-danger text-white">
              <i class="feather-tag"></i>
            </div>

          </div>

        </div>

      </div>

    </div>

  </div>


  <!-- TRANSAKSI -->
  <div class="card border-0 shadow-sm">

    <div class="card-header bg-white">
      <h5 class="mb-0">
        Transaksi Terbaru
      </h5>
    </div>

    <div class="card-body p-0">

      <div class="table-responsive">

        <table class="table table-hover mb-0">

          <thead>
            <tr>
              <th>Anggota</th>
              <th>Buku</th>
              <th>Status</th>
            </tr>
          </thead>

          <tbody>

            @forelse($peminjaman as $d)
            <tr>
              <td>{{ $d->user->name ?? '-' }}</td>
              <td>{{ $d->buku->judul ?? '-' }}</td>

              <td>
                @if($d->status == 'dipinjam')
                <span class="badge bg-soft-success">Dipinjam</span>
                @elseif($d->status == 'terlambat')
                <span class="badge bg-soft-danger">Terlambat</span>
                @else
                <span class="badge bg-soft-secondary">{{ $d->status }}</span>
                @endif
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="3" class="text-center py-3">
                Tidak ada data peminjaman
              </td>
            </tr>
            @endforelse

          </tbody>

        </table>

      </div>

    </div>

    



  </div>

</div>

<div class="main-content mt-4">

  <div class="card border-0 shadow-sm">

    <div class="card-header bg-white">
      <h5 class="mb-0">
        Pengembalian Terbaru
      </h5>
    </div>

    <div class="card-body p-0">

      <div class="table-responsive">

        <table class="table table-hover mb-0">

          <thead>
            <tr>
              <th>Anggota</th>
              <th>Buku</th>
              <th>Status</th>
            </tr>
          </thead>

          <tbody>

            @forelse($pengembalian as $d)
            <tr>
              <td>{{ $d->peminjaman->user->name ?? '-' }}</td>
              <td>{{ $d->peminjaman->buku->judul ?? '-' }}</td>

              <td>
                @if($d->terlambat > 0)
                <span class="badge bg-soft-danger">Terlambat {{ $d->terlambat }} hari</span>
                @else
                <span class="badge bg-soft-success">Tepat Waktu</span>
                @endif
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="3" class="text-center py-3">
                Tidak ada data pengembalian
              </td>
            </tr>
            @endforelse

          </tbody>

        </table>

      </div>

    </div>

  </div>

@endsection