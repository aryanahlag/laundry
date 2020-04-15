<!-- Navbar -->
<nav class="main-header navbar navbar-expand" style="background-image: linear-gradient(to right,#B2D7EB,#dcf419);">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a style="color: black;" class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-user">
                    @if(Auth::user()->role == 'admin')
                    {{ \App\Admin::where('user_id', Auth::user()->id)->first()->name }}
                    @elseif(Auth::user()->role == 'kasir')
                    {{ \App\Cashier::where('user_id', Auth::user()->id)->first()->name }}
                    @else
                    {{ \App\Owner::where('user_id', Auth::user()->id)->first()->name }}
                    @endif
                </i>
                {{-- <span class="badge badge-danger navbar-badge">3</span> --}}
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                {{-- <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                    <button type="submit" class="dropdown-item text-center"><i class="fa fa-sign-out-alt"></i> Logout</button>
                </form>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
    </ul>
</nav>
<!-- /.navbar -->
