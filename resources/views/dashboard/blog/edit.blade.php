@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.blogs')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.blogs.index') }}"> @lang('dashboard.blogs')</a></li>
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

                    <form action="{{ route('dashboard.blogs.update', $blog->id) }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method("PUT")

                        @foreach (config('translatable.locales') as $locale)
                            <div class="form-group">
                                <label>@lang('blog.' . $locale . '.title')</label>
                                <input type="text" name="{{ $locale }}[title]" class="form-control" value="{{ $blog->translate($locale)->title }}">
                            </div>
                        @endforeach

                        @foreach (config('translatable.locales') as $locale)
                            <div class="form-group">
                                <label>@lang('blog.' . $locale . '.brief_desc')</label>
                                <textarea type="text" name="{{ $locale }}[brief_description]" rows="5" class="form-control">{{ $blog->translate($locale)->brief_description }}</textarea>
                            </div>
                        @endforeach

                        @foreach (config('translatable.locales') as $locale)
                            <div class="form-group">
                                <label>@lang('blog.' . $locale . '.desc')</label>
                                <textarea type="text" name="{{ $locale }}[description]" rows="5" class="form-control">{{ $blog->translate($locale)->description }}</textarea>
                            </div>
                        @endforeach

                        <div class="form-group">
                            <label><input type="checkbox" name="status" @if($blog->status) checked @endif> @lang('blog.status')</label>
                        </div>

                        <div class="form-group">
                            <label>@lang('blog.image')</label>
                            <input type="file" name="image" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{ $blog->image_path_val }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
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
