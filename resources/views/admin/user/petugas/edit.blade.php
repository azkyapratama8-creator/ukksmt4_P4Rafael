@extends('layouts.app')

@section('title', 'Edit Petugas')

@section('content')

<div class="page-header">
  <h4>Edit Petugas</h4>
</div>

<div class="card mt-3">
  <div class="card-body">

    <form method="POST" action="/admin/petugas/{{ $user->id }}">
      @csrf
      @method('PUT')

      <div class="row">

        <!-- NAMA -->
        <div class="col-md-6 mb-3">
          <label class="form-label">Nama</label>
          <input type="text" name="name"
            value="{{ $user->name }}"
            class="form-control"
            required>
        </div>

        <!-- EMAIL -->
        <div class="col-md-6 mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email"
            value="{{ $user->email }}"
            class="form-control"
            required>
        </div>

        <!-- PASSWORD -->
        <div class="col-md-6 mb-3">
          <label class="form-label">Password (Opsional)</label>
          <input type="password" name="password"
            class="form-control"
            placeholder="Kosongkan jika tidak diubah">
        </div>

      </div>

      <!-- BUTTON -->
      <div class="d-flex justify-content-end gap-2 mt-3">

        <a href="/admin/petugas" class="btn btn-secondary px-4">
          Kembali
        </a>

        <button type="submit" class="btn btn-success px-4">
          Update
        </button>

      </div>

    </form>

  </div>
</div>

@endsection