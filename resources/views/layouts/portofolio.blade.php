@extends('layouts.main')

@section('content')
    <!-- Nav Bar-->
    @include("partials.nav-bar", ["home" => 0, "about" => 0, "pricing" => 0, "services" => 0, "proto" => 1, "blog" => 0, "contact" => 0])


    <div class="navigation">
        <div class="container">
          <img src="{{asset('images/hline.png')}}" alt="Horicantal line" class="rev-hor-line">
          <img src="{{asset('images/PORYOFOLIO.png')}}" class="bg-think portofolio-bg" data-aos="fade-right" data-aos-duration="2000">
            <section class="content">
                <h3 data-aos="fade-left" data-aos-duration="2000">our portofolio</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">our portofolio</li>
                    </ol>
                </nav>
            </section>
        </div>
    </div>

    <section class="our-portfolio main-portfolio">
      <div class="portfolio-tabs">
        <div class="container">
          <img src="{{asset('images/THINK.png')}}" class="bg-think">
            <div class="title-tabs">
                <div class="tab active" data-class=".all">
                     <span >All</span>
                </div>
                <div class="tab" data-class=".website">
                    <span >website</span>
                </div>
                <div class="tab" data-class=".mobile-app">
                    <span >mobile app</span>
                </div>
                <div class="tab" data-class=".ui-ux">
                    <span>ui/ux</span>
                </div>
                <div class="tab" data-class=".motion">
                  <span>motion graphics</span>
                </div>
            </div>
        </div>
      </div>
      <div class="portfolio-content row">
        <div class="website all col-md-4">
          <img src="{{asset('images/webone.png')}}" alt="website">
        </div>
        <div class="website all col-md-4">
          <img src="{{asset('images/webtwo.png')}}" alt="website">
        </div>
        <div class="mobile-app all col-md-4">
          <img src="{{asset('images/webthree.png')}}" alt="mobile-app">
        </div>
        <div class="ui-ux all col-md-4">
          <img src="{{asset('images/webfour.png')}}" alt="ui-ux">
        </div>
        <div class="motion all col-md-4">
          <img src="{{asset('images/webfive.png')}}" alt="motion">
        </div>
        <div class="motion all col-md-4">
          <img src="{{asset('images/webosix.png')}}" alt="motion">
        </div>
        <div class="website all col-md-4">
          <img src="{{asset('images/webone.png')}}" alt="website">
        </div>
        <div class="website all col-md-4">
          <img src="{{asset('images/webtwo.png')}}" alt="website">
        </div>
        <div class="mobile-app all col-md-4">
          <img src="{{asset('images/webthree.png')}}" alt="mobile-app">
        </div>
        <div class="ui-ux all col-md-4">
          <img src="{{asset('images/webfour.png')}}" alt="ui-ux">
        </div>
        <div class="motion all col-md-4">
          <img src="{{asset('images/webfive.png')}}" alt="motion">
        </div>
        <div class="motion all col-md-4">
          <img src="{{asset('images/webosix.png')}}" alt="motion">
        </div>
      </div>
    </section>
@endsection
