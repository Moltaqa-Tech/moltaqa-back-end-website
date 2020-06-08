
@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <h1>@lang('dashboard.supports')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li class="active">@lang('dashboard.supports')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.supports') <small>{{ $supports->total() }}</small></h3>

                    <form action="{{ route('dashboard.supports.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                    <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('dashboard.search')</button>
                                    <a href="{{ route('dashboard.supports.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($supports->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('support.title')</th>
                                <th>@lang('support.description')</th>
                                <th>@lang('support.location')</th>
                                <th>@lang('support.email')</th>
                                <th>@lang('support.phone')</th>
                                <th>@lang('support.status')</th>
                                <th>@lang('support.action')</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($supports as $index=>$support)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $support->title }}</td>
                                    <td>{{ $support->description }}</td>
                                    <td>{{ $support->location }}</td>
                                    <td>{{ $support->email }}</td>
                                    <td>{{ $support->phone }}</td>
                                    <td>{{ \App\Mappers\ActiveStatus::handle($support->status) }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.supports.edit', $support->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('dashboard.edit')</a>

                                        <form action="{{ route('dashboard.supports.destroy', $support->id) }}" method="post" style="display: inline-block">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('dashboard.delete')</button>
                                        </form><!-- end of form -->

                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table><!-- end of table -->

                        {{ $supports->appends(request()->query())->links() }}

                    @else

                        <h2>@lang('support.no_data_found')</h2>

                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
