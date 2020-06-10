@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.price-categories')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.price-categories.index') }}"> @lang('dashboard.price-categories')</a></li>
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

                    <form action="{{ route('dashboard.price-categories.store') }}" method="post">

                        @csrf
                        @method("POST")

                        <div class="form-group">
                            <label>@lang('price-category.name')</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('price-category.price')</label>
                            <input type="number" name="price" min="0" step="0.01" class="form-control" value="{{ old('price') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('price-category.saved_price')</label>
                            <input type="number" name="saved_price" min="0" step="0.01" class="form-control" value="{{ old('saved_price') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('price-category.price_type')</label>
                            <select class="form-control" name="price_type" id="price_type">
                                <option value="1">Website Pricing</option>
                                <option value="2">Host Pricing</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><input type="checkbox" name="status" checked> @lang('price-category.status')</label>
                        </div>

                        <div class="form-group">
                            <label><input type="checkbox" name="locale" > @lang('dashboard.arabic')</label>
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
