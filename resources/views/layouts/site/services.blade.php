@extends('layouts.site.main')

@section('content')
    <!-- Nav Bar-->
    @include("partials.site.nav-bar", ["home" => 0, "about" => 0, "pricing" => 0, "services" => 1, "proto" => 0, "blog" => 0, "contact" => 0])


    <div class="navigation">
        <div class="container">
          <img src="{{asset('images/hline.png')}}" alt="Horicantal line" class="rev-hor-line">
          <img src="{{asset('images/contact.png')}}" class="bg-think contact-bg" data-aos="fade-right" data-aos-duration="2000">
            <section class="content">
                <h3 data-aos="fade-left" data-aos-duration="2000">Services</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Services</li>
                    </ol>
                </nav>
            </section>
        </div>
    </div>

    <section class="what-we-do">
      <div class="container">
        <div class="features features-in-services">
          <h2>Services that we provide</h2>
          <div class="row custom-row">
            @foreach ($services as $service)
                <div class="col-md-3 col-sm-4 cust-col">
                <div class="feature-box" data-aos="fade-up" data-aos-duration="1000">
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
          </div>
        </div>
      </div>
    </section>

    <section class="main-services">
      <div class="container">
        <h3>work flow</h3>
        <div class="row parent-row">
            @foreach($workFlows as $key => $workFlow)
                <div class="col-md-6 row child-row">
                <div class="col-md-6">
                    <img src="{{asset($workFlow->image_path)}}" alt="service" data-aos="fade-right" data-aos-duration="2000">
                </div>

                <div class="col-md-6 pos-top-7" data-aos="fade-up" data-aos-duration="2000">
                    <h5><span>@if(($key+1) < 10) 0{{($key + 1)}}. @else {{($key + 1)}}. @endif</span> {{$workFlow->title}}</h5>
                    <p>{{$workFlow->desc}}</p>
                </div>
                </div>
            @endforeach
        </div>
      </div>
    </section>
@endsection
