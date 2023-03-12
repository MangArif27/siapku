
<!DOCTYPE html>
<html lang="en">
@include('partials._head')

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col menu_fixed">
        <div class="left_col scroll-view">
          <!-- menu profile quick info -->
          @include('partials._profile')
          <!-- /menu profile quick info -->
          <br />
          <!-- sidebar menu -->
          @if(Session::get('status')=="ADMIN")
            @include('partials._sidebar_menu_admin')
          @elseif(Session::get('status')=="USER")
            @include('partials._sidebar_menu_user')
          <!-- /sidebar menu -->
          @endif
        </div>
      </div>
      <!-- top navigation -->
      @include('partials._top_navigation_user')
      <!-- /top navigation -->
      @if( Session::has('modal_message_error'))
      <script type="text/javascript">
          $(document).ready(function() {
              $('#popupmodal').modal();
          });
      </script>
      <!-- page content -->
      @yield('konten')
      <!-- /page content -->

      <!-- footer content -->
      @include('partials._footer')
      <!-- /footer content -->

    </div>
  </div>
</div>

@include('partials._script')
</body>
</html>
