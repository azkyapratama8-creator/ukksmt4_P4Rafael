@extends('layouts.app')

@section('content')

<div class="page-header">
  <h4 class="mb-0">Tambah Penerbit</h4>
</div>

<div class="card mt-3">
  <div class="card-body">

    <form action="/admin/penerbit" method="POST">
      @csrf

      <div class="mb-3">
        <label class="form-label">Nama Penerbit</label>
        <input type="text" name="nama" class="form-control" required>
      </div>

      <div class="d-flex gap-2">
        <button class="btn btn-primary">Simpan</button>
        <a href="/admin/penerbit" class="btn btn-secondary">Kembali</a>
      </div>

    </form>

  </div>
</div>

@endsection