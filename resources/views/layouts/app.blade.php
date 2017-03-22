<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta id="crsf_token" name="_token" content="{{ csrf_token() }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

      @include('partials.nav.navbar_'.Auth::user()->role->title)

        <div id="page-wrapper">

            <div class="container-fluid">

               
                <!-- /.row -->
            @include('partials.flash')
            @yield('content')

            @yield('content2')
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script src="{{ asset('js/app.js') }}"></script>
    
    <script type="text/javascript">
            var loc = window.location.pathname;
        $('#nav').find('a').each(function() {
            $(this).toggleClass('active', $(this).attr('href') == loc);
        });
    </script>

    @yield('js')
</body>

</html>