@extends('layouts.app')

@section('content')

<div class="page-header">
  <h4>Tambah Petugas</h4>
</div>

<div class="card mt-3">
  <div class="card-body">

    <form method="POST" action="/admin/petugas">
      @csrf

      <div class="row">

        <div class="col-md-6 mb-3">
          <label class="form-label">Nama</label>
          <input type="text" name="name" class="form-control" placeholder="Masukkan nama" required>
        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
        </div>

      </div>

      <!-- BUTTON -->
      <div class="d-flex justify-content-end gap-2 mt-3">

        <a href="/admin/petugas" class="btn btn-secondary px-4">
          Kembali
        </a>

        <button type="submit" class="btn btn-primary px-4">
          Simpan
        </button>

      </div>

    </form>

  </div>
</div>

@endsection