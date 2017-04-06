@extends('layouts.master')
@section('breadcumbs')
<div class="row bg-title">
	<!-- .page title -->
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h4 class="page-title">Dashboard</h4>
	</div>
	<!-- /.page title -->
	<!-- .breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="{{ url('/'.Auth::user()->role->title.'/dashboard') }} ">Dashboard</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</div>
	<!-- /.breadcrumb -->
</div>
<!-- .row -->
@endsection
@section('css-top')
<link href="{{ asset('css/morris.css') }}" rel="stylesheet">
@endsection
@section('css')

@endsection

@section('content1')
<div class="row">
  <div class="col-md-12 col-lg-12 col-sm-12">
    <div class="white-box">
      <div class="row row-in"><h4 class="page-title text-center" style="font-size:150%;color:#77797B;">Weekly Reports</h4><hr>
        <div class="col-lg-3 col-sm-6 row-in-br">
          <div class="col-in row">
            <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic" ></i>
              <h5 class="text-muted vb">Total Clients</h5>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
              <h3 class="counter text-right m-t-15 text-danger">{{ $clients->where('created_at','>',Carbon\Carbon::now()->subWeek())->count() }}</h3>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="progress">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only">{{ $stats['success']}}% Complete (success)</span> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
          <div class="col-in row">
            <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe01b;"></i>
              <h5 class="text-muted vb">Appointments</h5>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
              <h3 class="counter text-right m-t-15 text-megna">{{ $stats['week-total']}}</h3>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="progress">
                <div class="progress-bar progress-bar-megna" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{ $stats['week-total']}}%"> <span class="sr-only">{{$stats['week-total']}} % Complete (success)</span> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 row-in-br">
          <div class="col-in row">
            <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe00b;"></i>
              <h5 class="text-muted vb">Reschedules</h5>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
              <h3 class="counter text-right m-t-15 text-primary">{{ $stats['week-rescheduled']}}</h3>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="progress">
                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only">40% Complete (success)</span> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6  b-0">
          <div class="col-in row">
            <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe016;"></i>
              <h5 class="text-muted vb">Success %</h5>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
              <h3 class="counter text-right m-t-15 text-success">{{ number_format($stats['success'],1)}}%</h3>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only">100% Complete (success)</span> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


@section('content2')

      <div class="row">
        <div class="col-md-8 col-lg-9 col-sm-6 col-xs-12">
          <div class="white-box">
             <h3 class="box-title">Last Month Sales</h3>
           {{--  <ul class="list-inline text-right">
              <li>
                <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>iPhone</h5>
              </li>
              <li>
                <h5><i class="fa fa-circle m-r-5" style="color: #fb9678;"></i>iPad</h5>
              </li>
              <li>
                <h5><i class="fa fa-circle m-r-5" style="color: #9675ce;"></i>iPod</h5>
              </li>
            </ul> --}}
            <div id="morris-area-chart2" style="height: 370px;"></div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
          <div  class="white-box">
            <h3 class="box-title">Invoices</h3>
             <ul class="list-inline">
              <li>
                <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>Paid</h5>
              </li>
              <li>
                <h5><i class="fa fa-circle m-r-5" style="color: #fb9678;"></i>Pending</h5>
              </li>
            </ul>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6  m-t-30">
                <h1 class="text-warning">TND {{  $invoices->Sum('total') }}</h1>
                <p class="text-muted">APRIL 2017</p>
                <b>({{ $invoices->total() }} Sales)</b> </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div id="sales1" class="text-center"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
          <div class="white-box">
            <h3 class="box-title">Sales Difference</h3>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6  m-t-30">
                <h1 class="text-info">$447</h1>
                <p class="text-muted">APRIL 2017</p>
                <b>(150 Sales)</b> </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div id="sales2" class="text-center"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('content4')
<div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
          <div class="white-box">
            <h3 class="box-title">Recent sales
              <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                <select class="form-control pull-right row b-none">
                  <option>March 2017</option>
                  <option>April 2017</option>
                  <option>May 2017</option>
                  <option>June 2017</option>
                  <option>July 2017</option>
                </select>
              </div>
            </h3>
            <div class="row sales-report">
              <div class="col-md-6 col-sm-6 col-xs-6">
                <h2>March 2017</h2>
                <p>SALES REPORT</p>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6 ">
                <h1 class="text-right text-success m-t-20">TND {{ $total  }} </h1>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table ">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>DATE</th>
                    <th>STATUS</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($invoices as $invoice)
                  <tr>
                    <td class="txt-oflo">{{ $invoice->id }}</td>
                    <td class="txt-oflo">{{ $invoice->created_at }} </td>
                    @if($invoice->status == 'paid')
                      <td><span class="label label-success label-rounded">{{ $invoice->status }}</span> </td>
                    @elseif($invoice->status == 'canceled')
                      <td><span class="label label-danger label-rounded">{{ $invoice->status }}</span> </td>
                    @else
                      <td><span class="label label-megna label-rounded">{{ $invoice->status }}</span> </td>
                    @endif
                    @if($invoice->status == 'paid')
                     <td><span class="text-success">TND {{ $invoice->total }}</span></td>
                    @elseif($invoice->status == 'canceled')
                      <td><span class="text-danger">TND {{ $invoice->total }}</span></td>
                    @else
                      <td><span class="text-info">TND {{ $invoice->total }}</span></td>
                    @endif
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
            <div class="col-md-offset-3">
              {{ $invoices->links() }}
             </div>
          </div>
        </div>
      </div>
@endsection


@section('content3')
 <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 pull-right">
          <div class="white-box">
            <h3 class="box-title">Sales Difference</h3>
            <ul class="list-inline text-right">
              <li>
                <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>Site A View</h5>
              </li>
              <li>
                <h5><i class="fa fa-circle m-r-5" style="color: #fdc006;"></i>Site B View</h5>
              </li>
            </ul>
            <div id="stats-container" style="height: 370px;"></div>
          </div>
        </div>
      </div>
      <!-- row -->
@endsection




@section('js')

<script src="{{ asset('js/charting.js') }}"></script>

<!-- Sparkline chart JavaScript -->
<script src="/js/libs/jquery.sparkline.min.js"></script>

<script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="//cdn.jsdelivr.net/spinjs/1.3.0/spin.min.js"></script>
<script type="text/javascript">

var areadata = {!! json_encode($area->toarray()) !!};
var miniDonut =  {!! json_encode($miniDonut) !!};
for (i = 0; i < areadata.length; ++i) {
  areadata[i].week = moment().day("Monday").week(areadata[i].period).format('YYYY-MM-DD');
}
$(document).ready(function () {
  var sparklineLogin = function () {
    $('#sales1').sparkline(miniDonut, {
      type: 'pie',
      height: '100',
      resize: true,
      sliceColors: ['#00bfc7', '#fb9678']
    });
    $('#sales2').sparkline([6, 10, 9, 11, 9, 10, 12], {
      type: 'bar',
      height: '154',
      barWidth: '4',
      resize: true,
      barSpacing: '10',
      barColor: '#25a6f7'
    });
  }
  var sparkResize;
  $(window).resize(function (e) {
    clearTimeout(sparkResize);
    sparkResize = setTimeout(sparklineLogin, 500);
  });
  sparklineLogin();
});
Morris.Area({
  element: 'morris-area-chart2',
  data: areadata,
  xkey: 'week',
  ykeys: ['total'],
  labels: ['Sales Total'],
  pointSize: 0,
  fillOpacity: 0.4,
  pointStrokeColors: ['#01c0c8'],
  behaveLikeLine: true,
  gridLineColor: 'rgba(255, 255, 255, 0.1)',
  lineWidth: 0,
  gridTextColor: '#96a2b4',
  smooth: false,
  hideHover: 'auto',
  lineColors: ['#01c0c8'],
  resize: true
});
$(function () {
  var spinTarget = document.getElementById('stats-container');

  function requestData(chart) {
    var spinner = new Spinner().spin(spinTarget);
    $.ajax({
      type: "GET",
      dataType: 'json',
      url: "/mark/api"
    }).done(function (data) {
      for (i = 0; i < data.length; ++i) {
        data[i].week = moment().day("Monday").week(data[i].date).format('MMM Do');
      }
      chart.setData(data);
    }).fail(function () {
      alert("error occured");
    }).always(function () {
      spinner.stop();
    });
  }
  var chart = Morris.Bar({
    element: 'stats-container',
    data: [0, 0],
    xkey: 'week',
    ykeys: ['done', 'pending', 'rescheduled'],
    labels: ['Done', 'Still Pending', 'Rescheduled'],
    fillOpacity: 0.6,
    hideHover: 'auto',
    behaveLikeLine: true,
    resize: true,
    pointFillColors: ['#ffffff'],
    pointStrokeColors: ['black'],
    barColors: ['#fecd36', '#AB8CE4', '#01c0c8'],
    xLabelMargin: 2
  });
  requestData(chart);
});

    </script>
@endsection
