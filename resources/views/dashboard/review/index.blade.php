
@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <h1>@lang('dashboard.reviews')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li class="active">@lang('dashboard.reviews')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.reviews') <small>{{ $reviews->total() }}</small></h3>

                    <form action="{{ route('dashboard.reviews.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                    <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('dashboard.search')</button>
                                    <a href="{{ route('dashboard.reviews.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($reviews->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('review.comment')</th>
                                <th>@lang('review.url')</th>
                                <th>@lang('review.satisfied')</th>
                                <th>@lang('review.status')</th>
                                <th>@lang('review.image')</th>
                                <th>@lang('review.action')</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($reviews as $index=>$review)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $review->comment }}</td>
                                    <td>{{ $review->url }}</td>
                                    <td>{{ $review->satisfied }}</td>
                                    <td>{{ $review->status }}</td>
                                    <td><img src="{{ $review->image_path_val }}" style="width: 100px;" class="img-thumbnail" alt=""></td>
                                    <td>
                                        <a href="{{ route('dashboard.reviews.edit', $review->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('dashboard.edit')</a>

                                        <form action="{{ route('dashboard.reviews.destroy', $review->id) }}" method="post" style="display: inline-block">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('dashboard.delete')</button>
                                        </form><!-- end of form -->

                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table><!-- end of table -->

                        {{ $reviews->appends(request()->query())->links() }}

                    @else

                        <h2>@lang('review.no_data_found')</h2>

                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
