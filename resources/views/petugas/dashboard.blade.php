@extends('layouts.app')
@section('title', 'Dashboard Petugas')
@section('content')

<div class="page-header">

  <div class="page-header-left">
    <h5 class="m-b-10">Dashboard Petugas</h5>

    <ul class="breadcrumb">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ul>
  </div>

  <div class="page-header-right">

    <a href="{{ route('petugas.peminjaman.index') }}"
      class="btn btn-primary">

      Kelola Peminjaman

    </a>

  </div>

</div>

<div class="main-content">

  {{-- CARD --}}
  <div class="row">

    {{-- pending --}}
    <div class="col-md-4">

      <div class="card stretch stretch-full">

        <div class="card-body text-center">

          <div class="avatar-text avatar-lg bg-primary mx-auto mb-3">
            <i class="feather-clock text-white fs-2"></i>
          </div>

          <div class="fs-3 fw-bold">
            {{ $pending }}
          </div>

          <div class="fs-12 text-muted">
            Menunggu Persetujuan
          </div>

        </div>

      </div>

    </div>

    {{-- buku --}}
    <div class="col-md-4">

      <div class="card stretch stretch-full">

        <div class="card-body text-center">

          <div class="avatar-text avatar-lg bg-success mx-auto mb-3">
            <i class="feather-book text-white fs-2"></i>
          </div>

          <div class="fs-3 fw-bold">
            {{ $buku }}
          </div>

          <div class="fs-12 text-muted">
            Total Buku
          </div>

        </div>

      </div>

    </div>

    {{-- denda --}}
    <div class="col-md-4">

      <div class="card stretch stretch-full">

        <div class="card-body text-center">

          <div class="avatar-text avatar-lg bg-warning mx-auto mb-3">
            <i class="feather-dollar-sign text-white fs-2"></i>
          </div>

          <div class="fs-3 fw-bold">
            Rp {{ number_format($denda) }}
          </div>

          <div class="fs-12 text-muted">
            Total Denda
          </div>

        </div>

      </div>

    </div>

  </div>

  {{-- TABLE --}}
  <div class="row mt-4">

    {{-- PEMINJAMAN --}}
    <div class="col-md-6">

      <div class="card stretch stretch-full">

        <div class="card-header">
          <h5 class="card-title">
            Peminjaman Menunggu Approve
          </h5>
        </div>

        <div class="card-body p-0">

          <div class="table-responsive">

            <table class="table table-hover mb-0">

              <thead>
                <tr>
                  <th>Anggota</th>
                  <th>Buku</th>
                  <th>Tgl Pinjam</th>
                  <th>Aksi</th>
                </tr>
              </thead>

              <tbody>

                @forelse($peminjaman as $d)

                <tr>

                  <td>
                    {{ $d->user->name ?? '-' }}
                  </td>

                  <td>
                    {{ $d->buku->judul ?? '-' }}
                  </td>

                  <td>
                    {{ $d->tanggal_pinjam }}
                  </td>

                  <td>

                    <div class="hstack gap-2">

                      <a href="{{ route('petugas.peminjaman.approve', $d->id) }}"
                        class="btn btn-sm btn-success">

                        Approve

                      </a>

                      <a href="{{ route('petugas.peminjaman.reject', $d->id) }}"
                        class="btn btn-sm btn-danger">

                        Tolak

                      </a>

                    </div>

                  </td>

                </tr>

                @empty

                <tr>
                  <td colspan="4" class="text-center py-3">
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

    {{-- PENGEMBALIAN --}}
    <div class="col-md-6">

      <div class="card stretch stretch-full">

        <div class="card-header">
          <h5 class="card-title">
            Data Pengembalian
          </h5>
        </div>

        <div class="card-body p-0">

          <div class="table-responsive">

            <table class="table table-hover mb-0">

              <thead>
                <tr>
                  <th>Anggota</th>
                  <th>Buku</th>
                  <th>Terlambat</th>
                  <th>Denda</th>
                </tr>
              </thead>

              <tbody>

                @forelse($pengembalian as $d)

                <tr>

                  <td>
                    {{ $d->peminjaman->user->name ?? '-' }}
                  </td>

                  <td>
                    {{ $d->peminjaman->buku->judul ?? '-' }}
                  </td>

                  <td>

                    @if($d->terlambat > 0)

                    <span class="badge bg-danger">
                      {{ $d->terlambat }} Hari
                    </span>

                    @else

                    <span class="badge bg-success">
                      Tepat Waktu
                    </span>

                    @endif

                  </td>

                  <td>

                    @if($d->denda > 0)

                    <span class="badge bg-danger">
                      Rp {{ number_format($d->denda) }}
                    </span>

                    @else

                    <span class="badge bg-success">
                      Tidak Ada
                    </span>

                    @endif

                  </td>

                </tr>

                @empty

                <tr>
                  <td colspan="4" class="text-center py-3">
                    Belum ada pengembalian
                  </td>
                </tr>

                @endforelse

              </tbody>

            </table>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>

@endsection