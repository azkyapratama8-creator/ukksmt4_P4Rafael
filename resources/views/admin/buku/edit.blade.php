@extends('layouts.app')

@section('content')

<div class="page-header">
  <h4 class="mb-0">Edit Buku</h4>
</div>

<div class="card stretch stretch-full mt-3 mx-3">
  <div class="card-header">
    <h5 class="card-title mb-0">Form Edit Buku</h5>
  </div>

  <div class="card-body">
    <form method="POST" action="/admin/buku/{{ $buku->id }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">Foto Sampul</label>
          <input type="file" name="foto" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Judul</label>
          <input type="text" name="judul" value="{{ $buku->judul }}" class="form-control" placeholder="Masukkan judul buku">
        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Pengarang</label>
          <select name="pengarang_id" class="form-select">
            @foreach($pengarang as $p)
            <option value="{{ $p->id }}" {{ $buku->pengarang_id == $p->id ? 'selected' : '' }}>
              {{ $p->nama }}
            </option>
            @endforeach
          </select>
        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Penerbit</label>
          <select name="penerbit_id" class="form-select">
            @foreach($penerbit as $p)
            <option value="{{ $p->id }}" {{ $buku->penerbit_id == $p->id ? 'selected' : '' }}>
              {{ $p->nama }}
            </option>
            @endforeach
          </select>
        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Rak Buku</label>
          <select name="rak_buku_id" class="form-select">
            @foreach($rakBuku as $r)
            <option value="{{ $r->id }}" {{ $buku->rak_buku_id == $r->id ? 'selected' : '' }}>
              {{ $r->nama_rak }}
            </option>
            @endforeach
          </select>
        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Kelas</label>
          <select name="kelas_id" class="form-select">
            @foreach($kelas as $k)
            <option value="{{ $k->id }}" {{ $buku->kelas_id == $k->id ? 'selected' : '' }}>
              {{ $k->nama_kelas }}
            </option>
            @endforeach
          </select>

           <div class="col-md-3 mb-3">
            <label class="form-label">Tahun</label>
            <input type="number" name="tahun" value="{{ $buku->tahun }}" class="form-control" placeholder="2026">
          </div>

          <div class="col-md-3 mb-3">
            <label class="form-label">Stok</label>
            <input type="number" name="stok" value="{{ $buku->stok }}" class="form-control" placeholder="Jumlah stok">
          </div>
        </div>

        <div class="d-flex gap-2 mt-3">
          <a href="/admin/buku" class="btn btn-light px-4">Kembali</a>
          <button class="btn btn-primary px-4">Update</button>
        </div>
    </form>
  </div>
</div>

@endsection