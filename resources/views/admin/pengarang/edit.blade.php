@extends('layouts.app')

@section('content')

<div class="page-header">
  <h4 class="mb-0">Edit Pengarang</h4>
</div>

<div class="card stretch stretch-full mt-3 mx-3">
  <div class="card-header">
    <h5 class="card-title mb-0">Form Edit Pengarang</h5>
  </div>

  <div class="card-body">
    <form action="/admin/pengarang/{{ $pengarang->id }}" method="POST">
      @csrf
      @method('PUT')

      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">Nama Pengarang</label>
          <input type="text" name="nama" value="{{ $pengarang->nama }}" class="form-control" placeholder="Masukkan nama pengarang" required>
        </div>
      </div>

      <div class="d-flex gap-2 mt-3">
        <button class="btn btn-primary px-4">Update</button>
        <a href="/admin/pengarang" class="btn btn-light px-4">Kembali</a>
      </div>
    </form>
  </div>
</div>

@endsection