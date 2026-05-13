@extends('layouts.app')

@section('content')

<div class="page-header">
  <h4 class="mb-0">Tambah Buku</h4>
</div>

<div class="card stretch stretch-full mt-3 mx-3">
  <div class="card-header">
    <h5 class="card-title mb-0">Form Tambah Buku</h5>
  </div>

  <div class="card-body">
    <form method="POST" action="/admin/buku" enctype="multipart/form-data">
      @csrf

      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">Foto Sampul</label>
          <input type="file" name="foto" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Judul</label>
          <input type="text" name="judul" class="form-control" placeholder="Masukkan judul buku" required>
        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Pengarang</label>
          <select name="pengarang_id" class="form-select" required>
            <option value="">-- Pilih Pengarang --</option>
            @foreach($pengarang as $p)
            <option value="{{ $p->id }}">{{ $p->nama }}</option>
            @endforeach
          </select>
        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Penerbit</label>
          <select name="penerbit_id" class="form-select" required>
            <option value="">-- Pilih Penerbit --</option>
            @foreach($penerbit as $p)
            <option value="{{ $p->id }}">{{ $p->nama }}</option>
            @endforeach
          </select>
        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Rak Buku</label>
          <select name="rak_buku_id" class="form-select" required>
            <option value="">-- Pilih Rak Buku --</option>
            @foreach($rakBuku as $r)
            <option value="{{ $r->id }}">{{ $r->nama_rak }}</option>
            @endforeach
          </select>
        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Kelas</label>
          <select name="kelas_id" class="form-select" required>
            <option value="">-- Pilih Kelas --</option>
            @foreach($kelas as $k)
            <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
            @endforeach
          </select>
        </div>

        <div class="col-md-3 mb-3">
          <label class="form-label">Tahun</label>
          <input type="number" name="tahun" class="form-control" placeholder="2026" required>
        </div>

        <div class="col-md-3 mb-3">
          <label class="form-label">Stok</label>
          <input type="number" name="stok" class="form-control" placeholder="Jumlah stok" required>
        </div>
      </div>

      <div class="d-flex gap-2 mt-3">
        <a href="/admin/buku" class="btn btn-light px-4">Kembali</a>
        <button class="btn btn-primary px-4">Simpan</button>
      </div>
    </form>
  </div>
</div>

@endsection