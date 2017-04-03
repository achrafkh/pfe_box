<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
   <head>
      @yield('css-top')
      @include('layouts.partials.head')
      @yield('css')
      <style type="text/css">
      </style>
   </head>
   <body>
      <!-- Preloader -->
      {{-- <div class="preloader">
         <div class="cssload-speeding-wheel"></div>
      </div> --}}
      <div id="wrapper">
         <!-- Top Navigation -->
         @include('layouts.partials.topbar')
         <!-- End Top Navigation -->
         <!-- Main navbar-header -->
         @include('layouts.partials.navbar')
         <!-- Main navbar-header end -->
         <!-- Page Content -->
         <div id="page-wrapper">
            
            <div class="container-fluid">
               @include('partials.alerts')
               @yield('breadcumbs')
               @yield('content1')
               @yield('content2')
               @yield('content3')
               @yield('content4')
            </div>
            <!-- /.container-fluid -->
            @include('layouts.partials.footer')
         </div>
         <!-- /#page-wrapper -->
      </div>
      <!-- /#wrapper -->
      @include('layouts.partials.scripts')
      @yield('js')
      <script type="text/javascript">
      var msgs = false;
      </script>
      @if(Session::has('success') || Session::has('error'))
      <script type="text/javascript">
      msgs = true;
      </script>
      @endif
      
      <script type="text/javascript">

      if(msgs){
      $("#alerttopright").fadeToggle(350);
      }
      $(".myadmin-alert .closed").click(function (event) {
            $(this).parents(".myadmin-alert").fadeToggle(350);
            return false;
        });
      </script>
   </body>
</html>