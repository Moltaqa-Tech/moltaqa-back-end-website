@extends('layouts.site.main')

@section('css')
    <!-- style for owl carousel -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">

    {{-- <link href="https://fonts.googleapis.com/css?family=Cairo|Oswald&display=swap" rel="stylesheet"> --}}

@endsection

@section('content')
    <!-- Nav Bar-->
    @include("partials.site.nav-bar", ["home" => 0, "about" => 1, "pricing" => 0, "services" => 0, "proto" => 0, "blog" => 0, "contact" => 0])


    <div class="navigation">
        <div class="container">
        <img src="{{asset('images/hline.png')}}" alt="Horicantal line" class="rev-hor-line" >
        <img src="{{asset('images/WORK.png')}}" class="bg-think" data-aos="fade-right" data-aos-duration="2000">
            <section class="content">
                <h3 data-aos="fade-left" data-aos-duration="2000">@lang("site.about_about_us")</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">@lang("site.header_home")</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang("site.header_about")</li>
                    </ol>
                </nav>
            </section>
        </div>
    </div>

    <div class="words-about-us">
        <div class="container">
            <h3>
                @lang("site.about_few_words")
            </h3>
            <div class="row custom-row">
                <div class="col-md-4">
                    <h5>@lang("site.about_who_we_are")</h5>
                    <p>@lang("site.about_who_we_are_desc1")</p>
                    <p>@lang("site.about_who_we_are_desc2")</p>
                </div>
                <div class="col-md-4">
                    <h5>@lang("site.about_what_we_do")</h5>
                    <p>@lang("site.about_what_we_do_desc1")</p>
                    {{-- <p>@lang("site.about_what_we_do_desc2")</p> --}}
                </div>
                {{-- <div class="col-md-4">
                    <h5>@lang("site.about_why_do_it")</h5>
                    <p>@lang("site.about_why_do_it_desc1")</p>
                    <p>@lang("site.about_why_do_it_desc2")</p>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="discover">
        <div class="container">
            <img src="{{asset('images/newline.png')}}" alt="about line" class="about-line" data-aos="fade-up" data-aos-duration="2000">
            <section class="content">
                <h3 data-aos="fade-down" data-aos-duration="2000">@lang("site.about_discover") <span>@lang("site.site_title")</span></h3>
            </section>
            <section class="play-video">
                <i class="fab fa-youtube"></i>
                <span>@lang("site.about_intro_video")</span>
            </section>
        </div>
    </div>

    <div class="words-about-us">
        <div class="container">
            <h3>
                @lang("site.about_expect_best")
            </h3>
            <div class="row custom-row">
                <div class="col-md-4">
                    <h5>@lang("site.about_skill_we_have")</h5>
                    <ul class="list-unstyled">
                        <li>@lang("site.about_skill_1")</li>
                        <li>@lang("site.about_skill_2")</li>
                        <li>@lang("site.about_skill_3")</li>
                        <li>@lang("site.about_skill_4")</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>@lang("site.about_our_mission")</h5>
                    <p>@lang("site.about_our_mission_desc1")</p>
                    <p>@lang("site.about_our_mission_desc2")</p>
                </div>
                <div class="col-md-4">
                    <h5>@lang("site.about_our_value")</h5>
                    <p>@lang("site.about_our_value_desc1")</p>
                    {{-- <p>@lang("site.about_our_value_desc2 ")</p> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="choose">
        <div class="container">
        <img src="{{asset('images/newline.png')}}" alt="about line" class="about-line" data-aos="fade-up" data-aos-duration="2000">
            <section class="content">
                <h3 data-aos="fade-down" data-aos-duration="2000">@lang("site.about_why_choose") <span>@lang("site.site_title")</span></h3>
            </section>
            <div class="row custom-row">
                <div class="col-md-4">
                    <h5>@lang("site.about_feature_1")</h5>
                    <p>@lang("site.about_feature_1_desc")</p>
                </div>
                <div class="col-md-4">
                    <h5>@lang("site.about_feature_2")</h5>
                    <p>@lang("site.about_feature_2_desc")</p>
                </div>
                <div class="col-md-4">
                    <h5>@lang("site.about_feature_3")</h5>
                    <p>@lang("site.about_feature_3_desc")</p>
                </div>
            </div>
        </div>
    </div>

    <div class="client-talk">
        <div class="container">
            <h3>
                @lang("site.about_client_talk")
            </h3>
            <div class="slider">
                <div class="customers">
                    <div class="owl-carousel owl-theme owl-works">
                        @foreach ($reviews as $review)
                            <div class="item">
                                <div class="one-client">
                                <div class="img-user">
                                    @if($review->url != null)
                                        <a href="{{$review->url}}" target="_blank">
                                            <img src="{{$review->image_path_val}}" alt="support">
                                        </a>
                                    @else
                                        <img src="{{$review->image_path_val}}" alt="support">
                                    @endif
                                </div>
                                <div class="arrow">
                                    <img src="{{asset('images/newrevline.png')}}" alt="arrow">
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
            <!-- Start supports Section -->
            <section class="supports">
                <div class="custom-carousel">
                    <div class="owl-carousel owl-theme">
                        @foreach ($reviews as $review)
                            @if($review->satisfied == 1)
                                <div class="item" style="width:auto" >
                                    @if($review->url != null)
                                        <a href="{{$review->url}}" target="_blank">
                                            <img src="{{$review->image_path_val}}" alt="support">
                                        </a>
                                    @else
                                        <img src="{{$review->image_path_val}}" alt="support">
                                    @endif
                                </div>
                            @endif
                        @endforeach

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
        loop:false,
        rewind: true,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true ,
        margin:10,
        nav:true,
        });
  </script>
@endsection
