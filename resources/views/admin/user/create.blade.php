@extends('layouts.app')

@section('content')

<div class="page-header">
  <h4 class="mb-0">Tambah User</h4>
</div>

<div class="card stretch stretch-full mt-3 mx-3">

  <div class="card-header">
    <h5 class="card-title mb-0">Form Tambah User</h5>
  </div>

  <div class="card-body">

    <form action="/admin/users" method="POST">
      @csrf

      <div class="row">

        <div class="col-md-6 mb-3">
          <label class="form-label">Nama</label>

          <input type="text"
            name="name"
            class="form-control"
            placeholder="Masukkan nama">
        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Email</label>

          <input type="email"
            name="email"
            class="form-control"
            placeholder="Masukkan email">
        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Password</label>

          <input type="password"
            name="password"
            class="form-control"
            placeholder="Masukkan password">
        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Role</label>

          <select name="role" class="form-select">
            <option value="">-- Pilih Role --</option>
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
            <option value="anggota">Anggota</option>
          </select>
        </div>

      </div>

      <div class="d-flex gap-2 mt-3">
        <button class="btn btn-primary px-4">
          Simpan
        </button>
        <a href="/admin/users" class="btn btn-light px-4">
          Kembali
        </a>
      </div>

    </form>

  </div>

</div>

@endsection