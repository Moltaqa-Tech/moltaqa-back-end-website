@extends('layouts.site.main')

@section('content')
    <!-- Nav Bar-->
    @include("partials.site.nav-bar", ["home" => 0, "about" => 0, "pricing" => 0, "services" => 0, "proto" => 1, "blog" => 0, "contact" => 0])


    <div class="navigation">
        <div class="container">
          <img src="{{asset('images/hline.png')}}" alt="Horicantal line" class="rev-hor-line">
          <img src="{{asset('images/PORYOFOLIO.png')}}" class="bg-think portofolio-bg" data-aos="fade-right" data-aos-duration="2000">
            <section class="content">
                <h3 data-aos="fade-left" data-aos-duration="2000">@lang("site.portofolio_our")</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">@lang("site.header_home")</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang("site.portofolio_our")</li>
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
                        <span >@lang("site.portofolio_all")</span>
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
                @php
                    $catClass = "";
                    foreach ($portofolio->categories as $cat) {
                        $catClass .= " cat_" . $cat->id;
                    }
                @endphp
                @foreach ($portofolio->images as $image)
                    <div class="cat_{{$catClass}} all col-md-3">
                        <img height="400" src="{{$image->image_path_val}}" alt="Portofolio - {{$catClass}}">
                    </div>
                @endforeach
            @endforeach
      </div>
    </section>
@endsection
