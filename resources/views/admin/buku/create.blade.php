@extends('layouts.app')

@section('content')

<div class="card">
  <div class="card-header">
    <h5>Tambah Buku</h5>
  </div>

  <div class="card-body">

    <form method="POST" action="/admin/buku">
      @csrf

      <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Pengarang</label>
        <select name="pengarang_id" class="form-control" required>
          <option value="">-- Pilih Pengarang --</option>
          @foreach($pengarang as $p)
          <option value="{{ $p->id }}">{{ $p->nama }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label>Penerbit</label>
        <select name="penerbit_id" class="form-control" required>
          <option value="">-- Pilih Penerbit --</option>
          @foreach($penerbit as $p)
          <option value="{{ $p->id }}">{{ $p->nama }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label>Tahun</label>
        <input type="number" name="tahun" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" required>
      </div>

      <div class="d-flex justify-content-end gap-2">
        <a href="/admin/buku" class="btn btn-secondary">Kembali</a>
        <button class="btn btn-primary">Simpan</button>
      </div>

    </form>

  </div>
</div>

@endsection