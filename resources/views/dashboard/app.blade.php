@include('dashboard.layouts.header')
@include('dashboard.layouts.navbar')
@include('dashboard.layouts.menusidebar')
@include('dashboard.layouts.errors')



 
  
  <div class="content-wrapper">
      <section class="content">
        <!-- محتوى الصفحة -->
          @yield('content')
      </section>
  </div>
  

  

  @include('dashboard.layouts.footer')
  