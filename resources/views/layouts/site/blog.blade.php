@extends('layouts.site.main')

@section('content')
    <!-- Nav Bar-->
    @include("partials.site.nav-bar", ["home" => 0, "about" => 0, "pricing" => 0, "services" => 0, "proto" => 0, "blog" => 1, "contact" => 0])

    <div class="navigation">
        <div class="container">
          <img src="{{asset('images/hline.png')}}" alt="Horicantal line" class="rev-hor-line">
          <img src="{{asset('images/contact.png')}}" class="bg-think contact-bg" data-aos="fade-right" data-aos-duration="2000">
            <section class="content">
                <h3 data-aos="fade-left" data-aos-duration="2000">@lang("site.header_blog")</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">@lang("site.header_home")</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang("site.header_blog")</li>
                    </ol>
                </nav>
            </section>
        </div>
    </div>

    <div class="blog">
        <div class="container">
          <div class="row">

            @foreach ($blogs as $blog)
                <div class="col-md-6 custom-row">
                <div class="img-date">
                    <div>
                    <span>{{ $blog->updated_at->format('d') }}</span>
                    <span>{{date('M', strtotime($blog->updated_at))}}</span>
                    </div>
                    <img class="blog-img" src="{{$blog->image_path_val}}" alt="blog">
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
                    <span>{{$blog->views_count}}</span>
                    </div>
                </div>
                <div class="details-blog">
                    <h3>{{$blog->title}}</h3>
                    <p>{{$blog->brief_description}}</p>
                    <a data-toggle="modal" data-target="#blogModal" data-title="{{$blog->title}}" data-desc="{{$blog->description}}" class="main-btn">read more</a>
                </div>
                </div>
            @endforeach
          </div>
        </div>
    </div>
    <!-- Modal -->
  <div class="modal fade" id="blogModal" tabindex="-1" role="dialog" aria-labelledby="blogModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="blogModalTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="blogModalDesc">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary additional-btn" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function() {
        console.log("ready")
          $('#blogModal').on('shown.bs.modal', function(e) {

              const link     = $(e.relatedTarget),
                    modal    = $(this),
                    title = link.data("title"),
                    desc    = link.data("desc");

              modal.find("#blogModalTitle").text(title);
              modal.find("#blogModalDesc").text(desc);
          });
      });
</script>
@endsection
