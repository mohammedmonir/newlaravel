@extends('dashboard.app')
@section('content')
<!-- محتوى الصفحة -->


<div class="content-wrapper">

    <section class="content-header">

        <h1> @lang('site.add')</h1>
        <ol class="breadcrumb">
            <li><a href="{{url('dashboard/index')}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
            <li><a href="{{url('dashboard/products')}}">@lang('site.products')</a></li>
            <li><a href="{{url('dashboard/products/create')}}">@lang('site.add')</a></li>

        </ol>
    </section>

    <section class="content">

        <div class="box-body">

            @include('dashboard.layouts.errors')

            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('post') }}

                <div class="form-group">

                    <label>@lang('site.categories')</label>

                    <select name="category_id" class='form-control' style='height:20%'>

                         <option value="">@lang('site.all_categories')</option>
                         
                             @foreach ($categories as $category)
                            
                                <option value="{{$category->id}}" {{old('category_id')==$category->id?'selected':''}}>{{$category->name}}</option>

                            @endforeach

                    </select>

                </div>



                @foreach(config('translatable.locales') as $locale)

                    <div class='form-group'>
                        <label>@lang('site.'.$locale.'.name')</label>
                        <input type="text" name="{{ $locale }}[name]" class='form-control' value='{{old($locale.".name")}}'>
                    </div>

                    <div class='form-group'>
                        <label>@lang('site.'.$locale.'.description')</label>
                        <textarea name="{{ $locale }}[description]" class='form-control ckeditor'>{{old($locale.".description")}}</textarea>
                    </div>

                @endforeach

                <div class='form-group'>
                        <label>@lang('site.image')</label>
                        <input type="file" name="image" class='form-control image'>
                </div>
    
                <div class='form-group'>
                    <img src="{{asset('uploads/product_images/default.jpg')}}" style='width:10%' class='img-thumbnail image-preview' alt="">
                </div>

                <div class='form-group'>
                        <label>@lang('site.purchase_price')</label>
                        <input type="number" name="purchase_price" step='0.01' class='form-control' value="{{old('purchase_price')}}">
                </div>

                <div class='form-group'>
                        <label>@lang('site.sale_price')</label>
                        <input type="number" name="sale_price" step='0.01' class='form-control' value="{{old('sale_price')}}">
                </div>

                <div class='form-group'>
                        <label>@lang('site.stock')</label>
                        <input type="number" name="stock"  step='0.01' class='form-control' value="{{old('stock')}}">
                </div>


                <div class='form-group'>
                    <button type='submit' class='btn btn-primary'><i class='fa fa-plus'></i>@lang("site.add")</button>
                </div>
            </form>
        </div>

    </section>
</div>

@endsection