@extends ('layouts.app')

@section('content')



<div class="page-header">
  <h4 class="mb-0">Buku Tersedia</h4>
</div>

<div class="row mt-4 gx-3 gy-2 px-2 px-md-3">

  @forelse($bukus as $buku)

  <div class="col-lg-3 col-md-4 col-sm-6 col-12">

    <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">

      {{-- 📸 FOTO BUKU --}}
      <img src="{{ asset('foto_buku/' . $buku->foto) }}"
        class="card-img-top"
        style="height:180px; object-fit:cover;">

      <div class="card-body p-2 d-flex flex-column">

        {{-- 📚 JUDUL --}}
        <h5 class="card-title" style="font-size: 0.95rem; line-height: 1.3; min-height: 2.6em;">
          {{ $buku->judul }}
        </h5>

        {{-- ✍️ PENGARANG --}}
        <p class="text-muted mb-1" style="font-size: 0.85rem;">
          {{ $buku->pengarang->nama }}
        </p>

        {{-- 📦 STOK --}}
        <p class="mb-2" style="font-size: 0.85rem;">
          Stok : {{ $buku->stok }}
        </p>

        {{-- 🔘 BUTTON --}}
        <a href="/anggota/peminjaman/create"
          class="btn btn-primary btn-sm w-100 mt-auto">
          Pinjam Buku
        </a>

      </div>

    </div>

  </div>

  @empty

  <div class="col-12">
    <div class="alert alert-danger">
      Buku tidak tersedia
    </div>
  </div>

  @endforelse

</div>

@endsection