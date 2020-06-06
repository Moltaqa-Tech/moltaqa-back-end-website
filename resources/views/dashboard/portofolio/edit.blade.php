@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.portofolios')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.portofolios.index') }}"> @lang('dashboard.portofolios')</a></li>
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

                    <form action="{{ route('dashboard.portofolios.update', $portofolio->id) }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method("PUT")

                        <div class="form-group">
                            <label>@lang('portofolio.title')</label>
                            <input type="text" name="title" class="form-control" value="{{ $portofolio->title }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('portofolio.desc')</label>
                            <textarea type="text" name="description" class="form-control" rows="5">{{ $portofolio->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>@lang('portofolio.category_name')</label>
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach ($portofolioCategories as $category)
                                    <option value="{{$category->id}}" @if($portofolio->category_id == $category->id) selected @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label><input type="checkbox" name="status" @if($portofolio->status == 1) checked @endif> @lang('portofolio.status')</label>
                        </div>

                        <div class="form-group">
                            <label>@lang('portofolio.image')</label>
                            <input type="file" multiple="multiple" name="images[]" class="form-control images">
                        </div>

                        <div id="galary" class="form-group">
                            @foreach ($portofolio->images as $image)
                                <img src="{{ $image->image_path_val }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
                            @endforeach
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
