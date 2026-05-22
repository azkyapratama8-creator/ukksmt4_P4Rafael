@extends('layouts.app')

@section('title' , 'Dashboard Anggota')

@section('content')
<div class="page-header">
  <div class="page-header-left">
    <h5 class="m-b-10">Dashboard Buku Tersedia</h5>
    <ul class="breadcrumb">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ul>
  </div>
  <div class="page-header-right">
    <a href="{{ route('anggota.peminjaman.create') }}" class="btn btn-primary">Ajukan Peminjaman</a>
  </div>
</div>

<div class="main-content">
  <div class="row">
    <div class="col-md-3">
      <div class="card stretch stretch-full">
        <div class="card-body">
          <div class="d-flex align-items-center gap-3">
            <div class="avatar-text avatar-lg bg-primary">
              <i class="feather-book-open text-white"></i>
            </div>
            <div>
              <div class="fs-4 fw-bold">{{ $bukuTersedia }}</div>
              <div class="fs-12 text-muted">Buku Tersedia</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card stretch stretch-full">
        <div class="card-body">
          <div class="d-flex align-items-center gap-3">
            <div class="avatar-text avatar-lg bg-warning">
              <i class="feather-calendar text-white"></i>
            </div>
            <div>
              <div class="fs-4 fw-bold">{{ $sedangDipinjam }}</div>
              <div class="fs-12 text-muted">Sedang Dipinjam</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card stretch stretch-full">
        <div class="card-body">
          <div class="d-flex align-items-center gap-3">
            <div class="avatar-text avatar-lg bg-success">
              <i class="feather-clock text-white"></i>
            </div>
            <div>
              <div class="fs-4 fw-bold">{{ $riwayatPeminjaman }}</div>
              <div class="fs-12 text-muted">Riwayat Peminjaman</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card stretch stretch-full">
        <div class="card-body">
          <div class="d-flex align-items-center gap-3">
            <div class="avatar-text avatar-lg bg-danger">
              <i class="feather-dollar-sign text-white"></i>
            </div>
            <div>
              <div class="fs-4 fw-bold">Rp{{ number_format($totalDenda, 0, ',', '.') }}</div>
              <div class="fs-12 text-muted">Total Denda</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-12">
      <div class="card stretch stretch-full">
        <div class="card-header">
          <h5 class="card-title">Buku Populer</h5>
        </div>
        <div class="card-body p-2">
          <div class="row g-2">
            @forelse($popularBooks as $buku)
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
              <div class="card rounded-3 overflow-hidden h-100 shadow-sm border-0">
                <img src="{{ $buku->foto ? asset('foto_buku/'.$buku->foto) : asset('assets/images/banner/1.jpg') }}" class="card-img-top" style="height: 150px; object-fit:cover">
                <div class="card-body p-2 text-center d-flex flex-column">
                  <h6 class="mb-1" style="font-size: 0.875rem; line-height: 1.2; min-height: 2.4em;">{{ $buku->judul }}</h6>
                  <small class="text-muted mb-2">Stok: {{ $buku->stok }}</small>
                  @if($buku->stok > 0)
                  <a href="{{ route('anggota.peminjaman.create') }}" class="btn btn-sm btn-primary w-100 mt-auto">Pinjam</a>
                  @else
                  <button class="btn btn-sm btn-secondary w-100 mt-auto" disabled>Stok Habis</button>
                  @endif
                </div>
              </div>
            </div>
            @empty
            <div class="col-12">
              <div class="alert alert-info mb-0">Belum ada buku populer untuk ditampilkan.</div>
            </div>
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection