<ul style="color: #fbf8f2;" class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

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

            <!-- Divider -->use Illuminate\Support\Facades\DB;
            <hr style="border-color: #ebedef;"  class="sidebar-divider my-3">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a style="color: black; font-weight-bolder;" class="nav-link" href="{{ route('admin.beranda') }}">
                    <i style="color: black;font-size: 15px;" class="fas fa-fw fa-tachometer-alt"></i>
                    <span style="color: black;font-size: 15px;">Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr style="border-color: #ebedef;" class="sidebar-divider my-3">

            <!-- Heading -->
            <div style="color: #858796; font-size: 15px;" class="sidebar-heading my-2">
                Fitur
            </div>

            <li class="nav-item dropdown">
                <a style="color: black;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i style="color: black;" class="fas fa-fw fa-chart-area"></i>
                    <span style="color: black;">Kelola Data</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a style="color: black;" class="dropdown-item" href="{{ route('admin.user') }}">User</a>
                    <a style="color: black;" class="dropdown-item" href="{{ route('kategori.index') }}">Kategori</a>
                    <a style="color: black;" class="dropdown-item" href="{{  route('produk.index')  }}">Produk</a>
                </div>
            </li>

            <li class="nav-item">
                <a style="color: black;" class="nav-link" href="{{ route('pesanan.index') }}">
                    <i style="color: black;" class="fas fa-fw fa-table"></i>
                    <span>Pesanan</span></a>
            </li>

            <!-- Divider -->
            <hr style="border-color: #ebedef;" class="sidebar-divider d-none d-md-block my-3">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline ext-dark">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <li class="nav-item pill-3">
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