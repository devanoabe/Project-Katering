@extends('layouts.indexCatering')
<!DOCTYPE html>
<html lang="en">

@section('content')

<body>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Selamat Datang di <span>Farhan Catering</span></h1>
          <h2>Menyediakan berbagai paket makanan</h2>

          <div class="btns">
            <a href="{{ route('home.catering')}}" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
          </div>
        </div>
        <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in" data-aos-delay="200">
          <a href="https://www.youtube.com/watch?v=GlrxcuEDyF8" class="glightbox play-btn"></a>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

<!-- ======= About Section ======= -->
<section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="assets/img/about.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Farhan Catering adalah penyedia layanan katering yang diakui dengan reputasi yang solid.</h3>
            <p class="fst-italic">
              Prinsip utama kami mementingkan kepuasan pelanggan dan siap untuk menyesuaikan menu dan layanan sesuai dengan kebutuhan Anda.
            Prinsip utama kami mementingkan kepuasan pelanggan dan siap untuk menyesuaikan menu dan layanan sesuai dengan kebutuhan Anda.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Kami Menyajikan makanan dengan bahan berkualitas tinggi</li>
              <li><i class="bi bi-check-circle"></i> Kami memiliki pengalaman luas dalam mengelola acara Anda</li>
              <li><i class="bi bi-check-circle"></i> Kami berkomitmen untuk memberikan pelayanan yang paling baik untuk kepuasan pelanggan</li>
            </ul>
            <p>

              Jika Anda mencari pilihan yang handal untuk katering acara Anda, Farhan Catering adalah pilihan yang tepat.
            Jika Anda mencari pilihan yang handal untuk katering acara Anda, Farhan Catering adalah pilihan yang tepat.
            </p>
          </div>
        </div>
        

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Why Us</h2>
          <p>Mengapa Harus Memilih Kami?</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span>01</span>
              <h4>Kualitas Makanan Tinggi</h4>
              <p> Farhan Catering menyajikan makanan dengan kualitas yang tinggi,
              <p> Farhan Catering menyajikan makanan dengan kualitas yang tinggi, 
                menggunakan bahan segar dan berkualitas untuk menciptakan hidangan yang lezat dan bernutrisi.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="200">
              <span>02</span>
              <h4>Keahlian dalam Mengelola Acara</h4>
              <p>Tim Farhan Catering memiliki pengalaman dalam mengelola acara, mulai dari pernikahan hingga acara
              <p>Tim Farhan Catering memiliki pengalaman dalam mengelola acara, mulai dari pernikahan hingga acara 
                korporat, dan dapat menyediakan layanan katering yang sesuai dengan preferensi Anda.
              </p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span>03</span>
              <h4>Fleksibilitas</h4>
              <p>Farhan Catering siap untuk menyesuaikan menu dan layanan sesuai dengan kebutuhan Anda, memberikan fleksibilitas yang
              <p>Farhan Catering siap untuk menyesuaikan menu dan layanan sesuai dengan kebutuhan Anda, memberikan fleksibilitas yang 
                tinggi, dan bertujuan untuk memastikan kepuasan pelanggan.
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->


    <!-- ======= Menu Section ======= -->


    <!-- ======= Specials Section ======= -->
    <!-- End Specials Section -->

    <!-- ======= Events Section ======= -->

    <!-- ======= Book A Table Section ======= -->
    <!-- End Book A Table Section -->

    <!-- ======= Testimonials Section ======= -->
    <!-- End Testimonials Section -->

    <!-- ======= Gallery Section ======= -->
    <!-- End Gallery Section -->

    <!-- ======= Chefs Section ======= -->
    <!-- End Chefs Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
          <a style="color: #989898; padding-top: 30px;" href="https://goo.gl/maps/9THd5Q2b6T6Ze4yz9">Tampilkan di Peta</a>
        </div>
      </div>

      <div data-aos="fade-up">
        <!-- elemen untuk menampilkan peta -->
        <div id="map" style="width: 100%; height:400px;"></div>

        <script>
          function initMap() {
            // Membuat objek untuk titik koordinat
            var malang = {
              lat: -7.97065104295767,
              lng: 112.6490732466264
            };

            // Membuat objek peta
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 9,
              center: malang
            });

            var contentString = '<h2 style="color: black; font-size: 18px; font-family: Open Sans;">Farhan Katering</h2>';

            var infowindow = new google.maps.InfoWindow({
              position: malang,
              content: contentString,
            });

            var marker = new google.maps.Marker({
              position: new google.maps.LatLng(-7.97065104295767, 112.6490732466264),
              map: map
            });

            // Menampilkan info window pada peta
            infowindow.open(map, marker);
          }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script>
      </div>

      <div class="container" data-aos="fade-up">

        <div style="text-align: center; margin-top: 80px" class="row">
          <div class="address col-lg-4">
            <i style="margin-bottom: 20px" class="bi bi-geo-alt"></i>
            <h4>Open Hours:</h4>
            <p>Monday-Saturday:<br>08:00 AM - 05:00 PM</p>
          </div>
          <div class="open-hours col-lg-4">
            <i class="bi bi-clock"></i>
            <h4>Location:</h4>
            <p>KOST FARIDA, Jl. Warinoi III No.10, Bunulrejo, Kec. Blimbing, Kota Malang, Jawa Timur 65123, Indonesia</p>
          </div>
          <div class="phone col-lg-4">
            <i class="bi bi-phone"></i>
            <h4>Call:</h4>
            <p>0858-0046-0598</p>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Restaurantly</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>
@endsection

</html>