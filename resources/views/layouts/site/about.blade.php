@extends('layouts.site.main')

@section('css')
    <!-- style for owl carousel -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
@endsection

@section('content')
    <!-- Nav Bar-->
    @include("partials.site.nav-bar", ["home" => 0, "about" => 1, "pricing" => 0, "services" => 0, "proto" => 0, "blog" => 0, "contact" => 0])


    <div class="navigation">
        <div class="container">
        <img src="{{asset('images/hline.png')}}" alt="Horicantal line" class="rev-hor-line" >
        <img src="{{asset('images/WORK.png')}}" class="bg-think" data-aos="fade-right" data-aos-duration="2000">
            <section class="content">
                <h3 data-aos="fade-left" data-aos-duration="2000">about us</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About</li>
                    </ol>
                </nav>
            </section>
        </div>
    </div>

    <div class="words-about-us">
        <div class="container">
            <h3>
                a few words about us
            </h3>
            <div class="row custom-row">
                <div class="col-md-4">
                    <h5>who we are ?</h5>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet nulla quaerat ab praesentium!</p>
                    <p>Nam quas distinctio tempora, itaque quae laudantium illo ipsam iusto. Fugiat eos enim itaque. Eos, maxime amet!</p>
                </div>
                <div class="col-md-4">
                    <h5>what we do ?</h5>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet nulla quaerat ab praesentium!</p>
                    <p>Nam quas distinctio tempora, itaque quae laudantium illo ipsam iusto. Fugiat eos enim itaque. Eos, maxime amet!</p>
                </div>
                <div class="col-md-4">
                    <h5>why we do it ?</h5>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet nulla quaerat ab praesentium!</p>
                    <p>Nam quas distinctio tempora, itaque quae laudantium illo ipsam iusto. Fugiat eos enim itaque. Eos, maxime amet!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="discover">
        <div class="container">
            <img src="{{asset('images/newline.png')}}" alt="about line" class="about-line" data-aos="fade-up" data-aos-duration="2000">
            <section class="content">
                <h3 data-aos="fade-down" data-aos-duration="2000">discover all about <span>Moltaqa Tech</span></h3>
            </section>
            <section class="play-video">
                <i class="fab fa-youtube"></i>
                <span>play the intro video</span>
            </section>
        </div>
    </div>

    <div class="words-about-us">
        <div class="container">
            <h3>
                expect the best
            </h3>
            <div class="row custom-row">
                <div class="col-md-4">
                    <h5>skills we have</h5>
                    <ul class="list-unstyled">
                        <li>digital marketing</li>
                        <li>interior&exterior</li>
                        <li>web</li>
                        <li>studio</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>our mission</h5>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet nulla quaerat ab praesentium!</p>
                    <p>Nam quas distinctio tempora, itaque quae laudantium illo ipsam iusto. Fugiat eos enim itaque. Eos, maxime amet!</p>
                </div>
                <div class="col-md-4">
                    <h5>our value</h5>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet nulla quaerat ab praesentium!</p>
                    <p>Nam quas distinctio tempora, itaque quae laudantium illo ipsam iusto. Fugiat eos enim itaque. Eos, maxime amet!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="choose">
        <div class="container">
        <img src="{{asset('images/newline.png')}}" alt="about line" class="about-line" data-aos="fade-up" data-aos-duration="2000">
            <section class="content">
                <h3 data-aos="fade-down" data-aos-duration="2000">why choose <span>Moltaqa Tech</span></h3>
            </section>
            <div class="row custom-row">
                <div class="col-md-4">
                    <h5>unlimited features</h5>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet nulla quaerat ab praesentium!</p>
                </div>
                <div class="col-md-4">
                    <h5>unlimited features</h5>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet nulla quaerat ab praesentium!</p>
                </div>
                <div class="col-md-4">
                    <h5>unlimited features</h5>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet nulla quaerat ab praesentium!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="client-talk">
        <div class="container">
            <h3>
                client talk about us
            </h3>
            <div class="slider">
                <div class="customers">
                    <div class="owl-carousel owl-theme owl-works">
                    <div class="item">
                        <div class="one-client">
                        <div class="img-user">
                            <img src="{{asset('images/userone.png')}}" alt="user">
                        </div>
                        <div class="arrow">
                            <img src="{{asset('images/newrevline.png')}}" alt="arrow">
                        </div>
                        <div class="comment-user">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem modi hic facilis sed amet assumenda, eum molestias porro aliquam voluptas sit deleniti .
                        </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="one-client">
                        <div class="img-user">
                            <img src="{{asset('images/userone.png')}}" alt="user">
                        </div>
                        <div class="arrow">
                        <img src="{{asset('images/newrevline.png')}}" alt="arrow">
                        </div>
                        <div class="comment-user">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem modi hic facilis sed amet assumenda, eum molestias porro aliquam voluptas sit deleniti .
                        </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="one-client">
                        <div class="img-user">
                    <img src="{{asset('images/userone.png')}}" alt="user">
                        </div>
                        <div class="arrow">
                        <img src="{{asset('images/newrevline.png')}}" alt="arrow">
                        </div>
                        <div class="comment-user">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem modi hic facilis sed amet assumenda, eum molestias porro aliquam voluptas sit deleniti .
                        </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="one-client">
                        <div class="img-user">
                    <img src="{{asset('images/userone.png')}}" alt="user">
                        </div>
                        <div class="arrow">
                        <img src="{{asset('images/newrevline.png')}}" alt="arrow">
                        </div>
                        <div class="comment-user">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem modi hic facilis sed amet assumenda, eum molestias porro aliquam voluptas sit deleniti .
                        </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="one-client">
                        <div class="img-user">
                    <img src="{{asset('images/userone.png')}}" alt="user">
                        </div>
                        <div class="arrow">
                        <img src="{{asset('images/newrevline.png')}}" alt="arrow">
                        </div>
                        <div class="comment-user">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem modi hic facilis sed amet assumenda, eum molestias porro aliquam voluptas sit deleniti .
                        </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- Start supports Section -->
            <section class="supports">
                <div class="custom-carousel">
                    <div class="owl-carousel owl-theme">

                        <div class="item" style="width:auto">
                            <a href="#">
                                <img src="{{asset('images/slideone.png')}}" alt="support">
                            </a>
                        </div>

                        <div class="item" style="width:auto">
                            <a href="#">
                            <img src="{{asset('images/slidetwo.png')}}" alt="support">
                            </a>
                        </div>

                        <div class="item" style="width:auto">
                            <a href="#">
                            <img src="{{asset('images/slidethree.png')}}" alt="support">
                            </a>
                        </div>

                        <div class="item" style="width:auto">
                            <a href="#">
                            <img src="{{asset('images/slidefour.png')}}" alt="support">
                            </a>
                        </div>

                        <div class="item" style="width:auto">
                        <a href="#">
                            <img src="{{asset('images/slideone.png')}}" alt="support">
                        </a>
                    </div>

                    <div class="item" style="width:auto">
                        <a href="#">
                            <img src="{{asset('images/slidetwo.png')}}" alt="support">
                        </a>
                    </div>


                    </div>
                </div>
            </section>
            <!-- End supports Section -->
        </div>
    </div>
@endsection

@section("js")

        {{-- owl js--}}
        <script src="{{asset('js/owl.carousel.min.js')}}"></script>
        {{-- owl  works--}}
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

{{-- owl  works--}}
<script>
    $('.owl-carousel').owlCarousel({
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
@endsection
