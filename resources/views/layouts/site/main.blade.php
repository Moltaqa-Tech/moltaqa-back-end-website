<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no , user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Moltaqa Tech</title>
    <link rel="shortcut icon" href="{{asset('images/logo.png')}}" type="image/x-icon">
    <!-- Main Icons -->
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
    <!-- Main Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
    @yield("css")
    <!-- Main Style -->
    <link rel="stylesheet" href="{{asset('css/hovers.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body data-aos-easing="ease-in-out-back" data-aos-duration="1200" data-aos-delay="0">

    <!-- Side Menu-->
    @include("partials.site.side-menu")
    <!-- Start Header -->
    {{-- @include('partials.site.header') --}}
    <!-- End Header -->


    @yield('content')

    <footer>
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6 side-footer">
            <img src="{{asset('images/logos.png')}}" alt="logo" class="logo">
            <p class="descraption">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam aspernatur odit amet .
            </p>
            <div class="socail-icons">
              <a href="#"><img src="{{asset('images/f.png')}}" alt="facebook"></a>
              <a href="#"><img src="{{asset('images/i.png')}}" alt="instgram"></a>
              <a href="#"><img src="{{asset('images/w.png')}}" alt="whats"></a>
              <a href="#"><img src="{{asset('images/t.png')}}" alt="twitter"></a>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 side-footer">
            <h5>Contact us</h5>
            <ul class="list-unstyled">
              <li>
                <i class="fas fa-map-marker-alt"></i>
                <span>My Streat , Kingston , Mansoura</span>
              </li>
              <li>
                <i class="fas fa-phone-volume"></i>
                <a href="tel:+6494461709">000 000 000 00</a>
                <a class="block-a" href="tel:+6494461709">111 111 111 11</a>
              </li>
              <li>
                <i class="far fa-envelope"></i>
                <a href="mailto:webmaster@example.com">webmaster@example.com</a>
              </li>
            </ul>
          </div>
          <div class="col-md-3 col-sm-6 side-footer">
            <h5>facebook blogin</h5>
            <div class="facebook-footer">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga maxime animi assumenda error.</p>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga maxime animi assumenda error.</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 side-footer">
            <h5>gallery</h5>
            <div class="footer-gallery">
              <img src="{{asset('images/carsoul.png')}}" alt="gallery">
            </div>
          </div>
        </div>
        <div class="bottom-footer">
          desgined by eman mosa
        </div>
      </div>
    </footer>

    <!-- Start Scripts -->
    <!-- Main plugins -->
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/aos.js')}}"></script>
    <script>
      AOS.init();
    </script>

    @yield('js')

    <script src="{{asset('js/main.js')}}"></script>
    <!-- End Scripts -->
</body>
</html>
