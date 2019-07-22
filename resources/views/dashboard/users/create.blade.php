@extends('dashboard.app')
@section('content')
    <!-- محتوى الصفحة -->

  
    <div class="content-wrapper">
        <section class="content-header">
        <h1> @lang('site.create')</h1>

            <ol class="breadcrumb">
                <li><a href="{{url('dashboard/users')}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li><a href="#"><i class="fa fa-create"></i>@lang('site.create')</a></li>
             
            </ol>
        </section>
        <section class="content">
            {{"create"}}
        </section>
    </div>

@endsection