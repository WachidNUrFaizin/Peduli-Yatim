<style>
    .main-header.navbar {
        background-color: #018844;
    }

    .main-header.navbar .nav-link,
    .main-header.navbar .form-control-navbar,
    .main-header.navbar .btn-navbar {
        color: #fff;
    }

    .main-header.navbar .dropdown-menu {
        background-color: #ffffff; /* Set dropdown background to white */
        color: #333; /* Default text color inside dropdown */
    }

    .main-header.navbar .dropdown-header {
        color: #333;
        border-bottom: 1px solid #eee; /* Light border for separation */
    }

    .main-header.navbar .dropdown-item {
        color: #333;
    }

    .main-header.navbar .dropdown-item:hover {
        background-color: #f7f7f7; /* Light grey hover background */
        color: #333;
    }

    .main-header.navbar .dropdown-divider {
        border-top-color: #eee; /* Light grey divider */
    }

    .main-header.navbar .navbar-badge {
        background-color: #ff0000; /* Keep the badge color red */
    }
</style>

<nav class="main-header navbar navbar-expand navbar-primary navbar-dark border-bottom-0">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-danger navbar-badge">{{ $countNotifikasi }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right overflow-hidden">
                <span class="dropdown-item dropdown-header">{{ $countNotifikasi }} Notifikasi</span>
                @foreach ($listNotifikasi as $key => $notifikasi)
                    @if ($notifikasi)
                        <div class="dropdown-divider"></div>
                        <a href="{{ route("$key.index") }}" class="dropdown-item">
                            <i class="fas
                    @switch($key)
                        @case('donatur') fa-user-plus text-warning @break
                        @case('subscriber') fa-user-plus text-secondary @break
                        @case('contact') fa-envelope text-info @break
                        @case('donation') fa-donate text-primary @break
                        @case('cashout') fa-hand-holding-usd text-success @break
                    @endswitch
                    mr-2"></i> {{ $notifikasi->$key }} {{ $key }} baru
                            <span class="text-muted text-sm d-block">{{ now()->parse($notifikasi->created_at)->diffForhumans() }}</span>
                        </a>
                    @endif
                @endforeach
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="document.querySelector('#form-logout').submit()">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </a>
            <form action="{{ route('logout') }}" method="post" id="form-logout">
                @csrf
            </form>
        </li>
    </ul>
</nav>
