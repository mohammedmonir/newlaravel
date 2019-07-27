<footer class="main-footer">
        <div class="pull-left hidden-xs">
          <b>Version</b> 2.2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
    
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{url('/')}}/dashboard/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.4 -->
    <script src="{{url('/')}}/dashboard/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{url('/')}}/dashboard/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="{{url('/')}}/dashboard/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="{{url('/')}}/dashboard/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{url('/')}}/dashboard/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{url('/')}}/dashboard/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{url('/')}}/dashboard/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="{{url('/')}}/dashboard/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{url('/')}}/dashboard/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="{{url('/')}}/dashboard/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="{{url('/')}}/dashboard/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{url('/')}}/dashboard/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{url('/')}}/dashboard/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{url('/')}}/dashboard/dist/js/demo.js"></script>


    <script>//confirm deleted
          $('.delete').click(function (e) {

              var that = $(this)

              e.preventDefault();

              var n = new Noty({
                  text: "@lang('site.confirm_delete')",
                  type: "warning",
                  killer: true,
                  buttons: [
                      Noty.button("@lang('site.yes')", 'btn btn-success mr-2', function () {
                          that.closest('form').submit();
                      }),

                      Noty.button("@lang('site.no')", 'btn btn-primary mr-2', function () {
                          n.close();
                      })
                  ]
              });

              n.show();

          });//end of delete


          $(".image").change(function () {
        
            if (this.files && this.files[0]) {
                var reader = new FileReader();
        
                reader.onload = function (e) {
                    $('.image-preview').attr('src', e.target.result);
                }
        
                reader.readAsDataURL(this.files[0]);
            }
        
          });
    
    </script>
    
  </body>
</html>
