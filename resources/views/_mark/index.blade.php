@extends('layouts.app')

@section('content')

<link href="{{ asset('css/morris.css') }}" rel="stylesheet">
 <!-- Page Heading -->
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">
    Dashboard <small>Overview</small>
    </h1>
  </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
<div class="col-md-3 col-lg-3"><h3>Finished apps % </h3> <p>{{ number_format($rd1,2)}} %</p></div>
<div class="col-md-3 col-lg-3"><h3>This month apps/ All time apps</h3> <p>{{ number_format($rd2,2)}} %</p></div>
<div class="col-md-3 col-lg-3"><h3>App average per Client</h3> <p>{{ round($rd3)}}</p></div>
<div class="col-md-3 col-lg-3"><h3>Txx d croi</h3> <p>{{ number_format($rd4,2)}} %</p></div>
</div>

<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
  
  <h3 class="box-title">Appointments by Date </h3>
  
  <div id="stats-container" style="height: 370px;"></div>
  
</div>
<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
  
  <h3 class="box-title">Appointments by Count </h3>
  
  <div id="morris-donut-chart" style="height: 370px;"></div>
</div>
       


@endsection
@section('js')
<script src="{{ asset('js/charting.js') }}"></script>
<script src="//cdn.jsdelivr.net/spinjs/1.3.0/spin.min.js"></script>

<script type="text/javascript">
var donut = {!! json_encode($donut) !!};
    Morris.Donut({
        element: 'morris-donut-chart',
        data: donut,
        resize: true,
        colors:['#99d683', '#13dafe', '#6164c1']
    });

    $(function () {
        var spinTarget = document.getElementById('stats-container');
        function requestData( chart) {
            var spinner = new Spinner().spin(spinTarget);
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/mark/api"
            })
                .done(function (data) {
                    for (i = 0; i < data.length; ++i) {
                        data[i].week = moment().day("Monday").week(data[i].date).format('MMM Do');
                    }
                    chart.setData(data);
                })
                .fail(function () {
                    alert("error occured");
                })
                .always(function () {
                    spinner.stop();
                });
        }
        var chart = Morris.Bar({
            element: 'stats-container',
            data: [0, 0], 
              xkey: 'week',
              ykeys: ['done','pending','rescheduled'],
              labels: ['Done', 'Still Pending', 'Rescheduled'],
              fillOpacity: 0.6,
              hideHover: 'auto',
              behaveLikeLine: true,
              resize: true,
              pointFillColors:['#ffffff'],
              pointStrokeColors: ['black'],
              barColors: ["#1AB244", "#1531B2","#B21516"],
              xLabelMargin: 2


        });

        requestData(chart);
    });

    </script>

@endsection

