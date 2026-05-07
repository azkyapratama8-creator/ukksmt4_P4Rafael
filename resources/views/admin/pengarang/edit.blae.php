@extends('layouts.app')

@section('content')

<div class="page-header">
  <h4 class="mb-0">Edit Pengarang</h4>
</div>

<div class="card mt-3">
  <div class="card-body">

    <form action="/admin/pengarang/{{ $data->id }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label class="form-label">Nama Pengarang</label>
        <input type="text" name="nama" value="{{ $data->nama }}" class="form-control" required>
      </div>

      <div class="d-flex gap-2">
        <button class="btn btn-primary">Update</button>
        <a href="/admin/pengarang" class="btn btn-secondary">Kembali</a>
      </div>

    </form>

  </div>
</div>

@endsection