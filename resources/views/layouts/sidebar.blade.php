<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">
  
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-text mx-3">SPK-MDPS</div>
  </a>
  
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  
  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dosens') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Data Dosen</span></a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="{{ route('settings.bobot') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Data Bobot</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('normalisasi') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Normalisasi</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('topsis.terbobot') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Normalisasi Terbobot</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('topsis.ideal') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Nilai Ideal</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('topsis.jarak') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Nilai Jarak</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('topsis.preferensi') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Nilai Preferensi</span>
    </a>
  </li>
  
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
  
  
</ul>