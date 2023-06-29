  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

          <!-- <h1 class="logo me-auto me-lg-0"><a href=>Farhan Catering</a></h1> -->
          <!-- Uncomment below if you prefer to use an image logo -->
          <a href="{{ route('home.welcome') }}" class="logo">
              <img style="width: 120px; height: auto" src="{{ asset('assets/img/logo.png') }}" alt="Logo">
          </a>


            <nav id="navbar" class="navbar order-last order-lg-0">
                <i class="bi bi-list mobile-nav-toggle"></i>
                <ul>
                    <li><a class="nav-link" href="{{ route('home.welcome') }}">Home</a></li>
                    <li><a class="nav-link" href="{{ route('home.catering') }}">Catering</a></li>
                    @guest
                    @if (Route::has('login'))
                    <li><a class="nav-link" href="{{ route('login') }}">Pesanan</a></li>
                    <li><a class="nav-link" href="{{ route('login') }}">Riwayat</a></li>
                    @endif
                    @else
                    <li><a class="nav-link" href="{{ route('home.status') }}">Pesanan</a></li>
                    <li><a class="nav-link" href="{{ route('home.riwayat') }}">Riwayat</a></li>
                    @endguest
                </ul>
            </nav>

          <!-- <a href="#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex">Book a table</a> -->
          <ul class="navbar-nav ms-auto">
              <!-- Authentication Links -->
              @guest
              @if (Route::has('login'))
              <li class="nav-item">
                  <a style="margin-right: 15px" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @endif

              @else
              <li class="nav-item dropdown">
                  <a style="margin-right: 15px" id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }}
                  </a>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
              </li>
              @endguest
          </ul>
      </div>
  </header>