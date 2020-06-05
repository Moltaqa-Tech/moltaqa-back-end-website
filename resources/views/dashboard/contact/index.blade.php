@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.contact')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li class="active">@lang('dashboard.contact')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                {{-- <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.contact') <small>{{ $contactMessages->total() }}</small></h3>

                    <form action="{{ route('dashboard.categories.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('dashboard.search')</button>
                                @if (auth()->user()->hasPermission('create_categories'))
                                    <a href="{{ route('dashboard.categories.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header --> --}}

                <div class="box-body">

                    @if ($contactMessages->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('contact.name')</th>
                                <th>@lang('contact.email')</th>
                                <th>@lang('contact.message')</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach ($contactMessages as $index=>$message)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ $message->message }}</td>
                                    </tr>

                                @endforeach
                            </tbody>

                        </table><!-- end of table -->

                        {{ $contactMessages->appends(request()->query())->links() }}

                    @else

                        <h2>@lang('contact.no_data_found')</h2>

                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
