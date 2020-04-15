<aside style="background-image: linear-gradient(#B2D7EB,#dcf419);" class="main-sidebar">
    <!-- Brand Logo -->
    <a style="color:black;" href="" class="brand-link">
    <img src="{{ asset('img/rocket.png') }}" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">Rocket Laundry</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       {{-- with font-awesome or any other icon font library --> --}}
                @if (!Auth::guest())
                    @if (Auth::user()->role == 'admin')
                        <li class="nav-item {{ $activePage == 'Dashboard' ? ' active' : '' }}">
                            <a style="color: black;" href="" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview menu-open {{ $activePage == 'Transaksi' ? ' active' : '' }}">
                            <a style="color: black;" href="" class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>
                                    Menu Transaksi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a style="color: black;" href="{{ route('admin.transaksi.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Form Kasir</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a style="color: black;" href="{{ route('admin.transaksi.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Riwayat transaksi</p>
                                    </a>
                                </li>
                              </ul>
                        </li>
                        <li class="nav-item {{ $activePage == 'member' ? ' active' : '' }}">
                        <a style="color: black;" href="{{ route('admin.member.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                    Member
                                </p>
                            </a>
                        </li>
                        <li class="nav-item {{ $activePage == 'Jenis' ? ' active' : '' }}">
                        <a style="color: black;" href="{{ route('admin.jenis.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-business-time"></i>
                                <p>
                                    Jenis
                                </p>
                            </a>
                        </li>
                        <li class="nav-item {{ $activePage == 'Akun Pengguna' ? ' active' : '' }}">
                        <a style="color: black;" href="{{ route('admin.account') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-circle"></i>
                                <p>
                                    Akun Pengguna
                                </p>
                            </a>
                        </li>
                        <li class="nav-item {{ $activePage == 'Outlet' ? ' active' : '' }}">
                        <a style="color: black;" href="{{ route('admin.outlet.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-store"></i>
                                <p>
                                    Outlet
                                </p>
                            </a>
                        </li>
                        <li class="nav-item {{ $activePage == 'Package' ? ' active' : '' }}">
                        <a style="color: black;" href="{{ route('admin.paket.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                    Paket
                                </p>
                            </a>
                        </li>
                        <li class="nav-item {{ $activePage == 'Package' ? ' active' : '' }}">
                        <a style="color: black;" href="" class="nav-link">
                                <i class="nav-icon fas fa-print"></i>
                                <p>
                                    Laporan
                                </p>
                            </a>
                        </li>
                    @elseif (Auth::user()->role == 'kasir')
                    <li class="nav-item {{ $activePage == 'Dashboard' ? ' active' : '' }}">
                        <a style="color: black;" href="" class="nav-link ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview menu-open {{ $activePage == 'Transaksi' ? ' active' : '' }}">
                        <a style="color: black;" href="" class="nav-link a">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>
                                Menu Transaksi
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a style="color: black;" href="" class="nav-link a">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Form Kasir</p>
                                </a>
                            </li>
                          </ul>
                    </li>
                    <li class="nav-item {{ $activePage == 'Laporan' ? ' active' : '' }}">
                        <a style="color: black;" href="" class="nav-link ">
                            <i class="nav-icon fas fa-print"></i>
                            <p>
                                Laporan
                            </p>
                        </a>
                    </li>
                    @elseif(Auth::user()->role == 'owner')
                    <li class="nav-item {{ $activePage == 'Dashboard' ? ' active' : '' }}">
                        <a style="color: black;" href="" class="nav-link ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item {{ $activePage == 'Laporan' ? ' active' : '' }}">
                        <a style="color: black;" href="" class="nav-link ">
                            <i class="nav-icon fas fa-print"></i>
                            <p>
                                Laporan
                            </p>
                        </a>
                    </li>
                    @endif
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
