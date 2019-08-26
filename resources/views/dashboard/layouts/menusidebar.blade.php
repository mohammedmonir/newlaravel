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


            @if(auth()->user()->hasPermission('read-categories'))

              <li class="treeview">
                  <a href="{{url('dashboard/categories')}}">
                    <i class="fa fa-dashboard"></i> <span>@lang('site.categories')</span> <i class="fa fa-angle-left pull-left"></i>
                  </a>
              </li>
              
              @endif

              
              
              @if(auth()->user()->hasPermission('read-products'))

                <li class="treeview">
                    <a href="{{url('dashboard/products')}}">
                      <i class="fa fa-plug"></i> <span>@lang('site.products')</span> <i class="fa fa-angle-left pull-left"></i>
                    </a>
                </li>
                
              @endif

                
              @if(auth()->user()->hasPermission('read-clients'))

                <li class="treeview">
                    <a href="{{url('dashboard/clients')}}">
                      <i class="fa fa-plug"></i> <span>@lang('site.clients')</span> <i class="fa fa-angle-left pull-left"></i>
                    </a>
                </li>
                
              @endif


                
              @if(auth()->user()->hasPermission('read-users'))

                  <li class="treeview">
                      <a href="{{url('dashboard/users')}}">
                        <i class="fa fa-adjust"></i> <span>@lang('site.users')</span> <i class="fa fa-angle-left pull-left"></i>
                      </a>
                  </li>
             
              @endif


              @if(auth()->user()->hasPermission('read-orders'))

                  <li class="treeview">
                      <a href="{{url('dashboard/orders')}}">
                        <i class="fa fa-adjust"></i> <span>@lang('site.orders')</span> <i class="fa fa-angle-left pull-left"></i>
                      </a>
                  </li>
             
              @endif

            

           
        </section>
        <!-- /.sidebar -->
      </aside>