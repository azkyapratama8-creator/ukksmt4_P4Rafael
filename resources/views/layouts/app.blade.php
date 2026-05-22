<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Sistem Peminjaman Buku')</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Feather Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.css">

  <!-- Duralux CSS -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendors.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}" />

  @stack('styles')
</head>

<body class="d-flex flex-column min-vh-100">


  <div class=" nxl-wrapper">

    <style>
      .nxl-header .dropdown-menu,
      .nxl-header .nxl-h-dropdown {
        right: 0 !important;
        left: auto !important;
        transform: none !important;
        position: absolute !important;
      }

      .nxl-header .header-wrapper {
        min-height: 70px !important;
        display: flex !important;
        align-items: center !important;
      }

      .table tbody tr td {
        padding-top: 14px;
        padding-bottom: 14px;
        vertical-align: middle;
      }

      .table thead tr th {
        padding-top: 12px;
        padding-bottom: 12px;
      }
    </style>
    <!-- SIDEBAR -->
    @include('layouts.sidebar')

    <!-- MAIN CONTENT WRAPPER -->
    <!-- HEADER -->
    @include('layouts.header')

    <!-- CONTENT -->
    <main class="nxl-container flex-fill">
      <div class="nxl-content">
        @yield('content')
      </div>

      <!-- FOOTER -->

    </main>
    <footer class="mt-auto text-center py-3 border-top">
      <p class="fs-11 text-muted text-center mb-0">
        © {{ date('Y') }} Sistem Perpustakaan Digital
      </p>
    </footer>
  </div>
  </div>

  <!-- JS -->
  <script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
  <script src="{{ asset('assets/js/common-init.min.js') }}"></script>

  @stack('scripts')

</body>

</html>