@extends('dashboard.app')
@section('content')
    <!-- محتوى الصفحة -->

  
    <div class="content-wrapper">

        <section class="content-header">

               <h1> @lang('site.edit')</h1>
                <ol class="breadcrumb">
                <li><a href="{{url('dashboard/index')}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li><a href="{{url('dashboard/users')}}">@lang('site.users')</a></li>
                <li><a href="#">@lang('site.edit')</a></li>
             
            </ol>
        </section>

        <section class="content">

            <div class="box-body">

                @include('dashboard.layouts.errors')    

             
                <form action="{{ route('users.update', $user->id) }}" method="POST"  >
                     {{ method_field('put') }}
                    {{ csrf_field() }}
                  

                    <div class='form-group'>
                        <label>@lang('site.first_name')</label>
                        <input type="text" name="first_name" class='form-control' value='{{$user->first_name}}'>
                    </div>
                    
                    <div class='form-group'>
                        <label>@lang('site.last_name')</label>
                        <input type="text" name="last_name" class='form-control' value='{{$user->last_name}}'>
                    </div>

                    <div class='form-group'>
                        <label>@lang('site.email')</label>
                        <input type="email" name="email" class='form-control' value='{{$user->email}}'>
                    </div>

                    <div class='form-group'>

                        <label>@lang('site.permissions')</label>

                        <div class="nav-tabs-custom">
                        
                            @php
                                $models=['users','categories','products'];
                            @endphp

                            <ul class="nav nav-tabs">

                                @foreach($models as $index=>$model)
                                        <li class="{{$index==0 ?'active':''}}"><a href="#{{$model}}" data-toggle="tab">@lang('site.'.$model)</a></li>
                                @endforeach

                            </ul>

                        <div class="tab-content">

                            @foreach($models as $index=>$model)
                            
                                    <div class="tab-pane {{$index==0?'active':''}}" id="{{$model}}">

                                        <label><input type="checkbox" name='permissions[]' {{$user->hasPermission('create-'.$model)?'checked':''}} value='create-{{$model}}'> @lang('site.create')</label>
                                        <label><input type="checkbox" name='permissions[]' {{$user->hasPermission('read-'.$model)?'checked':''}} value='read-{{$model}}'> @lang('site.read')</label>
                                        <label><input type="checkbox" name='permissions[]' {{$user->hasPermission('update-'.$model)?'checked':''}} value='update-{{$model}}'> @lang('site.update')</label>
                                        <label><input type="checkbox" name='permissions[]' {{$user->hasPermission('delete-'.$model)?'checked':''}} value='delete-{{$model}}'> @lang('site.delete')</label>

                                    </div>

                            @endforeach      
                        </div><!-- /.tab-content -->

                    </div><!-- nav-tabs-custom -->
                    </div>

                    <div class='form-group'>
                        <button type='submit' class='btn btn-primary'> <i class='fa fa-edit'></i>@lang("site.edit")</button>
                    </div>
                </form>
            </div>

        </section>
    </div>

@endsection