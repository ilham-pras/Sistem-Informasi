<aside class="main-sidebar sidebar-dark-primary elevation-4 scrollbar-corner">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><strong>SCM 2</strong> Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Nama User -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('AdminLTE/dist/img/user2-150x150.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                <a href="#" class="d-block">Ilham Maulana P</a>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-header">MAIN</li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('data-supplier') }}"
                        class="nav-link {{ request()->is('supplier*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>Supplier</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('data-bahan') }}"
                        class="nav-link {{ request()->is('bahan-baku*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-dolly"></i>
                        <p>Bahan Baku</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('data-produksi') }}"
                        class="nav-link {{ request()->is('produksi*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>Produksi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('stok-produksi') }}"
                        class="nav-link {{ request()->is('stok-produksi*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>Stok Produksi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('biaya-produksi') }}"
                        class="nav-link {{ request()->is('biaya-produksi*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>Biaya Produksi</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('kategori-barang') }}"
                        class="nav-link {{ request()->is('kategori-barang*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Kategori Barang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('data-barang') }}"
                        class="nav-link {{ request()->is('barang*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>Barang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('stok-barang') }}"
                        class="nav-link {{ request()->is('stok-barang*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-pallet"></i>
                        <p>Stok Barang</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('data-gudang') }}"
                        class="nav-link {{ request()->is('gudang*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>Gudang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('data-outlet') }}"
                        class="nav-link {{ request()->is('outlet*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-store"></i>
                        <p>Outlet</p>
                    </a>
                </li>


                <li class="nav-header">USER</li>
                <li class="nav-item">
                    <a href="{{ route('data-pegawai') }}"
                        class="nav-link {{ request()->is('pegawai*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Pegawai</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tenaga-kerja') }}"
                        class="nav-link {{ request()->is('tenaga-kerja*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Tenaga Kerja</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user') }}" class="nav-link {{ request()->is('pengguna*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Pengguna</p>
                    </a>
                </li>


                <li class="nav-header">AUTH</li>
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Login</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Register</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="../forgot-password" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Forgot Password</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../recover-password" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Recover Password</p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
