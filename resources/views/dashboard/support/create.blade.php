@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.supports')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.supports.index') }}"> @lang('dashboard.supports')</a></li>
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

                    <form action="{{ route('dashboard.supports.store') }}" method="post">

                        @csrf
                        @method("POST")

                        @foreach (config('translatable.locales') as $locale)
                        <div class="form-group">
                            <label>@lang('support.' . $locale . '.title')</label>
                            <input type="text" name="{{ $locale }}[title]" class="form-control" value="{{ old($locale . '.title') }}">
                        </div>
                        @endforeach

                        @foreach (config('translatable.locales') as $locale)
                        <div class="form-group">
                            <label>@lang('support.' . $locale . '.desc')</label>
                            <textarea type="text" name="{{ $locale }}[description]" rows="5" class="form-control" value="{{ old($locale . '.description') }}"></textarea>
                        </div>
                        @endforeach

                        @foreach (config('translatable.locales') as $locale)
                            <div class="form-group">
                                <label>@lang('support.' . $locale . '.location')</label>
                                <input type="text" name="{{ $locale }}[location]" class="form-control" value="{{ old($locale . '.location') }}">
                            </div>
                        @endforeach

                        <div class="form-group">
                            <label>@lang('support.email')</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('support.phone')</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                        </div>

                        <div class="form-group">
                            <label><input type="checkbox" name="status" checked> @lang('portofolio.status')</label>
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
