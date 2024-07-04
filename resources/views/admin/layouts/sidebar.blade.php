<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset(auth()->user()->avatar) }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="#" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="features-activities.html" class="dropdown-item has-icon">
                    <i class="fas fa-bolt"></i> Activities
                </a>
                <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#"
                        onclick="event.preventDefault();
                    this.closest('form').submit();"
                        class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Inventaris</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ setSidebarActive(['dashboard']) }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fire"></i><span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Starter</li>

            @role('admin')
                <li class="dropdown {{ setSidebarActive(['lokasi.*', 'kategori.*', 'supplier.*']) }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-stream"></i>
                        <span>Master Data</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ setSidebarActive(['kategori.*']) }}"><a class="nav-link"
                                href="{{ route('kategori.index') }}">Kategori</a>
                        </li>
                        <li class="{{ setSidebarActive(['lokasi.*']) }}"><a class="nav-link"
                                href="{{ route('lokasi.index') }}">Lokasi</a>
                        </li>
                        <li class="{{ setSidebarActive(['supplier.*']) }}"><a class="nav-link"
                                href="{{ route('supplier.index') }}">Supplier</a>
                        </li>
                    </ul>
                </li>
            @endrole

            <li class="dropdown {{ setSidebarActive(['barang.*']) }}">
                <a class="nav-link" href="{{ route('barang.index') }}"><i class="fas fa-list"></i>
                    <span>Barang</span>
                </a>
            </li>

            @role('admin')
                <li class="dropdown {{ setSidebarActive(['barang-masuk.*']) }}">
                    <a class="nav-link" href="{{ route('barang-masuk.index') }}"><i class="fas fa-list"></i>
                        <span>Barang Masuk</span>
                    </a>
                </li>
            @endrole

            @role('admin')
                <li class="dropdown {{ setSidebarActive(['barang-keluar.*']) }}">
                    <a class="nav-link" href="{{ route('barang-keluar.index') }}"><i class="fas fa-list"></i>
                        <span>Barang Keluar</span>
                    </a>
                </li>
            @endrole

            @role('admin')
                <li class="dropdown {{ setSidebarActive(['peminjaman.*']) }}">
                    <a class="nav-link" href="{{ route('peminjaman.index') }}"><i class="fas fa-list"></i>
                        <span>Peminjaman</span>
                    </a>
                </li>
            @endrole

            @role('admin')
                <li class="dropdown {{ setSidebarActive(['riwayat-stok.*']) }}">
                    <a class="nav-link" href="{{ route('riwayat-stok.index') }}"><i class="fas fa-list"></i>
                        <span>Riwayat Stok</span>
                    </a>
                </li>
            @endrole

            <li class="{{ setSidebarActive(['admin.setting.index']) }}"><a class="nav-link" href="#"><i
                        class="fas fa-cogs"></i>
                    <span>Settings</span></a>
            </li>
        </ul>
        {{--  <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Layout</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
            </li>  --}}
        {{--  <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank
                        Page</span></a></li>  --}}

        </ul>
    </aside>
</div>
