@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.reviews')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.reviews.index') }}"> @lang('dashboard.reviews')</a></li>
                <li class="active">@lang('dashboard.edit')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('dashboard.edit')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    @include('partials.dashboard._errors')

                    <form action="{{ route('dashboard.reviews.update', $review->id) }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method("PUT")

                        @foreach (config('translatable.locales') as $locale)
                            <div class="form-group">
                                <label>@lang('review.' . $locale . '.comment')</label>
                                <textarea type="text" name="{{ $locale }}[comment]" rows="3" class="form-control" >{{ $review->translate($locale)->comment }}</textarea>
                            </div>
                        @endforeach
                        {{-- <div class="form-group">
                            <label>@lang('review.comment')</label>
                            <textarea type="text" name="comment" rows="3" class="form-control" >{{ $review->comment }}</textarea>
                        </div> --}}


                        <div class="form-group">
                            <label>@lang('review.url')</label>
                            <input type="url" name="url" class="form-control" value="{{ $review->url }}">
                        </div>


                        <div class="form-group">
                            <label><input type="checkbox" name="satisfied" @if($review->satisfied) checked @endif> @lang('review.satisfied')</label>
                        </div>

                        <div class="form-group">
                            <label><input type="checkbox" name="status" @if($review->status) checked @endif> @lang('review.status')</label>
                        </div>

                        <div class="form-group">
                            <label>@lang('review.image')</label>
                            <input type="file" name="image" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{ $review->image_path_val }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('dashboard.edit')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
