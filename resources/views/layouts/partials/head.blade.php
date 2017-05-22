<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="/logo.jpg">
<title>{{ config('app.name', 'Laravel') }}</title>
<!-- Bootstrap Core CSS -->

{{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
 --}}<meta id="crsf_token" name="_token" content="{{ csrf_token() }}">
<!-- This is Sidebar menu CSS -->
<!-- This is a Animation CSS -->
{{-- <link href="/assets/css/animate.css" rel="stylesheet">
 --}}<!-- Custom CSS -->
{{-- <link href="/assets/css/style1.css" rel="stylesheet">
 --}}<!-- color CSS you can use different color css from /css/colors folder -->
<!-- We have chosen the skin-blue (megna.css) for this starter
page. However, you can choose any other skin from folder css / colors .
-->
{{-- <link href="/assets/css/colors/blue.css" id="theme"  rel="stylesheet"> --}}
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
	
<link href="{{ asset('css/app.css') }}" rel="stylesheet"  media="none" onload="if(media!='all')media='all'">
<link href="{{ asset('css/main.css') }}" rel="stylesheet"  media="none" onload="if(media!='all')media='all'">
<style type="text/css">
    		.preloader {
    		    width: 100%;
    		    height: 100%;
    		    top: 0;
    		    position: fixed;
    		    z-index: 99999;
    		    background: #fff
    		}
    
    		.preloader .cssload-speeding-wheel {
    		    position: absolute;
    		    top: calc(50% - 3.5px);
    		    left: calc(50% - 3.5px)
    		}
</style>
