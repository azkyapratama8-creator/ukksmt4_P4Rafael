<header class="nxl-header">
  <div class="header-wrapper d-flex justify-content-between align-items-center">

    <!-- LEFT -->
    <div class="header-left d-flex align-items-center gap-3">

      <a href="javascript:void(0);" id="mobile-collapse" class="d-flex align-items-center">
        <div class="hamburger">
          <div></div>
        </div>
      </a>

      <div class="nxl-navigation-toggle">
        <a href="javascript:void(0);" id="menu-mini-button">
          <i class="feather-align-left"></i>
        </a>
      </div>

    </div>

    <!-- RIGHT -->
    <div class="header-right d-flex align-items-center gap-3">

      <!-- SEARCH -->
      <div class="dropdown">
        <a href="#" data-bs-toggle="dropdown">
          <i class="feather-search"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-end p-2">
          <div class="input-group">
            <span class="input-group-text">
              <i class="feather-search"></i>
            </span>
            <input type="text" class="form-control" placeholder="Cari..." />
          </div>
        </div>
      </div>

      <!-- NOTIF -->
      <div class="dropdown">
        <a href="#" data-bs-toggle="dropdown">
          <i class="feather-bell"></i>
          <span class="badge bg-danger">3</span>
        </a>

        <div class="dropdown-menu dropdown-menu-end">
          <h6 class="px-3 py-2">Notifikasi</h6>
          <a class="dropdown-item" href="#">Peminjaman baru</a>
          <a class="dropdown-item" href="#">Buku dikembalikan</a>
        </div>
      </div>

      <!-- USER -->
      <div class="dropdown">
        <a href="#" data-bs-toggle="dropdown" class="d-flex align-items-center">
          <img src="{{ asset('assets/images/avatar/foto.jpg') }}" width="35" class="rounded-circle">
        </a>

        <div class="dropdown-menu dropdown-menu-end">

          <div class="dropdown-header">
            <strong>{{ auth()->user()->name ?? 'Guest' }}</strong><br>
            <small>{{ auth()->user()->email ?? '' }}</small>
          </div>


          <div class="dropdown-divider"></div>

          <a href="/logout" class="dropdown-item">
            @csrf
            <i class="feather-log-out"></i> Logout
          </a>

        </div>
      </div>

    </div>

  </div>
</header>