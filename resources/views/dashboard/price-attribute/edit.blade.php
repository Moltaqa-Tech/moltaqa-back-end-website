@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.price-attributes')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.price-attrs.index') }}"> @lang('dashboard.price-attributes')</a></li>
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

                    <form action="{{ route('dashboard.price-attrs.update', $priceAttr->id) }}" method="post">

                        @csrf
                        @method("PUT")

                        <div class="form-group">
                            <label>@lang('price-attribute.name')</label>
                            <input type="text" name="name" class="form-control" value="{{ $priceAttr->name }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('price-attribute.price_type')</label>
                            <select class="form-control" name="price_type" id="price_type">
                                <option value="1" @if($priceAttr->price_type == 1) selected @endif>Website Pricing</option>
                                <option value="2" @if($priceAttr->price_type == 2) selected @endif>Host Pricing</option>
                            </select>
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
