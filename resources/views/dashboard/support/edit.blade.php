@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.supports')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.supports.index') }}"> @lang('dashboard.supports')</a></li>
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

                    <form action="{{ route('dashboard.supports.update', $support->id) }}" method="post">

                        @csrf
                        @method("PUT")

                        <div class="form-group">
                            <label>@lang('support.title')</label>
                            <input type="text" name="title" class="form-control" value="{{ $support->title }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('support.description')</label>
                            <textarea type="text" name="description" class="form-control" rows="3">{{$support->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>@lang('support.location')</label>
                            <input type="text" name="location" class="form-control" value="{{ $support->location }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('support.email')</label>
                            <input type="email" name="email" class="form-control" value="{{ $support->email }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('support.phone')</label>
                            <input type="text" name="phone" class="form-control" value="{{ $support->phone }}">
                        </div>

                        <div class="form-group">
                            <label><input type="checkbox" name="status" @if($support->status == 1) checked @endif> @lang('support.status')</label>
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
