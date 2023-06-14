  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

          <!-- <h1 class="logo me-auto me-lg-0"><a href=>Farhan Catering</a></h1> -->
          <!-- Uncomment below if you prefer to use an image logo -->
          <a href="{{ route('home.welcome') }}" class="logo me-auto me-lg-0">
              <img style="width: 180px; height: auto" src="{{ asset('assets/img/logo.png') }}" alt="Logo">
          </a>



          <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link" href="{{ route('home.welcome') }}">Home</a></li>
            </ul>
            <ul>
                <li><a class="nav-link" href="{{ route('home.catering') }}">Catering</a></li>
            </ul>
            <ul>
                <li><a class="nav-link" href="{{ route('home.status') }}">Pesanan</a></li>
            </ul>
            <ul>
                <li><a class="nav-link" href="{{ route('home.riwayat') }}">Riwayat</a></li>
            </ul>

            <!-- <script>
                function checkLogin(event) {
                event.preventDefault(); // Menghentikan perilaku default dari tautan

                // Cek apakah pengguna sudah login atau belum
                var isLoggedIn = checkUserLoggedIn(); // Fungsi ini harus didefinisikan sesuai dengan kebutuhan Anda

                if (isLoggedIn) {
                    // Jika pengguna sudah login, maka arahkan ke halaman yang ditautkan
                    window.location.href = event.target.href;
                } else {
                    // Jika pengguna belum login, tampilkan pop-up atau arahkan ke halaman login
                    alert("Anda harus login dahulu!");
                    // Atau, Anda dapat mengarahkan pengguna ke halaman login dengan menggunakan:
                    window.location.href = "/login";
                }
                }

                function checkUserLoggedIn() {
                // Fungsi ini harus mengembalikan nilai true atau false
                // Berdasarkan apakah pengguna sudah login atau belum
                // Anda perlu mengimplementasikan logika ini sesuai dengan kebutuhan Anda
                // Misalnya, Anda dapat memeriksa apakah ada token otentikasi yang valid tersimpan di lokal storage
                // atau apakah sesi login aktif pada server, dll.
                // Contoh sederhana:
                var isLoggedIn = localStorage.getItem('isLoggedIn'); // Anda perlu mengatur nilai ini saat pengguna berhasil login

                return isLoggedIn === 'true';
                }
            </script> -->

            <i class="bi bi-list mobile-nav-toggle"></i>

          </nav><!-- .navbar -->
          <!-- <a href="#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex">Book a table</a> -->
          <ul class="navbar-nav ms-auto">
              <!-- Authentication Links -->
              @guest
              @if (Route::has('login'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @endif

              @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
              @endif
              @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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