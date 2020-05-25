@extends('layouts.main')

@section('content')
    <!-- Nav Bar-->
    @include("partials.nav-bar", ["home" => 0, "about" => 0, "pricing" => 0, "services" => 0, "proto" => 0, "blog" => 1, "contact" => 0])

    <div class="navigation">
        <div class="container">
          <img src="{{asset('images/hline.png')}}" alt="Horicantal line" class="rev-hor-line">
          <img src="{{asset('images/contact.png')}}" class="bg-think contact-bg" data-aos="fade-right" data-aos-duration="2000">
            <section class="content">
                <h3 data-aos="fade-left" data-aos-duration="2000">blog</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">blog</li>
                    </ol>
                </nav>
            </section>
        </div>
    </div>

    <div class="blog">
        <div class="container">
          <div class="row">
            <div class="col-md-6 custom-row">
              <div class="img-date">
                <div>
                  <span>27</span>
                  <span>jun</span>
                </div>
                <img class="blog-img" src="{{asset('images/carsoul.png')}}" alt="blog">
              </div>
            </div>
            <div class="col-md-6 custom-row">
              <div class="text-blog">
                <!-- <div>
                  <span>posted by: </span>
                  <span>eman mosa</span>
                </div> -->
                <div>
                  <span>view: </span>
                  <span>98</span>
                </div>
              </div>
              <div class="details-blog">
                <h3>arto lifewrt</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ratione excepturi? Accusantium doloribus fuga sapiente vero deleniti consequuntur nesciunt ratione architecto a? Soluta nesciunt deleniti illum, illo cupiditate sed? Doloribus?</p>
                <a data-toggle="modal" data-target="#exampleModal" class="main-btn">read more</a>
              </div>
            </div>
            <div class="col-md-6 custom-row">
              <div class="img-date">
                <div>
                  <span>27</span>
                  <span>jun</span>
                </div>
                <img class="blog-img" src="{{asset('images/carsoul.png')}}" alt="blog">
              </div>
            </div>
            <div class="col-md-6 custom-row">
              <div class="text-blog">
                <!-- <div>
                  <span>posted by: </span>
                  <span>eman mosa</span>
                </div> -->
                <div>
                  <span>view: </span>
                  <span>98</span>
                </div>
              </div>
              <div class="details-blog">
                <h3>arto lifewrt</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ratione excepturi? Accusantium doloribus fuga sapiente vero deleniti consequuntur nesciunt ratione architecto a? Soluta nesciunt deleniti illum, illo cupiditate sed? Doloribus?</p>
                <a data-toggle="modal" data-target="#exampleModal" class="main-btn">read more</a>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ARTO LIFEWRT</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio ullam nisi sapiente voluptas beatae, dicta at repudiandae, repellat quam velit perferendis maxime assumenda ea nulla? Molestiae, modi aperiam? Earum, iste.
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus esse tempora rem, dignissimos nemo necessitatibus ex impedit modi repellat! Vero iusto quia, animi consectetur nobis laborum hic voluptate magni distinctio!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary additional-btn" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection
