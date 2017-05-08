<!DOCTYPE html>
<html lang="en">
   <head>
      @yield('css-top')
      @include('layouts.partials.head')
      @yield('css')
      <style type="text/css">
      body {
         font-family: "Helvetica Neue",Roboto,Arial,"Droid Sans",sans-serif !important;
      }
      </style>
   </head>
   <body>
      <!-- Preloader -->
      <div class="preloader">
         <div class="cssload-speeding-wheel"></div>
      </div>
      <div id="wrapper">
         <!-- Top Navigation -->
         @include('layouts.partials.topbar')
         <!-- End Top Navigation -->
         <!-- Main navbar-header -->
         @include('layouts.partials.navbar2')
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
   <script type="text/javascript" src="{{ url('/js/main.js') }} "></script>
   @if(Session::has('flash'))
      <script type="text/javascript">
         var msg = {!! json_encode(Session::get('flash'))  !!};
         showAlert( 'success','Success',msg);
      </script>
   @endif
   </body>
</html>