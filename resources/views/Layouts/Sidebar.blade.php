<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="app-brand-logo demo">
                {{-- <img src="{{ asset('assets/assets/stmik.png') }}" alt="Logo" class="img-fluid" width="50" --}}
                height="50">
            </span>
            <span class="text-start app-brand-text fw-bold ms-2">
                <small>Filtering</small><br>
                <small>thrift</small><br>
                <small></small>
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- ==================== PENGATURAN AKUN ==================== -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Utama</span>
        </li>

        <!-- ==================== DATA MASTER ==================== -->
        <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon fa-solid fa-user-graduate"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('user') ? 'active' : '' }}">
            <a href="/user" class="menu-link">
                <i class="menu-icon fa-solid fa-user"></i>
                <div>Pengguna</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('toko') ? 'active' : '' }}">
            <a href="/toko" class="menu-link">
                <i class="menu-icon fa-solid fa-store"></i>
                <div>Toko</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('kategori') ? 'active' : '' }}">
            <a href="/kategori" class="menu-link">
                <i class="menu-icon fa-solid fa-award"></i>
                <div>Kategori</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('produk') ? 'active' : '' }}">
            <a href="/produk" class="menu-link">
                <i class="menu-icon fa-solid fa-box-open"></i>
                <div>Produk</div>
            </a>
        </li>


    </ul>
</aside>
<!-- / Menu -->
