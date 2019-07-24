<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-right image">
              <img src="{{url('/')}}/dashboard/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p> @lang('site.myname')</p>
              <a href="#"><i class="fa fa-circle text-success"></i> @lang('site.online')</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="@lang('site.search')">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">@lang('site.list') </li>


            <li class="treeview">
                <a href="{{url('dashboard/index')}}">
                  <i class="fa fa-dashboard"></i> <span>@lang('site.dashboard')</span> <i class="fa fa-angle-left pull-left"></i>
                </a>
            </li>

            @if(auth()->user()->hasPermission('read-users'))
              <li class="treeview">
                  <a href="{{url('dashboard/users')}}"><span>@lang('site.users')</span><span class="label label-primary pull-left">۴</span> </a>
              </li>
            @endif
           
        </section>
        <!-- /.sidebar -->
      </aside>