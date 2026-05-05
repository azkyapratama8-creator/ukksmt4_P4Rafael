@extends('layouts.app')

@section('content')

<div class="page-header">
  <h4 class="mb-0">Data Petugas</h4>
</div>

<div class="card mt-3">
  <div class="card-header d-flex justify-content-between align-items-center">
    <span>Daftar Petugas</span>
    <a href="/admin/petugas/create" class="btn btn-primary btn-sm">
      <i class="feather-plus"></i> Tambah
    </a>
  </div>

  <div class="card-body">
    <div class="table-responsive">

      <table class="table table-bordered table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th width="5%">No</th>
            <th>Nama</th>
            <th>Email</th>
            <th width="20%">Aksi</th>
          </tr>
        </thead>

        <tbody>
          @foreach($data as $key => $u)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $u->name }}</td>
            <td>{{ $u->email }}</td>
            <td>
              <div class="d-flex gap-2">

                <a href="/admin/petugas/{{ $u->id }}/edit"
                  class="btn btn-warning btn-sm w-100 text-center">
                  Edit
                </a>

                <form action="/admin/petugas/{{ $u->id }}" method="POST" class="w-100">
                  @csrf
                  @method('DELETE')

                  <button class="btn btn-danger btn-sm w-100">
                    Hapus
                  </button>
                </form>

              </div>
            </td>
          </tr>
          @endforeach
        </tbody>

      </table>

    </div>
  </div>
</div>

@endsection