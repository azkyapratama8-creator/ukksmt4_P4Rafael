@extends('layouts.app')

@section('content')

<div class="page-header">
  <h4 class="mb-0">Edit Rak Buku</h4>
</div>

<div class="card stretch stretch-full mt-3 mx-3">
  <div class="card-header">
    <h5 class="card-title mb-0">Form Edit Rak Buku</h5>
  </div>

  <div class="card-body">
    <form method="POST" action="/admin/rak-buku/{{ $rakBuku->id }}">
      @csrf
      @method('PUT')

      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">Nama Rak</label>
          <input type="text" name="nama_rak" class="form-control" value="{{ $rakBuku->nama_rak }}" placeholder="Masukkan nama rak" required>
        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Lokasi</label>
          <input type="text" name="lokasi" class="form-control" value="{{ $rakBuku->lokasi }}" placeholder="Masukkan lokasi">
        </div>
      </div>

      <div class="d-flex gap-2 mt-3">
        <button class="btn btn-primary px-4">Simpan</button>
        <a href="/admin/rak-buku" class="btn btn-light px-4">Kembali</a>
      </div>
    </form>
  </div>
</div>
@endsection