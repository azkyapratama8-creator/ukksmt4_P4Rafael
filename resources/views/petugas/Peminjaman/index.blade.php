@extends('layouts.app')

@section('content')

<div class="page-header">
  <h4 class="mb-0">Pengajuan Peminjaman Buku</h4>
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
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th width="20%">Aksi</th>
          </tr>
        </thead>

        <tbody>

          @forelse($data as $key => $d)

          <tr>

            <td>{{ $key + 1 }}</td>
            <td>{{ $d->user->name ?? '-' }}</td>
            <td>{{ $d->buku->judul ?? '-' }}</td>
            <td>{{ $d->created_at }}</td>
            <td>{{ $d->tanggal_kembali }}</td>

            <td>
              @if($d->status == 'pending')
              <span class="badge bg-warning">Menunggu Persetujuan</span>
              @elseif($d->status == 'approved')
              <span class="badge bg-success">Disetujui</span>
              @elseif($d->status == 'rejected')
              <span class="badge bg-danger">Ditolak</span>
              @endif
            </td>
            <td>
              @if($d->status == 'pending')

              <a href="{{ route('petugas.peminjaman.approve', $d->id) }}"
                class="btn btn-success btn-sm">
                Approve
              </a>

              <a href="{{ route('petugas.peminjaman.reject', $d->id) }}"
                class="btn btn-danger btn-sm">
                Reject
              </a>

              @elseif($d->status == 'approved' && !$d->pengembalian)

              <form action="{{ route('petugas.pengembalian.store') }}" method="POST" class="d-flex gap-2 align-items-center">
                @csrf
                <input type="hidden" name="peminjaman_id" value="{{ $d->id }}">
                <input type="date" name="tanggal_dikembalikan" value="{{ now()->toDateString() }}" class="form-control form-control-sm" required>
                <button class="btn btn-primary btn-sm">Kembalikan</button>
              </form>

              @elseif($d->pengembalian)
              <span class="badge bg-secondary">Sudah dikembalikan</span>
              @else
              <span class="text-muted">
                Tidak ada aksi
              </span>
              @endif
            </td>



          </tr>

          @empty
          <tr>
            <td colspan="7" class="text-center py-4">
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