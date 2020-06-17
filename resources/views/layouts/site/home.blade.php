
@extends('layouts.site.main')

@section('css')
    <!-- style for owl carousel -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
@endsection

@section('content')


    <!-- Header -->
    @include("partials.site.header", ['services_title' => $services_title])

    <section class="who">
        <div class="container">
          <img class="who-img" src="{{asset('images/WHO.png')}}" alt="who ?">
          <img src="{{asset('images//hline.png')}}" alt="Horicantal line" class="hor-line" data-aos="fade-left" data-aos-duration="2000">
          <img src="{{asset('images/bgwho.png')}}" class="bg-who">
          <img src="{{asset('images/ellipse.png')}}" alt="ellipse" class="ellipse" data-aos="zoom-in" data-aos-duration="2000">
          <div class="who-descraption"  data-aos="fade-right" data-aos-duration="2000">
            <h2>@lang("site.home_who_are")<span class="company-name"> @lang("site.site_title")</span></h2>
            <p class="text-details">
                @lang("site.home_who_details")
            </p>
            <a href="{{url('/about')}}" class="main-btn read-more">
                @lang("site.home_who_read_more")
            </a>
          </div>
        </div>
      </section>

      <section class="what-we-do">
        <div class="container">
          <img src="{{asset('images/hline.png')}}" alt="Horicantal line" class="rev-hor-line">
          <img src="{{asset('images/WHAT.png')}}" class="bg-what">
          <div class="descraption"  data-aos="fade-right" data-aos-duration="2000">
            <h2>@lang("site.home_what_we") <span class="company-name">@lang("site.home_what_do")</span></h2>
          </div>
          <div class="features">
            <div class="row custom-row">
                @foreach ($services as $service)
                    <div class="col-md-3 col-sm-4 cust-col">
                    <div class="feature-box"  data-aos="fade-up" data-aos-duration="1000">
                        <div class="bg-feature">
                            <div class="cover-white">
                            <img src="{{$service->image_path_val}}" alt="{{$service->title}}">
                            </div>
                        </div>
                        <h6>{{$service->title}}</h6>
                        <p>{{$service->desc}}</p>
                    </div>
                    </div>
                @endforeach

            </div>
          </div>
        </div>
      </section>

      <section class="portfolio">
        <div class="container">
          <h1>@lang("site.home_porto_title")</h1>
          <p class="creative-text">@lang("site.home_porto_creative")<span>@lang("site.site_title")</span></p>
          <img class="lamp" src="{{asset('images/lamp.png')}}" alt="lamp">
          <div class="download-app">
            <h6>@lang("site.home_porto_agnecy")</h6>
            <p class="text-download">
              <span>@lang("site.home_porto_more")</span>
              <span>@lang("site.home_porto_app")</span>
            </p>
            <a href="#new-project">@lang("site.home_porto_download")</a>
          </div>
        </div>
      </section>

      <section class="latest-work">
        <img src="{{asset('images//hline.png')}}" alt="Horicantal line" class="hor-line"  data-aos="fade-left" data-aos-duration="2000">
        <img class="latest-img" src="{{asset('images/latest.png')}}" alt="latest">
        <h2  data-aos="fade-left" data-aos-duration="1500">@lang("site.home_our_last") <span>@lang("site.home_our_work")</span></h2>
        <div class="container">
          <div class="content">
            <div class="row">
            @if($lastWork != null)
                <div class="col-md-5 text-latest-work">
                    <section>
                            <div>
                                <h5>{{$lastWork->title}}</h5>
                                <p>{!!$lastWork->description!!}</p>
                            </div>

                    </section>
                </div>
                <div class="col-md-7">
                    <div class="owl-carousel owl-theme owl-works">
                        @foreach ($lastWork->images as $image)
                            <div class="item">
                            <img src="{{$image->image_path_val}}" alt="latest work">
                            </div>
                        @endforeach
                    </div>
                </div>
              @endif
            </div>
          </div>
        </div>
      </section>

      <section class="our-portfolio">
        <div class="portfolio-tabs">
          <img src="{{asset('images/hline.png')}}" alt="Horicantal line" class="rev-hor-line">
          <h2  data-aos="fade-right" data-aos-duration="2000">@lang("site.home_porto_our") <span>@lang("site.home_porto_portofolio")</span></h2>
          <div class="container">
            <img src="{{asset('images/THINK.png')}}" class="bg-think">
              <div class="title-tabs">

                  <div class="tab active" data-class=".all">
                          <span >@lang("site.home_porto_all")</span>
                  </div>
                    @foreach ($categories as $key => $category)
                        <div class="tab" data-class=".{{'cat_'.$category->id}}">
                            <span >{{$category->name}}</span>
                        </div>
                    @endforeach
              </div>
          </div>
        </div>
        <div class="portfolio-content row">
            @foreach ($portofolios as $portofolio)
                @foreach ($portofolio->images as $image)
                    @php
                        $catClass = "";
                        foreach ($portofolio->categories as $cat) {
                            $catClass .= " cat_" . $cat->id;
                        }
                    @endphp
                    <div class="{{$catClass}} all col-md-3">
                        <img src="{{$image->image_path_val}}" alt="Portofolio - {{$catClass}}">
                    </div>
                @endforeach
            @endforeach

        </div>
      </section>

      <section class="our-geeks">
        <div class="container">
          <h2  data-aos="fade-left" data-aos-duration="1500">@lang("site.home_geek_our") <span>@lang("site.home_geek_geeks")</span></h2>
          <img src="{{asset('images//hline.png')}}" alt="Horicantal line" class="hor-line"  data-aos="fade-left" data-aos-duration="2000">
          <img class="latest-img" src="{{asset('images/Geeks.png')}}" alt="Geeks">
          <div class="content">
            <div class="owl-carousel owl-theme owl-team">

                @foreach ($teams as $team)
                    <div class="item">
                        <div class="social-icons">
                            @if($team->instagram_url != null)
                                <a href="{{$team->instagram_url}}">
                                    <img src="{{asset('images/inst.png')}}" alt="instgram">
                                </a>
                            @endif
                            @if($team->facebook_url != null)
                                <a href="{{$team->facebook_url}}">
                                    <img src="{{asset('images/facebook.png')}}" alt="facebook">
                                </a>
                            @endif
                            @if($team->whatsapp_url != null)
                                <a href="{{$team->whatsapp_url}}">
                                    <img src="{{asset('images/whats.png')}}" alt="whats">
                                </a>
                            @endif
                            @if($team->twitter_url != null)
                                <a href="{{$team->twitter_url}}">
                                    <img src="{{asset('images/twiiter.png')}}" alt="twitter">
                                </a>
                            @endif

                            @if($team->instagram_url == null)
                                <a href="#" style="visibility: hidden;">
                                    <img src="{{asset('images/inst.png')}}" alt="facebook">
                                </a>
                            @endif
                            @if($team->facebook_url == null)
                                <a href="#" style="visibility: hidden;">
                                    <img src="{{asset('images/facebook.png')}}" alt="facebook">
                                </a>
                            @endif
                            @if($team->whatsapp_url == null)
                                <a href="#" style="visibility: hidden;">
                                    <img src="{{asset('images/whats.png')}}" alt="facebook">
                                </a>
                            @endif
                            @if($team->twitter_url == null)
                                <a href="#" style="visibility: hidden;">
                                    <img src="{{asset('images/twiiter.png')}}" alt="facebook">
                                </a>
                            @endif
                        </div>
                        <div class="card-item">
                            <img src="{{$team->image_path_val}}" alt="user">
                            <h5>{{$team->name}}</h5>
                            <h6>{{$team->job_title}}</h6>
                        </div>
                    </div>
                @endforeach
          </div>
          </div>
        </div>
      </section>

      <section class="client-said">
        <div class="row">

            <div class="col-md-12 client-said-box">
                <div class="customers">
                    <img src="./images/hline.png" alt="Horicantal line" class="rev-hor-line">
                    <h2  data-aos="fade-right" data-aos-duration="2000">@lang("site.home_our_client_said")</h2>
                    <div class="owl-carousel owl-theme owl-works">
                        @foreach ($reviews as $review)
                            <div class="item">
                                <div class="one-client">
                                    <div class="img-user">
                                        @if($review->url != null)
                                            <a href="{{$review->url}}" target="_blank" >
                                                <img src="{{asset($review->image_path_val)}}" alt="user">
                                            </a>
                                        @else
                                            <img src="{{asset($review->image_path_val)}}" alt="user">
                                        @endif
                                    </div>
                                    <div class="comment-user">
                                        {{$review->comment}}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
              </div>

            <div class="col-md-6 client-said-box">
                <img src="{{asset('images/newedit.png')}}" alt="send" class="send">
            </div>
            <div class="col-md-6 client-said-box">
                <div id="new-project" class="new-project">
                    <h3>@lang("site.contact_start_new_project")</h3>
                    <form action="{{url('/contact-us')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="contactName" id="textinput" placeholder="@lang('site.contact_name')" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="contactEmail" id="exampleInputEmail1" placeholder="@lang('site.contact_email')" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="contactMessage" id="exampleFormControlTextarea1" rows="3" placeholder="@lang('site.contact_message')" required></textarea>
                        </div>
                        <button type="submit">@lang("site.contact_btn")</button>
                    </form>
                </div>
            </div>


        </div>
      </section>
@endsection


@section('js')

    {{-- owl js--}}
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    {{-- owl last works--}}
    <script>
      $('.owl-works').owlCarousel({
        loop:true,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true ,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
      });
    </script>
      {{-- owl team --}}
    <script>
      $('.owl-team').owlCarousel({
        loop:false,
        rewind: true,
        margin:25,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true ,
        responsiveClass:true,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
      });
    </script>

    {{-- particle js --}}
    <script src="{{asset('js/particle.js')}}"></script>
    <script>
        particlesJS("particles-js",{
            "particles": {
                "number": {
                    "value": 100
                },
                "color": {
                    "value": "#fff"
                },
                "shape": {
                    "type": "star",
                    "stroke": {
                        "width": 3,
                        "color": "fff"
                    }
                },
                "opacity": {
                    "value": 0.7,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 1
                    }
                },
                "size": {
                    "value": 3,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 30
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 130,
                    "color": "#fff",
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 2,
                    "direction": "none",
                    "straight": false
                }
            },
            "interactivity": {
                "events": {
                    "onhover": {
                        "enable": false,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": false,
                        "mode": "push"
                    }
                },
                "modes": {
                    "repulse": {
                        "distance": 150,
                        "duration": 0.4
                    },
                    "bubble": {
                        "distance": 100,
                        "size": 10
                    }
                }
            }
        });
    </script>

@endsection
