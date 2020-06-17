<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{asset('images/logo.png')}}" alt="logo">
        </a>
        <div class="toggle_icon" title="Menu Bar">
          <span></span>
        </div>

        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
          <a class="nav-link {{$home ? 'active' : ''}}" href="/">@lang('site.header_home')</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{$about ? 'active' : ''}}" href="about">@lang('site.header_about')</a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{$pricing ? 'active' : ''}}" href="pricing">@lang('site.header_pricing')</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{$services ? 'active' : ''}}" href="services">@lang('site.header_services')</a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{$proto ? 'active' : ''}}" href="portofolio">@lang('site.header_portofolio')</a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{$blog ? 'active' : ''}}" href="blog">@lang('site.header_blog')</a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{$contact ? 'active' : ''}}" href="contact">@lang('site.header_contact_us')</a>
          </li>
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                @if($localeCode != app()->getLocale())
                    <li class="nav-item">
                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endif
            @endforeach

        </ul>
    </div>
  </nav>
