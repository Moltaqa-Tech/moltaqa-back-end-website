@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.porto-categories')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.portofolio-categories.index') }}"> @lang('dashboard.porto-categories')</a></li>
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

                    <form action="{{ route('dashboard.portofolio-categories.update', $portofolioCategory->id) }}" method="post">

                        @csrf
                        @method("PUT")

                        @foreach (config('translatable.locales') as $locale)
                            <div class="form-group">
                                <label>@lang('porto-category.' . $locale . '.name')</label>
                                <input type="text" name="{{ $locale }}[name]" class="form-control" value="{{ $portofolioCategory->translate($locale)->name }}">
                            </div>
                        @endforeach

                        <div class="form-group">
                            <label><input type="checkbox" name="status" @if($portofolioCategory->status) checked @endif> @lang('porto-category.status')</label>
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
