@extends('layouts.app')

@section('title', 'Dashboard Petugas')

@section('content')
<div class="page-header">
  <div class="page-header-left">
    <h5 class="m-b-10">Dashboard Buku Tersedia</h5>
    <ul class="breadcrumb">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ul>
  </div>
</div>

<div class="main-content">
  <div class="row">
    <div class="col-md-4">
      <div class="card stretch stretch-full">
        <div class="card-body text-center">
          <div class="avatar-text avatar-lg bg-primary mx-auto mb-3">
            <i class="feather-clock text-white fs-2"></i>
          </div>
          <div class="fs-3 fw-bold">12</div>
          <div class="fs-12 text-muted">Menunggu Persetujuan</div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card stretch stretch-full">
        <div class="card-body text-center">
          <div class="avatar-text avatar-lg bg-success mx-auto mb-3">
            <i class="feather-book text-white fs-2"></i>
          </div>
          <div class="fs-3 fw-bold">847</div>
          <div class="fs-12 text-muted">Buku Tersedia</div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card stretch stretch-full">
        <div class="card-body text-center">
          <div class="avatar-text avatar-lg bg-warning mx-auto mb-3">
            <i class="feather-dollar-sign text-white fs-2"></i>
          </div>
          <div class="fs-3 fw-bold">Rp850.000</div>
          <div class="fs-12 text-muted">Denda Belum Lunas</div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-md-6">
      <div class="card stretch stretch-full">
        <div class="card-header">
          <h5 class="card-title">Peminjaman Menunggu Approve</h5>
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
                <tr>
                  <td>Budi Santoso</td>
                  <td>Laravel 10</td>
                  <td>01/05/2026</td>
                  <td>
                    <div class="hstack gap-2">
                      <button class="btn btn-sm btn-success">Approve</button>
                      <button class="btn btn-sm btn-danger">Tolak</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Siti Aminah</td>
                  <td>React Native</td>
                  <td>02/05/2026</td>
                  <td>
                    <div class="hstack gap-2">
                      <button class="btn btn-sm btn-success">Approve</button>
                      <button class="btn btn-sm btn-danger">Tolak</button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card stretch stretch-full">
        <div class="card-header">
          <h5 class="card-title">Pengembalian Menunggu Approve</h5>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover mb-0">
              <thead>
                <tr>
                  <th>Anggota</th>
                  <th>Buku</th>
                  <th>Tgl Kembali</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Agus Salim</td>
                  <td>Database MySQL</td>
                  <td>05/05/2026</td>
                  <td>
                    <div class="hstack gap-2">
                      <button class="btn btn-sm btn-success">Approve</button>
                      <button class="btn btn-sm btn-danger">Tolak</button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection