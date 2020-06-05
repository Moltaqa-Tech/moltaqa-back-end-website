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
                        <img src="{{asset($image->image_path)}}" alt="{{$portofolio->category_id}}">
                    </div>
                @endforeach
            @endforeach
      </div>
    </section>
@endsection
