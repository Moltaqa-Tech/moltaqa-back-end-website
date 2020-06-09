@extends('layouts.site.main')

@section('content')
    <!-- Nav Bar-->
    @include("partials.site.nav-bar", ["home" => 0, "about" => 0, "pricing" => 1, "services" => 0, "proto" => 0, "blog" => 0, "contact" => 0])


    <div class="navigation">
        <div class="container">
          <img src="{{asset('images/hline.png')}}" alt="Horicantal line" class="rev-hor-line">
          <img src="{{asset('images/PRICING.png')}}" class="bg-think pricing-bg" data-aos="fade-right" data-aos-duration="2000">
            <section class="content">
                <h3 data-aos="fade-left" data-aos-duration="2000">@lang("site.pricing_what_plan")</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">@lang("site.header_home")</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang("site.header_pricing")</li>
                    </ol>
                </nav>
                <h5>@lang("site.pricing_plan")</h5>
            </section>
        </div>
    </div>

    <div class="pricing">
      <div class="container">
        <h3>@lang("site.pricing_website")</h3>
        <div class="row custome-row">

            @foreach ($websiteCategories as $category)

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
                    <span>@lang("site.pricing_save") ${{$category->price}}</span>
                    <span> / </span>
                    <span>@lang("site.pricing_year")</span>
                    </div>
                    <div class="get-start">
                    <a href="#">@lang("site.pricing_get_start")</a>
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
                    </ul>
                </div>
                </div>

            @endforeach
        </div>
      </div>
    </div>

    <div class="pricing hoisting-pricing">
      <div class="container">
        <h3>@lang("site.pricing_hosting")</h3>
        <div class="row custome-row">

            @foreach ($hostCategories as $hostCategory)
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
                        <span>@lang("site.pricing_save") ${{$hostCategory->saved_price}}</span>
                        <span> / </span>
                        <span>@lang("site.pricing_year")</span>
                        </div>
                        <div class="get-start">
                        <a href="#">@lang("site.pricing_get_start")</a>
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
                        </ul>
                    </div>
                </div>
            @endforeach

        </div>
      </div>
    </div>

@endsection
