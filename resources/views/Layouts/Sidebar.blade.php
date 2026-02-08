<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/thrift.png') }}" alt="Logo" class="img-fluid" width="50"
                    height="50">
            </span>
            <span class="text-start app-brand-text fw-bold ms-2">
                <small>Filtering</small><br>
                <small>Thrift</small>
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">


        {{-- Tampilkan Toko hanya untuk Pembeli --}}
        @if(auth()->user()->role == 'penjual')
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Utama</span>
        </li>
        <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a href="/dashboard" class="menu-link">
                  <i class="menu-icon fa-solid fa-store"></i>
                <div>Toko</div>
            </a>
        </li>
        @endif

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data Master</span>
        </li>
        @if(auth()->user()->role == 'super-admin')
        {{-- Kategori bisa dilihat oleh semua (Admin & penjual) atau sesuaikan kebutuhan --}}
        <li class="menu-item {{ request()->is('kategori') ? 'active' : '' }}">
            <a href="/kategori" class="menu-link">
                <i class="menu-icon fa-solid fa-tags"></i>
                <div>Kategori</div>
            </a>
        </li>
        @endif
        {{-- Produk dan Transaksi hanya untuk penjual --}}
        @if(auth()->user()->role == 'penjual')
        <li class="menu-item {{ request()->is('produk-admin') ? 'active' : '' }}">
            <a href="/produk-admin" class="menu-link">
                <i class="menu-icon fa-solid fa-box-open"></i>
                <div>Produk</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('transaksi-admin') ? 'active' : '' }}">
            <a href="/transaksi-admin" class="menu-link">
                <i class="menu-icon fa-solid fa-box-open"></i>
                <div>Transaksi</div>
            </a>
        </li>
        @endif

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Manajemen User</span>
        </li>

        {{-- Manajemen User, Role & Akses hanya untuk Super Admin --}}
            @if(auth()->user()->role == 'super-admin' )
        <li class="menu-item {{ request()->is('user') ? 'active' : '' }}">
            <a href="/user" class="menu-link">
                <i class="menu-icon fa-solid fa-user"></i>
                <div>Pengguna</div>
            </a>
        </li>

        @endif
    @if(auth()->user()->role == 'super-admin' || auth()->user()->role == 'penjual')

        <li class="menu-item {{ request()->is('setting-user') ? 'active' : '' }}">
            <a href="/setting-user" class="menu-link">
                <i class="menu-icon fa-solid fa-gear"></i>
                <div>Role & Akses</div>
            </a>
        </li>
        @endif

    </ul>
</aside>
