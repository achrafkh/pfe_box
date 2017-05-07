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
      body {
         font-family: "Helvetica Neue",Roboto,Arial,"Droid Sans",sans-serif !important;
      }
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
   <script type="text/javascript">
      function showAlert(status, heading,body) {
         var icon = 'error';
         if (status == 'success') {
            icon = 'success';
         }
         $.toast({
            heading: heading,
            text: body,
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: icon,
            hideAfter: 6000,
            stack: 6
         });
      };
   </script>
   @if(Session::has('flash'))
      <script type="text/javascript">
         var msg = {!! json_encode(Session::get('flash'))  !!};
         showAlert( 'success','Success',msg);
      </script>
   @endif
   <script type="text/javascript">
      $("ul.nav a").removeClass('active');
         var e = window.location,
                i = $("ul.nav a").filter(function() {
                    return (this.pathname == e.pathname);
                }).addClass("active").parent().parent().addClass("in").parent();
            i.is("li") && i.addClass("active");
   </script>
   </body>
</html>