<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dashboard_files/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>
                    {{Auth::user()->name}}
                </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i><span>@lang('dashboard.dashboard')</span></a></li>
            <li><a href="{{ route('dashboard.services.index') }}"><i class="fa fa-server"></i><span>@lang('dashboard.services')</span></a></li>

            <li class=" treeview">
                <a href="{{ route('dashboard.welcome') }}">
                  <i class="fa fa-th-large"></i> <span>@lang('dashboard.portofolios')</span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                  <li class="active"><a href="{{ route('dashboard.portofolio-categories.index') }}"><i class="fa fa-circle-o"></i> @lang('dashboard.porto-categories')</a></li>
                  <li><a href="{{ route('dashboard.portofolios.index') }}"><i class="fa fa-circle-o"></i>@lang('dashboard.portofolios')</a></li>
                </ul>
            </li>

            <li class=" treeview">
                <a href="{{ route('dashboard.welcome') }}">
                  <i class="fa fa-th-large"></i> <span>@lang('dashboard.pricing')</span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a class="active" href="{{ route('dashboard.price-categories.index') }}"><i class="fa fa-circle-o"></i><span>@lang('dashboard.price-categories')</span></a></li>
                    <li><a href="{{ route('dashboard.price-attrs.index') }}"><i class="fa fa-circle-o"></i><span>@lang('dashboard.price-attributes')</span></a></li>
                </ul>
            </li>

            <li><a href="{{ route('dashboard.teams.index') }}"><i class="fa fa-users"></i><span>@lang('dashboard.teams')</span> </a></li>
            <li><a href="{{ route('dashboard.blogs.index') }}"><i class="fa fa-th"></i><span>@lang('dashboard.blogs')</span></a></li>
            <li><a href="{{ route('dashboard.supports.index') }}"><i class="fa fa-th"></i><span>@lang('dashboard.supports')</span></a></li>
            <li><a href="{{ route('dashboard.contact') }}"><i class="fa fa-envelope-o"></i><span>@lang('dashboard.contact')</span> <span class="badge badge-info pull-right">5</span></a></li>
            <li><a href="{{ url('dashboard/logout') }}"><i class="fa fa-sign-out"></i><span>@lang('dashboard.logout')</span></a></li>

        </ul>

    </section>

</aside>

