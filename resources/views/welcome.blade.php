@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang("dashboard.dashboard")</h1>

            <ol class="bviewcrumb">
                {{-- <li class="active"><i class="fa fa-dashboard"></i> @lang("dashboard.dashboard")</li> --}}
            </ol>
        </section>

        <section class="content">

            <div class="row">
                {{-- bolgs--}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $blogs_count }}</h3>

                            <p>@lang('dashboard.blogs')</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('dashboard.blogs.index') }}" class="small-box-footer">@lang('dashboard.view') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                {{--services--}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $services_count }}</h3>

                            <p>@lang('dashboard.services')</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('dashboard.services.index') }}" class="small-box-footer">@lang('dashboard.view') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                {{--teams--}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ $teams_count }}</h3>

                            <p>@lang('dashboard.teams')</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <a href="{{ route('dashboard.teams.index') }}" class="small-box-footer">@lang('dashboard.view') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                {{--portofolios--}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $portofolios_count }}</h3>

                            <p>@lang('dashboard.portofolios')</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('dashboard.portofolios.index') }}" class="small-box-footer">@lang('dashboard.view') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                {{--messages--}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $messages_count }}</h3>

                            <p>@lang('dashboard.contact')</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('dashboard.contact') }}" class="small-box-footer">@lang('dashboard.view') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div><!-- end of row -->
        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection

{{-- @push('scripts')

    <script>

        //line chart
        var line = new Morris.Line({
            element: 'line-chart',
            resize: true,
            data: [
                @foreach ($sales_data as $data)
                {
                    ym: "{{ $data->year }}-{{ $data->month }}", sum: "{{ $data->sum }}"
                },
                @endforeach
            ],
            xkey: 'ym',
            ykeys: ['sum'],
            labels: ['@lang('site.total')'],
            lineWidth: 2,
            hideHover: 'auto',
            gridStrokeWidth: 0.4,
            pointSize: 4,
            gridTextFamily: 'Open Sans',
            gridTextSize: 10
        });
    </script>

@endpush --}}
