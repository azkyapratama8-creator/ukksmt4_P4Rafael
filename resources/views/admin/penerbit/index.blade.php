@extends('layouts.app')

@section('content')


<div class="page-header">
  <h4 class="mb-0">Data Penerbit</h4>
</div>

<div class="card stretch stretch-full mt-3 mx-3">

  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="card-title mb-0">Daftar Penerbit</h5>

    <a href="/admin/penerbit/create" class="btn btn-primary btn-sm">
      <i class="feather-plus"></i> Tambah
    </a>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-sm table-hover align-middle mb-0">

        <thead>
          <tr>
            <th width="5%">No</th>
            <th>Nama</th>
            <th width="18%">Aksi</th>
          </tr>
        </thead>

        <tbody>
          @forelse($data as $key => $d)
          <tr>

            <td>{{ $key + 1 }}</td>

            <td>{{ $d->nama }}</td>

            <td>
              <div class="hstack gap-2">

                <a href="/admin/penerbit/{{ $d->id }}/edit"
                  class="btn btn-warning btn-sm">
                  Edit
                </a>

                <form action="/admin/penerbit/{{ $d->id }}" method="POST">
                  @csrf
                  @method('DELETE')

                  <button class="btn btn-danger btn-sm"
                    onclick="return confirm('Hapus data ini?')">
                    Hapus
                  </button>
                </form>

              </div>
            </td>

          </tr>
          @empty
          <tr>
            <td colspan="3" class="text-center py-4">
              Data kosong
            </td>
          </tr>
          @endforelse
        </tbody>

      </table>

    </div>

  </div>

</div>

@endsection