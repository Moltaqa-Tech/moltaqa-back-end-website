
@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <h1>@lang('dashboard.blogs')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li class="active">@lang('dashboard.blogs')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.blogs') <small>{{ $blogs->total() }}</small></h3>

                    <form action="{{ route('dashboard.blogs.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                    <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('dashboard.search')</button>
                                    <a href="{{ route('dashboard.blogs.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($blogs->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('blog.title')</th>
                                <th>@lang('blog.breif_desc')</th>
                                <th>@lang('blog.desc')</th>
                                <th>@lang('blog.status')</th>
                                <th>@lang('blog.views_count')</th>
                                <th>@lang('blog.image')</th>
                                <th>@lang('blog.action')</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($blogs as $index=>$blog)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->brief_description }}</td>
                                    <td>{{ $blog->description }}</td>
                                    <td>{{ $blog->status }}</td>
                                    <td>{{ $blog->views_count }}</td>
                                    <td><img src="{{ $blog->image_path_val }}" style="width: 100px;" class="img-thumbnail" alt=""></td>
                                    <td>
                                        <a href="{{ route('dashboard.blogs.edit', $blog->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('dashboard.edit')</a>

                                        <form action="{{ route('dashboard.blogs.destroy', $blog->id) }}" method="post" style="display: inline-block">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('dashboard.delete')</button>
                                        </form><!-- end of form -->

                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table><!-- end of table -->

                        {{ $blogs->appends(request()->query())->links() }}

                    @else

                        <h2>@lang('blog.no_data_found')</h2>

                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
