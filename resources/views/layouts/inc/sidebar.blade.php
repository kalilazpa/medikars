<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
       href="{{ route('admin.dashboard') }}">

        <div class="sidebar-brand-icon">
            <i class="fas fa-hospital"></i>
        </div>

        <div class="sidebar-brand-text mx-3">
            MEDIKARS
        </div>

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Data -->
    <div class="sidebar-heading">
        Data
    </div>

    <!-- Pasien -->
    <li class="nav-item {{ request()->routeIs('admin.pasien.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.pasien.index') }}">
            <i class="fas fa-fw fa-user-injured"></i>
            <span>Pasien</span>
        </a>
    </li>

    <!-- Dokter -->
    <li class="nav-item {{ request()->routeIs('admin.dokter.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dokter.index') }}">
            <i class="fas fa-fw fa-user-md"></i>
            <span>Dokter</span>
        </a>
    </li>

    <!-- Pendaftaran -->
    <li class="nav-item {{ request()->routeIs('admin.pendaftaran.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.pendaftaran.index') }}">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Pendaftaran</span>
        </a>
    </li>

    <!-- Admin -->
    <li class="nav-item {{ request()->routeIs('admin.admin.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.admin.index') }}">
            <i class="fas fa-fw fa-users-cog"></i>
            <span>Admin</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Pengaturan -->
    <div class="sidebar-heading">
        Pengaturan
    </div>

    <!-- Profil -->
    <li class="nav-item {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.profile') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Profil Saya</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->