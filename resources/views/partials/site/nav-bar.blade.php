<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{asset('images/logo.png')}}" alt="logo">
        </a>
        <div class="toggle_icon" title="Menu Bar">
          <span></span>
        </div>

        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
          <a class="nav-link {{$home ? 'active' : ''}}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{$about ? 'active' : ''}}" href="about">about</a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{$pricing ? 'active' : ''}}" href="pricing">pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{$services ? 'active' : ''}}" href="services">Services</a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{$proto ? 'active' : ''}}" href="portofolio">portofolio</a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{$blog ? 'active' : ''}}" href="blog">blog</a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{$contact ? 'active' : ''}}" href="contact">contact us</a>
          </li>
        </ul>
    </div>
  </nav>
