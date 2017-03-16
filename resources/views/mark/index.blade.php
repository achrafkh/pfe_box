@extends('layouts.app')

@section('content')

<link href="{{ asset('css/morris.css') }}" rel="stylesheet">
 <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Overview</small>
                        </h1>
                        {{-- <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> User 
                            </li>
                        </ol> --}}
                    </div>
                </div>
        <div class="col-md-7 col-lg-8 col-sm-12 col-xs-12">
          <div class="white-box">
            <h3 class="box-title">Chart</h3>
            
            <div id="morris-area-chart" style="height: 370px;"></div>
          </div>
        </div>
@endsection
@section('js')
<script src="{{ asset('js/charting.js') }}"></script>

<script type="text/javascript">

Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2010',
            iphone: 50,
            ipad: 80,
            itouch: 20
        }, {
            period: '2011',
            iphone: 130,
            ipad: 100,
            itouch: 80
        }, {
            period: '2012',
            iphone: 80,
            ipad: 60,
            itouch: 70
        }, {
            period: '2013',
            iphone: 70,
            ipad: 200,
            itouch: 140
        }, {
            period: '2014',
            iphone: 180,
            ipad: 150,
            itouch: 140
        }, {
            period: '2015',
            iphone: 105,
            ipad: 100,
            itouch: 80
        },
         {
            period: '2016',
            iphone: 250,
            ipad: 150,
            itouch: 200
        }],
        xkey: 'period',
        ykeys: ['iphone', 'ipad', 'itouch'],
        labels: ['iPhone', 'iPad', 'iPod Touch'],
        pointSize: 3,
        fillOpacity: 0,
        pointStrokeColors:['#00bfc7', '#fb9678', '#9675ce'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 3,
        hideHover: 'auto',
        lineColors: ['#00bfc7', '#fb9678', '#9675ce'],
        resize: true
        
    });
</script>
@endsection