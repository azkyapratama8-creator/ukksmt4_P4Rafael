@extends('layouts.app')

@section('content')

<div class="card">
  <div class="card-header">
    <h4>Tambah User</h4>
  </div>

  <div class="card-body">

    <form action="/admin/users" method="POST">
      @csrf

      <div class="mb-3">
        <label>Nama</label>
        <input type="text"
          name="name"
          class="form-control">
      </div>

      <div class="mb-3">
        <label>Email</label>
        <input type="email"
          name="email"
          class="form-control">
      </div>

      <div class="mb-3">
        <label>Password</label>
        <input type="password"
          name="password"
          class="form-control">
      </div>

      <div class="mb-3">
        <label>Role</label>

        <select name="role" class="form-control">
          <option value="admin">Admin</option>
          <option value="petugas">Petugas</option>
          <option value="anggota">Anggota</option>
        </select>
      </div>

      <button class="btn btn-primary">
        Simpan
      </button>

    </form>

  </div>
</div>

@endsection