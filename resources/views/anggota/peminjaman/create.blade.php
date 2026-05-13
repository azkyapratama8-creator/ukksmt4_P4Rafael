@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h4>Ajukan Peminjaman Buku</h4>
        </div>
        <div class="card-body">
          <form action="{{ route('anggota.peminjaman.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="buku_id" class="form-label">Pilih Buku</label>
              <select name="buku_id" id="buku_id" class="form-control" required>
                <option value="">Pilih Buku</option>
                @foreach($bukus as $buku)
                  <option value="{{ $buku->id }}">{{ $buku->judul }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
              <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
              <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" required>
            </div>
            <div class="d-flex gap-2 mt-3">
              <button type="submit" class="btn btn-primary px-4">Ajukan</button>
              <a href="{{ route('anggota.dashboard') }}" class="btn btn-light px-4">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection