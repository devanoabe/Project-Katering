<head>
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
</head>

<ul style="color: #fbf8f2; border: 1px solid #ebedef;" class="navbar-nav sidebar nav-pills flex-column">

            <!-- Sidebar - Brand -->
            <a style="color: black;" class="sidebar-brand d-flex flex-column align-items-center justify-content-center my-4" href="">
                <div class="sidebar-brand-icon rotate-n-15 mb-2 pt-4">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text">
                    <p style="  letter-spacing: -1px;
                                font-size: 20px;
                                font-weight-bold;">
                        Farhan Catering
                    </p>  
                </div>
            </a>

            <!-- Divider -->
            <hr style="border-color: #ebedef;"  class="sidebar-divider my-3">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item pill-1">
                <a style="color: black;" href="{{ route('admin.beranda') }}" class="nav-link {{ (request()->routeIs('admin.beranda') ? 'active' : '') }}">
                <i style="color: black;font-size: 15px;" class="fas fa-fw fa-tachometer-alt"></i>    
                <span style="color: black;font-size: 15px;">Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr style="border-color: #ebedef;" class="sidebar-divider my-3">

            <!-- Heading -->
            <div style="color: #858796; font-size: 15px;" class="sidebar-heading my-2">
                Main Menu
            </div>
            
            <li class="nav-item">
                <a style="color: black" class="nav-link collapsed text-truncate" href="#submenu1" data-toggle="collapse" data-target="#submenu1">
                    <i style="color: black;" class="fas fa-fw fa-chart-area"></i>
                    <span style="color: black;">Kelola Data</span>
                </a>
                    <div class="collapse" id="submenu1" aria-expanded="false">
                        <ul class="flex-column pl-2 nav">
                            <li class="nav-item">
                                <a style="font-size: 15px" class="dropdown-item" href="{{ route('admin.user') }}">
                                <i style="font-size: 7px; color: #4e73df; vertical-align: middle;" class="fa fa-circle pr-2" aria-hidden="true"></i>User</a>
                            </li>
                            <li class="nav-item">
                                <a style="font-size: 15px"class="dropdown-item" href="{{ route('kategori.index') }}">
                                <i style="font-size: 7px; color: #1cc88a; vertical-align: middle;" class="fa fa-circle pr-2" aria-hidden="true"></i>Kategori</a>
                            </li>
                            <li class="nav-item">
                                <a style="font-size: 15px" class="dropdown-item" href="{{  route('produk.index')  }}">
                                <i style="font-size: 7px; color: #36b9cc; vertical-align: middle;" class="fa fa-circle pr-2" aria-hidden="true"></i>Produk</a>
                            </li>
    
                        </ul>
                    </div>
                </li>
            <li class="nav-item pill-3">
                <a style="color: black;" href="{{ route('pesanan.index') }}" class="nav-link {{ (request()->routeIs('pesanan.index')? 'active' : '') }}">
                    <i style="color: black;" class="fas fa-fw fa-table"></i>
                    <span>Pesanan</span></a>
            </li>
            <li class="nav-item pill-3">
                <a style="color: black;" href="{{ route('laporan') }}" class="nav-link {{ (request()->routeIs('laporan')? 'active' : '') }}">
                    <i style="color: black" class="fa fa-print" aria-hidden="true"></i>
                    <span>Laporan</span></a>
            </li>

            <!-- Divider -->
            <hr style="border-color: #ebedef;" class="sidebar-divider d-none d-md-block my-3">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline ext-dark">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <li class="nav-item">
                    <a  style="color: #38373e; font-weight: bolder;" href="#" class="nav-link {{ (request()->routeIs('logout') ? 'active' : '') }}">
                        
                        <p style="color: black;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i style="color: black;" class="nav-icon fas fa-th"></i>  Logout
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            
                        </p>
                    </a>
            </li>

        </ul>