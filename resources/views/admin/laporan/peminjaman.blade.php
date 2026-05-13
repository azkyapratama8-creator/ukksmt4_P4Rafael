@extends('layouts.app')

@section('content')

<div class="page-header">
  <h4 class="mb-0">Laporan Peminjaman</h4>
</div>

<div class="card stretch stretch-full mt-3 mx-3">

  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="card-title mb-0">Data Peminjaman</h5>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-sm table-hover align-middle mb-0">

        <thead>
          <tr>
            <th width="5%">No</th>
            <th>Nama User</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Status</th>
          </tr>
        </thead>

        <tbody>
          @forelse($data as $key => $d)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $d->user->name ?? '-' }}</td>
            <td>{{ $d->buku->judul ?? '-' }}</td>
            <td>{{ $d->created_at }}</td>
            <td>{{ $d->status ?? 'dipinjam' }}</td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="text-center py-4">
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