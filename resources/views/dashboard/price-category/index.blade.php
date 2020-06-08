
@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <h1>@lang('dashboard.price-categories')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li class="active">@lang('dashboard.price-categories')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.price-categories') <small>{{ $priceCategories->total() }}</small></h3>

                    <form action="{{ route('dashboard.price-categories.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                    <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('dashboard.search')</button>
                                    <a href="{{ route('dashboard.price-categories.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($priceCategories->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('price-category.name')</th>
                                <th>@lang('price-category.price')</th>
                                <th>@lang('price-category.saved_price')</th>
                                <th>@lang('price-category.price_type')</th>
                                <th>@lang('price-category.category_attributes')</th>
                                <th>@lang('price-category.status')</th>
                                <th>@lang('price-category.action')</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($priceCategories as $index=>$category)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->price }} $</td>
                                    <td>{{ $category->saved_price }} $</td>
                                    <td>{{ \App\Mappers\PricingType::handle($category->price_type) }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.price-categories.show', $category->id) }}" class="btn btn-info btn-sm"><i class="fa fa-view"></i> @lang('price-category.view_attrs')</a>
                                    </td>
                                    <td>{{ \App\Mappers\ActiveStatus::handle($category->status) }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.price-categories.edit', $category->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('dashboard.edit')</a>

                                        <form action="{{ route('dashboard.price-categories.destroy', $category->id) }}" method="post" style="display: inline-block">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('dashboard.delete')</button>
                                        </form><!-- end of form -->

                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table><!-- end of table -->

                        {{ $priceCategories->appends(request()->query())->links() }}

                    @else

                        <h2>@lang('price-category.no_data_found')</h2>

                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
