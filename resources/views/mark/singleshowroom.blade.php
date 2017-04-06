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
			<li class=""><a href="{{ url('/'.Auth::user()->role->title.'/showrooms') }} ">Showrooms</a></li>
			<li class="active">Viewing {{ $showroom->city }}</li>
		</ol>
	</div>
	<!-- /.breadcrumb -->
</div>
<!-- .row -->
@endsection
@section('css-top')
<link href="{{ asset('css/morris.css') }}" rel="stylesheet">
@endsection

@section('content1')

      <!-- /.row -->
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="white-box">
            <h3 class="box-title"><i class="ti-shopping-cart text-success"></i> Paiements Received</h3>
            <div class="text-right"> <span class="text-muted">Last week</span>
              <h1><sup><i class="ti-arrow-up text-success"></i></sup> 12,000</h1>
            </div>
            <span class="text-success">20%</span>
            <div class="progress m-b-0">
              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:20%;"> <span class="sr-only">20% Complete</span> </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="white-box">
            <h3 class="box-title"><i class="ti-cut text-danger"></i> Canceled Paiements</h3>
            <div class="text-right"> <span class="text-muted">Last week</span>
              <h1><sup><i class="ti-arrow-down text-danger"></i></sup> $5,000</h1>
            </div>
            <span class="text-danger">30%</span>
            <div class="progress m-b-0">
              <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:30%;"> <span class="sr-only">230% Complete</span> </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="white-box">
            <h3 class="box-title"><i class="ti-wallet text-info"></i> Total Sales</h3>
            <div class="text-right"> <span class="text-muted">Monthly Revenue</span>
              <h1><sup><i class="ti-arrow-up text-info"></i></sup> $10,000</h1>
            </div>
            <span class="text-info">60%</span>
            <div class="progress m-b-0">
              <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span class="sr-only">20% Complete</span> </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="white-box">
            <h3 class="box-title"><i class="ti-stats-up"></i> Total Sales</h3>
            <div class="text-right"> <span class="text-muted">Yearly Income</span>
              <h1><sup><i class="ti-arrow-up text-inverse"></i></sup> $9,000</h1>
            </div>
            <span class="text-inverse">80%</span>
            <div class="progress m-b-0">
              <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">230% Complete</span> </div>
            </div>
          </div>
        </div>
      </div>

      <!--row -->
@endsection

@section('content2')
      <!--row -->
      <div class="row">
        <div class="col-md-7 col-lg-8 col-sm-12 col-xs-12">
          <div class="white-box">
            <h3 class="box-title">Sales</h3>
{{--             <ul class="list-inline text-center">
              <li>
                <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>iMac</h5>
              </li>
              <li>
                <h5><i class="fa fa-circle m-r-5" style="color: #b4becb;"></i>iPhone</h5>
              </li>
            </ul> --}}

            <div id="morris-area-chart2" style="height: 370px;"></div>
          </div>
        </div>
       <div class="col-md-5 col-lg-4 col-sm-12 col-xs-12">
          <div class="white-box">
              <h3 class="box-title">Appointments Stats</h3>
             <div id="morris-donut-chart" class="ecomm-donute" style="height: 250px;"></div>
				<ul class="list-inline m-t-30 text-center">
					<li class="p-r-20">
						<h5 class="text-muted"><i class="fa fa-circle" style="color: rgb(153, 214, 131);"></i>Done</h5>
						<h4 id="Done" class="m-b-0">0</h4>
					</li>
					<li class="p-r-20">
						<h5 class="text-muted"><i class="fa fa-circle" style="color: #FB9678;"></i>rescheduled</h5>
						<h4 id="resc" class="m-b-0">0</h4>
					</li>
					<li>
						<h5 class="text-muted"> <i class="fa fa-circle" style="color: rgb(97, 100, 193);"></i> Pending</h5>
						<h4 id="pending" class="m-b-0">0</h4>
					</li>
				</ul>
          </div>
       </div>         
      </div>
      <!-- row -->
      <div class="row">
          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
              <div class="white-box">
                  <h3 class="box-title">Invoices Overview</h3>
             <div class="table-responsive">
              <table class="table product-overview">
                <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($showroom->invoices->take(5) as $invoice)
                  <tr>
                    <td>#{{ $invoice->id }}</td>
                    <td>{{ $invoice->total }}</td>                    
                    <td>{{ $invoice->created_at->format('Y/M/d') }}</td>
                    <td>
                      @if($invoice->status == 'done')
                        <span class="label label-success font-weight-100">Paid</span>
                      @elseif($invoice->status =='pending')
                        <span class="label label-primary font-weight-100">Pending</span>
                      @else
                        <span class="label label-danger font-weight-100">Canceled</span>
                      @endif
                    </td>
                    <td><a href="{{ url('invoice/'.$invoice->showroom_id.'/'.$invoice->appointment_id) }} " class="text-inverse p-r-10" data-toggle="tooltip" title="Edit" ><i class="ti-zoom-in"></i></a></td>

                  </tr>
                  @endforeach
                 
                </tbody>
              </table>

              </div>
              </div>
          </div>  
      </div>

     
@endsection

@section('js')
<script src="{{ asset('js/charting.js') }}"></script>



<script type="text/javascript">

var areadata = {!! json_encode($area->toarray()) !!};
var donut = {!! json_encode($donut) !!};

if (donut[0].value || donut[1].value || donut[2].value) {
	$('#pending').text(donut[2].value);
	$('#resc').text(donut[1].value);
	$('#done').text(donut[0].value);
	Morris.Donut({
		element: 'morris-donut-chart',
		data: donut,
		resize: true,
		colors: ['#99d683', '#FB9678', '#6164c1']
	});
} else {
	$('#morris-donut-chart').html('<h1 style="margin-top:40%;">Not enough data to Render The Chart</h1>').addClass('text-center');
}
for (i = 0; i < areadata.length; ++i) {
  areadata[i].week = moment().day("Monday").week(areadata[i].period).format('YYYY-MM-DD');
}
// Dashboard 1 Morris-chart

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


</script>
@endsection