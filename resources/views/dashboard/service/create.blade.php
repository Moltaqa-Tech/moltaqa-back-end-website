@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.services')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.services.index') }}"> @lang('dashboard.services')</a></li>
                <li class="active">@lang('dashboard.add')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('dashboard.add')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    @include('partials.dashboard._errors')

                    <form action="{{ route('dashboard.services.store') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method("POST")

                        <div class="form-group">
                            <label>@lang('service.title')</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('service.desc')</label>
                            <textarea type="text" name="desc" class="form-control" rows="5">{{ old('desc') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label><input type="checkbox" name="work_flow"> @lang('service.work_flow')</label>
                        </div>

                        <div class="form-group">
                            <label><input type="checkbox" name="status" checked> @lang('service.status')</label>
                        </div>

                        <div class="form-group">
                            <label><input type="checkbox" name="locale" > @lang('dashboard.arabic')</label>
                        </div>

                        <div class="form-group">
                            <label>@lang('service.image')</label>
                            <input type="file" name="image" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{ asset('uploads/services/default.png') }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
