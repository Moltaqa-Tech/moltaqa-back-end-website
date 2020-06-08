@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.services')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li class="active">@lang('dashboard.services')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.services') <small>{{ $services->total() }}</small></h3>

                    <form action="{{ route('dashboard.services.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                    <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('dashboard.search')</button>
                                    <a href="{{ route('dashboard.services.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($services->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('service.title')</th>
                                <th>@lang('service.desc')</th>
                                <th>@lang('service.status')</th>
                                <th>@lang('service.work_flow')</th>
                                <th>@lang('service.image')</th>
                                <th>@lang('service.action')</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($services as $index=>$service)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $service->title }}</td>
                                    <td>{{ $service->desc }}</td>
                                    <td>{{ \App\Mappers\ActiveStatus::handle($service->status) }}</td>
                                    <td>{{ ($service->work_flow) ? "Yes" : "No" }}</td>
                                    <td><img src="{{ $service->image_path_val }}" style="width: 100px;" class="img-thumbnail" alt=""></td>
                                    <td>
                                        <a href="{{ route('dashboard.services.edit', $service->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('dashboard.edit')</a>

                                        <form action="{{ route('dashboard.services.destroy', $service->id) }}" method="post" style="display: inline-block">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('dashboard.delete')</button>
                                        </form><!-- end of form -->

                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table><!-- end of table -->

                        {{ $services->appends(request()->query())->links() }}

                    @else

                        <h2>@lang('service.no_data_found')</h2>

                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
