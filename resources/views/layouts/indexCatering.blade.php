<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Farhan Catering</title>
  <link rel="icon" href="{{ asset('assets/img/logo-fh.png') }}">
  <meta content="" name="description">
  <meta content="" name="keywords">
  <script src="https://kit.fontawesome.com/4664a9073d.js" crossorigin="anonymous"></script>

  <!-- Favicons -->
  <link href="{{asset('assets/template-user/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/template-user/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/template-user/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/template-user/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/template-user/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/template-user/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/template-user/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/template-user/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/template-user/assets/css/style.css')}}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('qq/js/jquery.min.js') }}"></script>
  <script src="{{ asset('qq/js/bootstrap.min.js') }}"></script>
    @include('layouts.headerCatering')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @yield('content')

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <script src="{{asset('assets/template-user/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/template-user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/template-user/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/template-user/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/template-user/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/template-user/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/template-user/assets/js/main.js')}}"></script>
</body>
</html>