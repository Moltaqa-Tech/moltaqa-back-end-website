@extends('layouts.site.main')

@section('css')
    <!-- style for owl carousel -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
@endsection

@section('content')
    <!-- Nav Bar-->
    {{-- @include("partials.site.nav-bar") --}}

    <!-- Header -->
    @include("partials.site.header")

    <section class="who">
        <div class="container">
          <img class="who-img" src="{{asset('images/WHO.png')}}" alt="who ?">
          <img src="{{asset('images//hline.png')}}" alt="Horicantal line" class="hor-line" data-aos="fade-left" data-aos-duration="2000">
          <img src="{{asset('images/bgwho.png')}}" class="bg-who">
          <img src="{{asset('images/ellipse.png')}}" alt="ellipse" class="ellipse" data-aos="zoom-in" data-aos-duration="2000">
          <div class="who-descraption"  data-aos="fade-right" data-aos-duration="2000">
            <h2>Who are <span class="company-name">Moltaqa Tech</span></h2>
            <p class="text-details">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos soluta itaque nam repellendus animi ratione dolores optio. Necessitatibus sapiente itaque placeat corporis possimus nulla odio amet, consectetur, perferendis iusto dignissimos?
            </p>
            <a href="#" class="main-btn read-more">
              read more
            </a>
          </div>
        </div>
      </section>

      <section class="what-we-do">
        <div class="container">
          <img src="{{asset('images/hline.png')}}" alt="Horicantal line" class="rev-hor-line">
          <img src="{{asset('images/WHAT.png')}}" class="bg-what">
          <div class="descraption"  data-aos="fade-right" data-aos-duration="2000">
            <h2>What WE <span class="company-name">DO</span></h2>
          </div>
          <div class="features">
            <div class="row custom-row">
                @foreach ($services as $service)
                    <div class="col-md-3 col-sm-4 cust-col">
                    <div class="feature-box"  data-aos="fade-up" data-aos-duration="1000">
                        <div class="bg-feature">
                            <div class="cover-white">
                            <img src="{{asset($service->image_path)}}" alt="{{$service->title}}">
                            </div>
                        </div>
                        <h6>{{$service->title}}</h6>
                        <p>{{$service->desc}}</p>
                    </div>
                    </div>
                @endforeach
              {{-- <div class="col-md-3 col-sm-4 cust-col">
                <div class="feature-box"  data-aos="fade-up" data-aos-duration="1500">
                  <div class="bg-feature">
                    <div class="cover-white">
                      <img src="{{asset('images/ux.png')}}" alt="UI/UX Desgin">
                    </div>
                  </div>
                  <h6>UI/UX Desgin</h6>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              </div>
              </div>
              <div class="col-md-3 col-sm-4 cust-col">
                <div class="feature-box"  data-aos="fade-up" data-aos-duration="2000">
                    <div class="bg-feature">
                      <div class="cover-white">
                        <img src="{{asset('images/platform.png')}}" alt="Web Desgin">
                      </div>
                    </div>
                    <h6>Web Desgin</h6>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-4 cust-col">
                <div class="feature-box"  data-aos="fade-up" data-aos-duration="2500">
                        <div class="bg-feature">
                        <div class="cover-white">
                            <img src="{{asset('images/data.png')}}" alt="Web Devolpment">
                    <div class="col-md-3 col-sm-4 cust-col">
                        </div>
                        </div>
                        <h6>Web Devolpment</h6>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-4 cust-col">
                <div class="feature-box"  data-aos="fade-up" data-aos-duration="1000">
                    <div class="bg-feature">
                      <div class="cover-white">
                        <img src="{{asset('images/hosting.png')}}" alt="Hosting">
                      </div>
                    </div>
                    <h6>Hosting</h6>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-4 cust-col">
                <div class="feature-box"  data-aos="fade-up" data-aos-duration="1500">
                    <div class="bg-feature">
                      <div class="cover-white">
                        <img src="{{asset('images/digital-marketing.png')}}" alt="Digital Marketing">
                      </div>
                    </div>
                    <h6>Digital Marketing</h6>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-4 cust-col">
                <div class="feature-box"  data-aos="fade-left" data-aos-duration="2000">
                    <div class="bg-feature">
                      <div class="cover-white">
                        <img src="{{asset('images/video.png')}}" alt="Courses">
                      </div>
                    </div>
                    <h6>Courses</h6>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-4 cust-col">
                <div class="feature-box"  data-aos="fade-up" data-aos-duration="2500">
                    <div class="bg-feature">
                      <div class="cover-white">
                        <img src="{{asset('images/graphic.png')}}" alt="Seo">
                      </div>
                    </div>
                    <h6>Seo</h6>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
      </section>

      <section class="portfolio">
        <div class="container">
          <h1>unique lourny</h1>
          <p class="creative-text">creative in every thing with <span>Moltaqa Tech</span></p>
          <img class="lamp" src="{{asset('images/lamp.png')}}" alt="lamp">
          <div class="download-app">
            <h6>Moltaqa Tech creative agency</h6>
            <p class="text-download">
              <span>more than</span>
              <span>mobile app</span>
            </p>
            <a href="#">Download Now</a>
          </div>
        </div>
      </section>

      <section class="latest-work">
        <img src="{{asset('images//hline.png')}}" alt="Horicantal line" class="hor-line"  data-aos="fade-left" data-aos-duration="2000">
        <img class="latest-img" src="{{asset('images/latest.png')}}" alt="latest">
        <h2  data-aos="fade-left" data-aos-duration="1500">our latest <span>work</span></h2>
        <div class="container">
          <div class="content">
            <div class="row">
              <div class="col-md-5 text-latest-work">
                <section>
                  <div>
                    <h5>{{$lastWork->title}}</h5>
                    <p>{{$lastWork->description}}</p>
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
            </div>
          </div>
        </div>
      </section>

      <section class="our-portfolio">
        <div class="portfolio-tabs">
          <img src="{{asset('images/hline.png')}}" alt="Horicantal line" class="rev-hor-line">
          <h2  data-aos="fade-right" data-aos-duration="2000">our <span>Portofolio</span></h2>
          <div class="container">
            <img src="{{asset('images/THINK.png')}}" class="bg-think">
              <div class="title-tabs">
                    @foreach ($categories as $key => $category)
                        <div class="tab {{($key == 0) ? 'active': ''}}" data-class=".{{($category->id == $categoryAllId) ? 'all' : 'cat_'.$category->id}}">
                                <span >{{$category->name}}</span>
                        </div>
                    @endforeach
              </div>
          </div>
        </div>
        <div class="portfolio-content row">
            @foreach ($portofolios as $portofolio)
                @foreach ($portofolio->images as $image)
                    <div class="cat_{{$portofolio->category_id}} all col-md-4">
                        <img src="{{$image->image_path_val}}" alt="Portofolio - {{$portofolio->category_id}}">
                    </div>
                @endforeach
            @endforeach

        </div>
      </section>

      <section class="our-geeks">
        <div class="container">
          <h2  data-aos="fade-left" data-aos-duration="1500">our <span>Geeks</span></h2>
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
                        </div>
                    </div>
                @endforeach
          </div>
          </div>
        </div>
      </section>

      <section class="client-said">
        <div class="row">
          <div class="col-md-5 client-said-box">
            <div class="arrow-said">
              <img src="{{asset('images/li.png')}}" alt="line" class="line">
              <img src="{{asset('images/SAID.png')}}" alt="said" class="said">
              <img src="{{asset('images/symbol.png')}}" alt="symbol" class="symbol">
              <div>
                <span>our clients</span>
                <span>said</span>
              </div>
            </div>
          </div>
          <div class="col-md-7 client-said-box">
            <div class="customers">
              <div class="owl-carousel owl-theme owl-works">
                <div class="item">
                  <div class="one-client">
                    <div class="img-user">
                      <img src="{{asset('images/05.jpg')}}" alt="user">
                    </div>
                    <div class="comment-user">
                      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem modi hic facilis sed amet assumenda, eum molestias porro aliquam voluptas sit deleniti .
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="one-client">
                    <div class="img-user">
                      <img src="{{asset('images/05.jpg')}}" alt="user">
                    </div>
                    <div class="comment-user">
                      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem modi hic facilis sed amet assumenda, eum molestias porro aliquam voluptas sit deleniti .
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="one-client">
                    <div class="img-user">
                      <img src="{{asset('images/05.jpg')}}" alt="user">
                    </div>
                    <div class="comment-user">
                      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem modi hic facilis sed amet assumenda, eum molestias porro aliquam voluptas sit deleniti .
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="one-client">
                    <div class="img-user">
                      <img src="{{asset('images/05.jpg')}}" alt="user">
                    </div>
                    <div class="comment-user">
                      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem modi hic facilis sed amet assumenda, eum molestias porro aliquam voluptas sit deleniti .
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="one-client">
                    <div class="img-user">
                      <img src="{{asset('images/05.jpg')}}" alt="user">
                    </div>
                    <div class="comment-user">
                      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem modi hic facilis sed amet assumenda, eum molestias porro aliquam voluptas sit deleniti .
                    </div>
                  </div>
                </div>
            </div>
            </div>
          </div>
          <div class="col-md-6 client-said-box">
            <img src="{{asset('images/send.png')}}" alt="send" class="send">
          </div>
          <div class="col-md-6 client-said-box">
            <div class="new-project">
              <h3>Let's start a new project together!</h3>
              <form action="{{url('/contact-us')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="contactName" id="textinput" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="contactEmail" id="exampleInputEmail1" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="contactMessage" id="exampleFormControlTextarea1" rows="3" placeholder="Message" required></textarea>
                </div>
                <button type="submit">Submit Message</button>
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
        loop:true,
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
