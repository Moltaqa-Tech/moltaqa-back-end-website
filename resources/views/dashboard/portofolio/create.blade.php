@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.portofolios')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.portofolios.index') }}"> @lang('dashboard.portofolios')</a></li>
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

                    <form action="{{ route('dashboard.portofolios.store') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method("POST")

                        @foreach (config('translatable.locales') as $locale)
                            <div class="form-group">
                                <label>@lang('portofolio.' . $locale . '.title')</label>
                                <input type="text" name="{{ $locale }}[title]" class="form-control" value="{{ old($locale . '.title') }}">
                            </div>
                        @endforeach

                        @foreach (config('translatable.locales') as $locale)
                            <div class="form-group">
                                <label>@lang('portofolio.' . $locale . '.desc')</label>
                                <textarea type="text" name="{{ $locale }}[description]" rows="5" class="form-control" value="{{ old($locale . '.description') }}"></textarea>
                            </div>
                        @endforeach

                        <div class="form-group">
                            <label>@lang('portofolio.category_name')</label>
                            <select class="form-control" multiple name="categories[]" id="category_id" size="5">
                                @foreach ($portofolioCategories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label><input type="checkbox" name="status" checked> @lang('portofolio.status')</label>
                        </div>

                        <div class="form-group">
                            <label>@lang('portofolio.image')</label>
                            <input type="file" multiple="multiple" name="images[]" class="form-control images">
                        </div>

                        <div id="galary" class="form-group">
                            <img src="{{ asset('uploads/portofolios/default.png') }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
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
