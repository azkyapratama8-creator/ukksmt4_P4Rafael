@extends('layouts.app')

@section('content')

<div class="card">
  <div class="card-header">
    <h4>Edit User</h4>
  </div>

  <div class="card-body">

    <form action="/admin/users/{{ $user->id }}" method="POST">

      @csrf
      @method('PUT')

      <div class="mb-3">
        <label>Nama</label>

        <input type="text"
          name="name"
          value="{{ $user->name }}"
          class="form-control">
      </div>

      <div class="mb-3">
        <label>Email</label>

        <input type="email"
          name="email"
          value="{{ $user->email }}"
          class="form-control">
      </div>

      <div class="mb-3">
        <label>Password Baru</label>

        <input type="password"
          name="password"
          class="form-control">
      </div>

      <div class="mb-3">
        <label>Role</label>

        <select name="role" class="form-control">

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

      <button class="btn btn-primary">
        Update
      </button>

    </form>

  </div>
</div>

@endsection