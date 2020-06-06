@extends('layouts.site.main')

@section('content')
    <!-- Nav Bar-->
    @include("partials.site.nav-bar", ["home" => 0, "about" => 0, "pricing" => 0, "services" => 0, "proto" => 0, "blog" => 0, "contact" => 1])


    <div class="navigation">
        <div class="container">
          <img src="{{asset('images/hline.png')}}" alt="Horicantal line" class="rev-hor-line">
          <img src="{{asset('images/contact.png')}}" class="bg-think contact-bg" data-aos="fade-right" data-aos-duration="2000">
            <section class="content">
                <h3 data-aos="fade-left" data-aos-duration="2000">contact us</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">contact us</li>
                    </ol>
                </nav>
            </section>
        </div>
    </div>

      <div class="contact">
          <div class="container">
              <h3>need some help ? we are here for you</h3>
              <div class="row custom-row">
                  @foreach ($supports as $support)
                    <div class="col-md-4 help-box">
                        <img src="" alt="">
                        <h5>{{$support->title}}</h5>
                        <div class="text-help">
                            {{$support->description}}
                        </div>
                        <ul class="list-unstyled">
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{$support->location}}</span>
                            </li>
                            <li>
                                <i class="fas fa-phone-volume"></i>
                                <a href="tel:{{$support->phone}}">{{$support->phone}}</a>
                            </li>
                            <li>
                                <i class="far fa-envelope"></i>
                                <a href="mailto:{{$support->email}}">{{$support->email}}</a>
                            </li>
                            </ul>
                    </div>
                  @endforeach
               
              </div>
          </div>
      </div>

      <section class="client-said">
          <div class="row">
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
