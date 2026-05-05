@extends('layouts.app')


@section('content')
<div class="page-header">
  <div class="page-header-left">
    <h5 class="m-b-10">Dashboard Admin</h5>
    <ul class="breadcrumb">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ul>
  </div>
</div>

<div class="main-content">
  <div class="row">
    <div class="col-md-3">
      <div class="card stretch stretch-full">
        <div class="card-body">
          <div class="d-flex align-items-center gap-3">
            <div class="avatar-text avatar-lg bg-primary">
              <i class="feather-users text-white"></i>
            </div>
            <div>
              <div class="fs-4 fw-bold">156</div>
              <div class="fs-12 text-muted">Total Anggota</div>
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
              <i class="feather-book text-white"></i>
            </div>
            <div>
              <div class="fs-4 fw-bold">1.284</div>
              <div class="fs-12 text-muted">Total Buku</div>
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
              <div class="fs-4 fw-bold">47</div>
              <div class="fs-12 text-muted">Peminjaman Aktif</div>
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
              <div class="fs-4 fw-bold">Rp2.450.000</div>
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
          <h5 class="card-title">Transaksi Terbaru</h5>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover mb-0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Anggota</th>
                  <th>Buku</th>
                  <th>Tgl Pinjam</th>
                  <th>Tgl Kembali</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Budi Santoso</td>
                  <td>Laravel 10</td>
                  <td>01/05/2026</td>
                  <td>08/05/2026</td>
                  <td><span class="badge bg-soft-warning">Dipinjam</span></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Siti Aminah</td>
                  <td>React Native</td>
                  <td>02/05/2026</td>
                  <td>09/05/2026</td>
                  <td><span class="badge bg-soft-warning">Dipinjam</span></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Agus Salim</td>
                  <td>Database MySQL</td>
                  <td>28/04/2026</td>
                  <td>05/05/2026</td>
                  <td><span class="badge bg-soft-success">Dikembalikan</span></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Dewi Kartika</td>
                  <td>UI/UX Design</td>
                  <td>30/04/2026</td>
                  <td>07/05/2026</td>
                  <td><span class="badge bg-soft-danger">Terlambat</span></td>
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