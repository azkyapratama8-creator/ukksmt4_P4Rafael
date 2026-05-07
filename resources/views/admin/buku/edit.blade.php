@extends('layouts.app')

@section('content')

<div class="card">
  <div class="card-header">
    <h5>Edit Buku</h5>
  </div>

  <div class="card-body">

    <form method="POST" action="/admin/buku/{{ $buku->id }}">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="judul" value="{{ $buku->judul }}" class="form-control">
      </div>

      <div class="mb-3">
        <label>Pengarang</label>
        <select name="pengarang_id" class="form-control">
          @foreach($pengarang as $p)
          <option value="{{ $p->id }}" {{ $buku->pengarang_id == $p->id ? 'selected' : '' }}>
            {{ $p->nama }}
          </option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label>Penerbit</label>
        <select name="penerbit_id" class="form-control">
          @foreach($penerbit as $p)
          <option value="{{ $p->id }}" {{ $buku->penerbit_id == $p->id ? 'selected' : '' }}>
            {{ $p->nama }}
          </option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label>Tahun</label>
        <input type="number" name="tahun" value="{{ $buku->tahun }}" class="form-control">
      </div>

      <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" value="{{ $buku->stok }}" class="form-control">
      </div>

      <div class="d-flex justify-content-end gap-2">
        <a href="/admin/buku" class="btn btn-secondary">Kembali</a>
        <button class="btn btn-success">Update</button>
      </div>

    </form>

  </div>
</div>

@endsection