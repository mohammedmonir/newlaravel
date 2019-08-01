@extends('dashboard.app')
@section('content')
    <!-- محتوى الصفحة -->

  
    <div class="content-wrapper">
        <section class="content-header">
        <h1> @lang('site.products')</h1>

            <ol class="breadcrumb">
                <li><a href="{{url('dashboard/index')}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li class="active">@lang('site.products')</li>
            </ol>
        </section>

        <section class="content">

                 <div class="box box-info">

                        <div class="box-header with-border">

                            <h1 class="box-title" style='margin-bottom:1.5%'> @lang('site.products')</h1>

                            <small>( {{$products->total()}} )</small>

                            <form action="{{ route('products.index')}}" method='get'>

                                <div class='row'>

                                    <div class='col-md-4'>

                                        <input type="text" name="search" class='form-control' placeholder='@lang("site.search")' value='{{request()->search}}'>
                                    
                                    </div>

                                    <div class='col-md-4'>

                                        <button type='submit' class='btn btn-primary'><i class='fa fa-search'></i>@lang("site.search")</button>
                                        @if(auth()->user()->hasPermission('create-products'))
                                            <a href="{{route('products.create')}}" class='btn btn-primary'><i class='fa fa-plus'></i>@lang('site.add')</a>
                                        @else
                                            <a href="#" class='btn btn-primary disabled'><i class='fa fa-plus'></i>@lang('site.add')</a>
                                        @endif

                                    </div>
                                </div>

                            </form>

                        </div>

                        <div class="box-body">
                             @if($products->count() > 0)
                                <table class="table table-hover">
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>@lang('site.name')</th>
                                        <th>@lang('site.description')</th>
                                        <th>@lang('site.image')</th>
                                        <th>@lang('site.purchase_price')</th>
                                        <th>@lang('site.sale_price')</th>
                                        <th>@lang('site.stock')</th>
                                        <th>@lang('site.action')</th>
                                    </tr>
                                    @foreach($products as $index=>$product)
                                        <tr>
                                            <td>{{$index + 1}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{!!$product->description!!}</td>
                                            <td style="width:20%"><img src="{{$product->image_path}}" alt="" class='img-thumbnail' style='width:40%'></td>
                                            <td>{{$product->purchase_price}}</td>
                                            <td>{{$product->sale_price}}</td>
                                            <td>{{$product->stock}}</td>
                                            
                                           
                                            <td>
                                                @if(auth()->user()->hasPermission('update-products'))

                                                    <a href="{{route('products.edit',$product->id) }}" class='btn btn-info btn-sm' style='margin-left:10%'><i class='fa fa-edit'></i> @lang('site.edit')</a>
                                               
                                                
                                                @else

                                                  <button class='btn btn-danger disabled'><i class='fa fa-edit'></i> @lang('site.edit')</button>

                                                @endif


                                                @if(auth()->user()->hasPermission('delete-products'))
                                                
                                                    <form action="{{route('products.destroy',$product->id)}}" method='post' style='display:inline-block'>
                                                        {{ csrf_field() }}
                                                        {{ method_field('delete') }}
                                                        <button type='submit' class='btn btn-danger delete btn-sm'><i class='fa fa-trash'></i> @lang('site.delete')</button>
                                                    </form>

                                                @else

                                                  <button class='btn btn-danger disabled'><i class='fa fa-trash'></i> @lang('site.delete')</button>

                                               @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                    
                                </table>
                                {{$products->appends(request()->query())->links()}}

                             @else
                                <h2>@lang('site.no_data_found')</h2>
                             @endif
                               
                        </div>
                </div>
              
        </section>

    </div>



@endsection