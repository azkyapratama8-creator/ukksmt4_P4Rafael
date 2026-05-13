@extends('layouts.app')

@section('content')

<div class="page-header">
  <h4 class="mb-0">Edit User</h4>
</div>

<div class="card stretch stretch-full mt-3 mx-3">

  <div class="card-header">
    <h5 class="card-title mb-0">Form Edit User</h5>
  </div>

  <div class="card-body">

    <form action="/admin/users/{{ $user->id }}" method="POST">

      @csrf
      @method('PUT')

      <div class="row">

        <div class="col-md-6 mb-3">
          <label class="form-label">Nama</label>

          <input type="text"
            name="name"
            value="{{ $user->name }}"
            class="form-control"
            placeholder="Masukkan nama">
        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Email</label>

          <input type="email"
            name="email"
            value="{{ $user->email }}"
            class="form-control"
            placeholder="Masukkan email">
        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Password Baru</label>

          <input type="password"
            name="password"
            class="form-control"
            placeholder="Kosongkan jika tidak diubah">
        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Role</label>

          <select name="role" class="form-select">

            <option value="admin"
              {{ $user->role == 'admin' ? 'selected' : '' }}>
              Admin
            </option>

            <option value="petugas"
              {{ $user->role == 'petugas' ? 'selected' : '' }}>
              Petugas
            </option>

            <option value="anggota"
              {{ $user->role == 'anggota' ? 'selected' : '' }}>
              Anggota
            </option>

          </select>
        </div>

      </div>

      <div class="d-flex gap-2 mt-3">
        <button class="btn btn-primary px-4">
          Update
        </button>

        <a href="/admin/users" class="btn btn-light px-4">
          Kembali
        </a>
      </div>

    </form>

  </div>

</div>

@endsection