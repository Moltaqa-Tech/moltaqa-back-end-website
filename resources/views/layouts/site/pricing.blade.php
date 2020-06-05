@extends('layouts.site.main')

@section('content')
    <!-- Nav Bar-->
    @include("partials.site.nav-bar", ["home" => 0, "about" => 0, "pricing" => 1, "services" => 0, "proto" => 0, "blog" => 0, "contact" => 0])


    <div class="navigation">
        <div class="container">
          <img src="{{asset('images/hline.png')}}" alt="Horicantal line" class="rev-hor-line">
          <img src="{{asset('images/PRICING.png')}}" class="bg-think pricing-bg" data-aos="fade-right" data-aos-duration="2000">
            <section class="content">
                <h3 data-aos="fade-left" data-aos-duration="2000">what plan you need?</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pricing</li>
                    </ol>
                </nav>
                <h5>choose your plan now</h5>
            </section>
        </div>
    </div>

    <div class="pricing">
      <div class="container">
        <h3>website pricing</h3>
        <div class="row custome-row">

            @foreach ($websiteCategories as $category)
            {{\Log::info("Webist")}}
            {{\Log::info($category->attrs)}}
                <div class="col-md-3">
                <div class="custome-pricing">
                    <div class="on-hover-title">
                    <span>{{$category->name}}</span>
                    </div>
                    <img src="{{asset('images/aboutline.png')}}" alt="about line" class="about-line">
                    <div class="pricing-title">
                    <span>{{$category->name}}</span>
                    </div>
                    <div class="price">
                    <span>{{$category->price}}$</span>
                    </div>
                    <div class="price-detials">
                    <span>save ${{$category->price}}</span>
                    <span> / </span>
                    <span>year</span>
                    </div>
                    <div class="get-start">
                    <a href="#">get start</a>
                    </div>
                    <ul  class="list-unstyled">
                        @foreach ($category->attrs as $attr)
                            <li>
                            <span>{{$attr->name}}</span>
                                @if($attr->pivot->active)
                                    <span class="provided"></span>
                                @else
                                    <span class="no-provided"></span>
                                @endif
                                </li>
                        @endforeach
                        {{--<li>
                            <span>about us</span>
                            <span class="no-provided"></span>
                         </li>
                        <li>
                            <span>services</span>
                            <span class="provided"></span>
                        </li>
                        <li>
                            <span>about us</span>
                            <span class="no-provided"></span>
                        </li>
                        <li>
                            <span>services</span>
                            <span class="provided"></span>
                        </li>
                        <li>
                            <span>about us</span>
                            <span class="no-provided"></span>
                        </li>
                        <li>
                            <span>services</span>
                            <span class="provided"></span>
                        </li>
                        <li>
                            <span>about us</span>
                            <span class="no-provided"></span>
                        </li> --}}
                    </ul>
                </div>
                </div>

            @endforeach
          {{-- <div class="col-md-3">
            <div class="custome-pricing">
              <div class="on-hover-title">
                <span>standard</span>
              </div>
              <img src="{{asset('images/aboutline.png')}}" alt="about line" class="about-line">
              <div class="pricing-title">
                <span>standard</span>
              </div>
              <div class="price">
                <span>19$</span>
              </div>
              <div class="price-detials">
                <span>save $16</span>
                <span> / </span>
                <span>year</span>
              </div>
              <div class="get-start">
                <a href="#">get start</a>
              </div>
              <ul  class="list-unstyled">
                <li>
                  <span>services</span>
                  <span class="provided"></span>
                </li>
                <li>
                  <span>about us</span>
                  <span class="no-provided"></span>
                </li>
                <li>
                  <span>services</span>
                  <span class="provided"></span>
                </li>
                <li>
                  <span>about us</span>
                  <span class="no-provided"></span>
                </li>
                <li>
                  <span>services</span>
                  <span class="provided"></span>
                </li>
                <li>
                  <span>about us</span>
                  <span class="no-provided"></span>
                </li>
                <li>
                  <span>services</span>
                  <span class="provided"></span>
                </li>
                <li>
                  <span>about us</span>
                  <span class="no-provided"></span>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <div class="custome-pricing">
              <div class="on-hover-title">
                <span>standard</span>
              </div>
              <img src="{{asset('images/aboutline.png')}}" alt="about line" class="about-line">
              <div class="pricing-title">
                <span>standard</span>
              </div>
              <div class="price">
                <span>19$</span>
              </div>
              <div class="price-detials">
                <span>save $16</span>
                <span> / </span>
                <span>year</span>
              </div>
              <div class="get-start">
                <a href="#">get start</a>
              </div>
              <ul  class="list-unstyled">
                <li>
                  <span>services</span>
                  <span class="provided"></span>
                </li>
                <li>
                  <span>about us</span>
                  <span class="no-provided"></span>
                </li>
                <li>
                  <span>services</span>
                  <span class="provided"></span>
                </li>
                <li>
                  <span>about us</span>
                  <span class="no-provided"></span>
                </li>
                <li>
                  <span>services</span>
                  <span class="provided"></span>
                </li>
                <li>
                  <span>about us</span>
                  <span class="no-provided"></span>
                </li>
                <li>
                  <span>services</span>
                  <span class="provided"></span>
                </li>
                <li>
                  <span>about us</span>
                  <span class="no-provided"></span>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <div class="custome-pricing">
              <div class="on-hover-title">
                <span>standard</span>
              </div>
              <img src="{{asset('images/aboutline.png')}}" alt="about line" class="about-line">
              <div class="pricing-title">
                <span>standard</span>
              </div>
              <div class="price">
                <span>19$</span>
              </div>
              <div class="price-detials">
                <span>save $16</span>
                <span> / </span>
                <span>year</span>
              </div>
              <div class="get-start">
                <a href="#">get start</a>
              </div>
              <ul  class="list-unstyled">
                <li>
                  <span>services</span>
                  <span class="provided"></span>
                </li>
                <li>
                  <span>about us</span>
                  <span class="no-provided"></span>
                </li>
                <li>
                  <span>services</span>
                  <span class="provided"></span>
                </li>
                <li>
                  <span>about us</span>
                  <span class="no-provided"></span>
                </li>
                <li>
                  <span>services</span>
                  <span class="provided"></span>
                </li>
                <li>
                  <span>about us</span>
                  <span class="no-provided"></span>
                </li>
                <li>
                  <span>services</span>
                  <span class="provided"></span>
                </li>
                <li>
                  <span>about us</span>
                  <span class="no-provided"></span>
                </li>
              </ul>
            </div>
          </div> --}}
        </div>
      </div>
    </div>

    <div class="pricing hoisting-pricing">
      <div class="container">
        <h3>hoisting prices</h3>
        <div class="row custome-row">

            @foreach ($hostCategories as $hostCategory)
            {{\Log::info("HOst")}}
            {{\Log::info($hostCategory->attrs)}}
                <div class="col-md-3">
                <div class="custome-pricing">
                    <div class="on-hover-title">
                    <span>{{$hostCategory->name}}</span>
                    </div>
                    <img src="{{asset('images/aboutline.png')}}" alt="about line" class="about-line">
                    <div class="pricing-title">
                    <span>{{$hostCategory->name}}</span>
                    </div>
                    <div class="price">
                    <span>{{$hostCategory->price}}$</span>
                    </div>
                    <div class="price-detials">
                    <span>save ${{$hostCategory->saved_price}}</span>
                    <span> / </span>
                    <span>year</span>
                    </div>
                    <div class="get-start">
                    <a href="#">get start</a>
                    </div>
                    <ul  class="list-unstyled">
                        @foreach ($hostCategory->attrs as $hostAttr)
                            <li>
                            <span>{{$hostAttr->name}}</span>
                                @if($hostAttr->pivot->active)
                                    <span class="provided"></span>
                                @else
                                    <span class="no-provided"></span>
                                @endif
                                </li>
                        @endforeach
                    {{-- <li>
                        <span>services</span>
                        <span class="provided"></span>
                    </li>
                    <li>
                        <span>about us</span>
                        <span class="no-provided"></span>
                    </li>
                    <li>
                        <span>services</span>
                        <span class="provided"></span>
                    </li>
                    <li>
                        <span>about us</span>
                        <span class="no-provided"></span>
                    </li>
                    <li>
                        <span>services</span>
                        <span class="provided"></span>
                    </li>
                    <li>
                        <span>about us</span>
                        <span class="no-provided"></span>
                    </li>
                    <li>
                        <span>services</span>
                        <span class="provided"></span>
                    </li>
                    <li>
                        <span>about us</span>
                        <span class="no-provided"></span>
                    </li> --}}
                    </ul>
                </div>
                </div>

            @endforeach
          {{-- <div class="col-md-3">
            <div class="custome-pricing">
              <div class="on-hover-title">
                <span>advanced</span>
              </div>
              <img src="{{asset('images/aboutline.png')}}" alt="about line" class="about-line">
              <div class="pricing-title">
                <span>advanced</span>
              </div>
              <div class="price">
                <span>29$</span>
              </div>
              <div class="price-detials">
                <span>save $26</span>
                <span> / </span>
                <span>year</span>
              </div>
              <div class="get-start">
                <a href="#">get start</a>
              </div>
              <ul  class="list-unstyled">
                <li>
                  <span>services</span>
                  <span class="provided"></span>
                </li>
                <li>
                  <span>about us</span>
                  <span class="no-provided"></span>
                </li>
                <li>
                  <span>services</span>
                  <span class="provided"></span>
                </li>
                <li>
                  <span>about us</span>
                  <span class="no-provided"></span>
                </li>
                <li>
                  <span>services</span>
                  <span class="provided"></span>
                </li>
                <li>
                  <span>about us</span>
                  <span class="no-provided"></span>
                </li>
                <li>
                  <span>services</span>
                  <span class="provided"></span>
                </li>
                <li>
                  <span>about us</span>
                  <span class="no-provided"></span>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <div class="custome-pricing">
              <div class="on-hover-title">
                <span>commerce</span>
              </div>
              <img src="{{asset('images/aboutline.png')}}" alt="about line" class="about-line">
              <div class="pricing-title">
                <span>commerce</span>
              </div>
              <div class="price">
                <span>39$</span>
              </div>
              <div class="price-detials">
                <span>save $36</span>
                <span> / </span>
                <span>year</span>
              </div>
              <div class="get-start">
                <a href="#">get start</a>
              </div>
              <ul  class="list-unstyled">
                <li>
                  <span>services</span>
                  <span class="provided"></span>
                </li>
                <li>
                  <span>about us</span>
                  <span class="no-provided"></span>
                </li>
                <li>
                  <span>services</span>
                  <span class="provided"></span>
                </li>
                <li>
                  <span>about us</span>
                  <span class="no-provided"></span>
                </li>
                <li>
                  <span>services</span>
                  <span class="provided"></span>
                </li>
                <li>
                  <span>about us</span>
                  <span class="no-provided"></span>
                </li>
                <li>
                  <span>services</span>
                  <span class="provided"></span>
                </li>
                <li>
                  <span>about us</span>
                  <span class="no-provided"></span>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <div class="custome-pricing">
              <div class="on-hover-title">
                <span>venture</span>
              </div>
              <img src="{{asset('images/aboutline.png')}}" alt="about line" class="about-line">
              <div class="pricing-title">
                <span>venture</span>
              </div>
              <div class="price">
                <span>29$</span>
              </div>
              <div class="price-detials">
                <span>save $26</span>
                <span> / </span>
                <span>year</span>
              </div>
              <div class="get-start">
                <a href="#">get start</a>
              </div>
              <ul  class="list-unstyled">
                <li>
                  <span>services</span>
                  <span class="provided"></span>
                </li>
                <li>
                  <span>about us</span>
                  <span class="no-provided"></span>
                </li>
                <li>
                  <span>services</span>
                  <span class="provided"></span>
                </li>
                <li>
                  <span>about us</span>
                  <span class="no-provided"></span>
                </li>
                <li>
                  <span>services</span>
                  <span class="provided"></span>
                </li>
                <li>
                  <span>about us</span>
                  <span class="no-provided"></span>
                </li>
                <li>
                  <span>services</span>
                  <span class="provided"></span>
                </li>
                <li>
                  <span>about us</span>
                  <span class="no-provided"></span>
                </li>
              </ul>
            </div>
          </div> --}}
        </div>
      </div>
    </div>

@endsection
