@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.teams')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.teams.index') }}"> @lang('dashboard.teams')</a></li>
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

                    <form action="{{ route('dashboard.teams.update', $team->id) }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method("PUT")

                        <div class="form-group">
                            <label>@lang('team.name')</label>
                            <input type="text" name="name" class="form-control" value="{{ $team->name }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('team.job_title')</label>
                            <input type="text" name="job_title" class="form-control" value="{{ $team->job_title }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('team.instagram_url')</label>
                            <input type="url" name="instagram_url" class="form-control" value="{{ $team->instagram_url }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('team.whatsapp_url')</label>
                            <input type="url" name="whatsapp_url" class="form-control" value="{{ $team->whatsapp_url }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('team.facebook_url')</label>
                            <input type="url" name="facebook_url" class="form-control" value="{{ $team->facebook_url }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('team.twitter_url')</label>
                            <input type="url" name="twitter_url" class="form-control" value="{{ $team->twitter_url }}">
                        </div>

                        <div class="form-group">
                            <label><input type="checkbox" name="status" @if($team->status) checked @endif> @lang('team.status')</label>
                        </div>

                        <div class="form-group">
                            <label><input type="checkbox" name="locale" @if($team->locale == 'ar') checked @endif> @lang('dashboard.arabic')</label>
                        </div>

                        <div class="form-group">
                            <label>@lang('team.image')</label>
                            <input type="file" name="image" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{ $team->image_path_val }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
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
