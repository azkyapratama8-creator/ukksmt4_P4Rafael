@extends('layouts.app')

@section('content')

<div class="page-header">
  <h4 class="mb-0">Data Buku</h4>
</div>

<div class="card stretch stretch-full mt-3 mx-3">

  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="card-title mb-0">Daftar Buku</h5>

    <a href="/admin/buku/create" class="btn btn-primary btn-sm">
      <i class="feather-plus"></i> Tambah
    </a>
  </div>

  <div class="card-body px-3 py-2">
    <div class="table-responsive w-95 mx-auto" style="width: 95%;">

      <table class="table table-sm table-hover mb-0 align-middle">

        <thead>
          <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Rak Buku</th>
            <th>Kelas</th>
            <th>Tahun</th>
            <th>Stok</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          @forelse($data as $key => $b)
          <tr>
            <td>{{ $key + 1 }}</td>

            <td>
              @if($b->foto)
              <img src="{{ asset('foto_buku/'.$b->foto) }}"
                width="60"
                height="80"
                class="rounded"
                style="object-fit: cover;">
              @else
              <span class="text-muted">
                Tidak ada foto
              </span>
              @endif
            </td>

            <td>{{ $b->judul }}</td>
            <td>{{ $b->pengarang->nama ?? '-' }}</td>
            <td>{{ $b->penerbit->nama ?? '-' }}</td>
            <td>{{ $b->rakBuku->nama_rak ?? '-' }}</td>
            <td>{{ $b->kelas->nama_kelas ?? '-' }}</td>
            <td>{{ $b->tahun }}</td>
            <td>{{ $b->stok }}</td>

            <td>
              <div class="hstack gap-2">

                <a href="/admin/buku/{{ $b->id }}/edit"
                  class="btn btn-warning btn-sm">
                  Edit
                </a>

                <form action="/admin/buku/{{ $b->id }}" method="POST">
                  @csrf
                  @method('DELETE')

                  <button class="btn btn-danger btn-sm"
                    onclick="return confirm('Hapus buku ini?')">
                    Hapus
                  </button>
                </form>

              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="9" class="text-center py-4">
              Tidak ada data buku.
            </td>
          </tr>
          @endforelse
        </tbody>

      </table>


    </div>
  </div>

</div>

@endsection