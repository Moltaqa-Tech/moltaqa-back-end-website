<!-- Start Header -->
<header class="background">
<div class="container">
    <div class="toggle_icon" title="Menu Bar" data-aos="zoom-in-right">
    <span></span>
    </div>
    <img class="v-line side-header" src="{{asset('images/line.png')}}" alt="vertical line"  data-aos="fade-up">
    <div class="socail-media side-header">
    <a href="@lang('site.footer_gmail_url')" target="_blank" data-aos="fade-up" data-aos-duration="500">
        <img src="{{asset('images/gmail.png')}}" alt="Gmail">
    </a>
    <a href="@lang('site.footer_linked_in_url')" target="_blank" data-aos="fade-up" data-aos-duration="1000">
        <img src="{{asset('images/linkedin.png')}}" alt="Linkedin">
    </a>
    <a href="@lang('site.footer_benhance_url')" target="_blank" data-aos="fade-up" data-aos-duration="1500">
        <img src="{{asset('images/behance.png')}}" alt="Behance">
    </a>
    <a href="@lang('site.footer_twitter_url')" target="_blank"  data-aos="fade-up" data-aos-duration="2000">
        <img src="{{asset('images/twitter.png')}}" alt="Twitter">
    </a>
    </div>
    <div class="header-cover">
    <section class="contnet-img">
        @if(app()->getLocale() == 'ar')
            <img src="{{asset('images/ar_logo.png')}}" id="mainlogo" alt="Moltaqa Tech" data-aos="zoom-in" data-aos-duration="2000">
            <img src="{{asset('images/ar_imagic.png')}}" id="addlogo" alt="Moltaqa Tech" data-aos="zoom-in" data-aos-duration="2000">
        @else
            <img src="{{asset('images/en_logo.png')}}" id="mainlogo" alt="Moltaqa Tech" data-aos="zoom-in" data-aos-duration="2000">
            <img src="{{asset('images/en_imagic.png')}}" id="addlogo" alt="Moltaqa Tech" data-aos="zoom-in" data-aos-duration="2000">
        @endif
    </section>
    <p class="text-center">
        {{$services_title}}
    </p>
    </div>
</div>
<div id="particles-js"></div>
</header>
<!-- End Header -->
