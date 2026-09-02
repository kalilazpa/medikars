<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center"
       href="{{ route('admin.dashboard') }}">

        <div class="sidebar-brand-icon">
            <i class="fas fa-hospital"></i>
        </div>

        <div class="sidebar-brand-text mx-3">
            Medikars
        </div>

    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Data
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.pasien.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Pasien</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dokter.index') }}">
            <i class="fas fa-fw fa-user-md"></i>
            <span>Dokter</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.pendaftaran.index') }}">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Pendaftaran</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Pengaturan
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.admin.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Admin</span>
        </a>
    </li>

</ul>