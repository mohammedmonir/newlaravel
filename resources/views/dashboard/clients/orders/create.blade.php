@extends('dashboard.app')
@section('content')
<!-- محتوى الصفحة -->


<div class="content-wrapper">

    <section class="content-header">

        <h1> @lang('site.add')</h1>
        <ol class="breadcrumb">
            <li><a href="{{url('dashboard/index')}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
            <li><a href="{{url('dashboard/clients')}}">@lang('site.clients')</a></li>
            {{-- <li><a href="{{url('dashboard/orders')}}">@lang('site.orders')</a></li> --}}

        </ol>
    </section>

    <section class="content">

        <div class="box-body">
            
           <h1>body</h1>
           
        </div>

    </section>
</div>

@endsection