@extends('layouts.app')

@section('title', 'Dashboard Anggota')

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
              <div class="fs-4 fw-bold">847</div>
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
              <div class="fs-4 fw-bold">2</div>
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
              <div class="fs-4 fw-bold">5</div>
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
              <div class="fs-4 fw-bold">Rp0</div>
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
        <div class="card-body">
          <div class="row">
            <div class="col-md-3 mb-3">
              <div class="card">
                <img src="{{ asset('assets/images/banner/1.jpg') }}" class="card-img-top" style="height: 180px; object-fit:cover">
                <div class="card-body p-2 text-center">
                  <h6 class="mb-1">Laravel 10</h6>
                  <small class="text-muted">Stok: 5</small>
                  <button class="btn btn-sm btn-primary w-100 mt-2">Pinjam</button>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <div class="card">
                <img src="{{ asset('assets/images/banner/2.jpg') }}" class="card-img-top" style="height: 180px; object-fit:cover">
                <div class="card-body p-2 text-center">
                  <h6 class="mb-1">React Native</h6>
                  <small class="text-muted">Stok: 3</small>
                  <button class="btn btn-sm btn-primary w-100 mt-2">Pinjam</button>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <div class="card">
                <img src="{{ asset('assets/images/banner/3.jpg') }}" class="card-img-top" style="height: 180px; object-fit:cover">
                <div class="card-body p-2 text-center">
                  <h6 class="mb-1">Database MySQL</h6>
                  <small class="text-muted">Stok: 2</small>
                  <button class="btn btn-sm btn-primary w-100 mt-2">Pinjam</button>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <div class="card">
                <img src="{{ asset('assets/images/banner/4.jpg') }}" class="card-img-top" style="height: 180px; object-fit:cover">
                <div class="card-body p-2 text-center">
                  <h6 class="mb-1">UI/UX Design</h6>
                  <small class="text-muted">Stok: 0</small>
                  <button class="btn btn-sm btn-secondary w-100 mt-2" disabled>Stok Habis</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection