
@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <h1>@lang('dashboard.teams')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li class="active">@lang('dashboard.teams')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.teams') <small>{{ $teams->total() }}</small></h3>

                    <form action="{{ route('dashboard.teams.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                    <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('dashboard.search')</button>
                                    <a href="{{ route('dashboard.teams.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($teams->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('team.name')</th>
                                <th>@lang('team.job_title')</th>
                                <th>@lang('team.instagram_url')</th>
                                <th>@lang('team.whatsapp_url')</th>
                                <th>@lang('team.facebook_url')</th>
                                <th>@lang('team.twitter_url')</th>
                                <th>@lang('team.status')</th>
                                <th>@lang('team.image')</th>
                                <th>@lang('team.action')</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($teams as $index=>$team)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->job_title }}</td>
                                    <td>{{ $team->instagram_url }}</td>
                                    <td>{{ $team->whatsapp_url }}</td>
                                    <td>{{ $team->facebook_url }}</td>
                                    <td>{{ $team->twitter_url }}</td>
                                    <td>{{ $team->status }}</td>
                                    <td><img src="{{ $team->image_path_val }}" style="width: 100px;" class="img-thumbnail" alt=""></td>
                                    <td>
                                        <a href="{{ route('dashboard.teams.edit', $team->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('dashboard.edit')</a>

                                        <form action="{{ route('dashboard.teams.destroy', $team->id) }}" method="post" style="display: inline-block">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('dashboard.delete')</button>
                                        </form><!-- end of form -->

                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table><!-- end of table -->

                        {{ $teams->appends(request()->query())->links() }}

                    @else

                        <h2>@lang('team.no_data_found')</h2>

                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
