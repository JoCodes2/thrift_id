<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <!-- Brand -->
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/thrift.png') }}" alt="Logo"
                     class="img-fluid" width="50" height="50">
            </span>
            <span class="text-start app-brand-text fw-bold ms-2">
                <small>Filtering</small><br>
                <small>Thrift</small>
            </span>
        </a>

        <a href="javascript:void(0);"
           class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <!-- /Brand -->

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <!-- ==================== UTAMA ==================== -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Utama</span>
        </li>

        <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon fa-solid fa-chart-line"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <!-- ==================== DATA MASTER ==================== -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data Master</span>
        </li>

        <li class="menu-item {{ request()->is('toko') ? 'active' : '' }}">
            <a href="/toko" class="menu-link">
                <i class="menu-icon fa-solid fa-store"></i>
                <div>Toko</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('kategori') ? 'active' : '' }}">
            <a href="/kategori" class="menu-link">
                <i class="menu-icon fa-solid fa-tags"></i>
                <div>Kategori</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('produk-admin') ? 'active' : '' }}">
            <a href="/produk-admin" class="menu-link">
                <i class="menu-icon fa-solid fa-box-open"></i>
                <div>Produk</div>
            </a>
        </li>

        <!-- ==================== MANAJEMEN USER ==================== -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Manajemen User</span>
        </li>

        <li class="menu-item {{ request()->is('user') ? 'active' : '' }}">
            <a href="/user" class="menu-link">
                <i class="menu-icon fa-solid fa-user"></i>
                <div>Pengguna</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('setting-user') ? 'active' : '' }}">
            <a href="/setting-user" class="menu-link">
                <i class="menu-icon fa-solid fa-gear"></i>
                <div>Role & Akses</div>
            </a>
        </li>

    </ul>
</aside>
<!-- / Menu -->
