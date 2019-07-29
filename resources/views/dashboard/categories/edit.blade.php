@extends('dashboard.app')
@section('content')
<!-- محتوى الصفحة -->


<div class="content-wrapper">

    <section class="content-header">

        <h1> @lang('site.edit')</h1>
        <ol class="breadcrumb">
            <li><a href="{{url('dashboard/index')}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
            <li><a href="{{url('dashboard/categories')}}">@lang('site.categories')</a></li>
            <li><a href="#">@lang('site.edit')</a></li>

        </ol>

    </section>

    <section class="content">
        <div class="box-body">

            @include('dashboard.layouts.errors')


            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                {{ method_field('put') }}
                {{ csrf_field() }}


                <div class='form-group'>
                    <label>@lang('site.name')</label>
                    <input type="text" name="name" class='form-control' value='{{$category->name}}'>
                </div>



                <div class='form-group'>
                    <button type='submit' class='btn btn-primary'> <i class='fa fa-edit'></i>@lang("site.edit")</button>
                </div>
            </form>
        </div>

    </section>
</div>

@endsection