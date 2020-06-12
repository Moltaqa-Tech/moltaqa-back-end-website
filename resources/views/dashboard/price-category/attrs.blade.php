
@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <h1>{{$priceCategory->name}} Attributes</h1>
        </section>
        <section class="content">

            <div class="box box-primary">

                <div class="box-body">

                    @if ($priceAttrs->count() > 0)


                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('price-category.name')</th>
                                <th>@lang('price-category.active')</th>
                                <th>@lang('price-category.status')</th>
                            </tr>
                        </thead>

                        <form action="{{ url('dashboard/category-attrs') }}" method="post" style="display: inline-block">
                            @csrf
                            @method("POST")
                            <tbody>
                            @foreach ($priceAttrs as $index=>$priceAttr)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $priceAttr->name }}</td>
                                    <td>
                                        <input type="checkbox" name="attrs[]" value="{{$priceAttr->id}}" @if(in_array($priceAttr->id, $activePriceAttrs))  checked @endif>
                                    </td>
                                    <td>
                                        <input type="checkbox" name="cases[]" value="{{$priceAttr->id}}" @if(in_array($priceAttr->id, $activePriceCases))  checked @endif>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>

                    </table><!-- end of table -->

                <input type="hidden" name="category_id" value="{{$priceCategory->id}}">
                        <button  type="submit" class="btn btn-primary"><i class="fa fa-save"></i> @lang('dashboard.save')</button>
                    </form><!-- end of form -->


                    @else

                        <h2>@lang('price-attribute.no_data_found')</h2>

                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
