@extends('layouts.app')

@section('content')

<div class="page-header">
  <h4 class="mb-0">History Peminjaman Buku</h4>
</div>

<div class="card stretch stretch-full mt-3 mx-3">

  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="card-title mb-0">Riwayat Peminjaman</h5>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-sm table-hover align-middle mb-0">

        <thead>
          <tr>
            <th width="5%">No</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Deadline</th>
            <th>Denda</th>
            <th>Status</th>
          </tr>
        </thead>

        <tbody>

          @forelse($data as $key => $d)

          <tr>

            <td>{{ $key + 1 }}</td>

            <td>
              {{ $d->buku->judul ?? '-' }}
            </td>

            <td>
              {{ $d->tanggal_pinjam }}
            </td>

            <td>
              {{ $d->tanggal_kembali }}
            </td>

            <td>
              @if($d->pengembalian)
                Rp{{ number_format($d->pengembalian->denda, 0, ',', '.') }}
              @else
                -
              @endif
            </td>

            <td>

              @if($d->status == 'pending')

              <span class="badge bg-warning">
                Pending
              </span>

              @elseif($d->status == 'approved')

              <span class="badge bg-success">
                Dipinjam
              </span>

              @elseif($d->status == 'rejected')

              <span class="badge bg-danger">
                Ditolak
              </span>

              @elseif($d->status == 'dikembalikan')

              <span class="badge bg-primary">
                Dikembalikan
              </span>

              @endif

            </td>

          </tr>

          @empty

          <tr>
            <td colspan="6" class="text-center py-4">
              Belum ada history peminjaman
            </td>
          </tr>

          @endforelse

        </tbody>

      </table>

    </div>

    {{-- pagination --}}
    <div class="mt-3">
      {{ $data->links() }}
    </div>

  </div>

</div>

@endsection