@extends('layouts.master')
@section('css-top')
<link href="{{ asset('css/calendar/fullcalendar.css') }}" rel="stylesheet">
<link href="{{ asset('css/morris.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/libs/bootstrap-datepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/libs/bootstrap-clockpicker.css')}}">

@endsection
@section('breadcumbs')
<div class="row bg-title">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h4 class="page-title">Client Details</h4>
	</div>
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="{{ url('/') }} ">Dashboard</a></li>
			<li class="active">Client Details</li>
		</ol>
	</div>
	<!-- /.col-lg-12 -->
</div>
@endsection
<!-- .row -->
@section('content1')
<div class="row">
	<div class="col-md-4 col-xs-12">
		<div class="white-box">
			<div class="user-btm-box" style="margin-top: -15%;">
				<!-- .row -->
				<div class="row text-center m-t-10" >
					<div class="col-md-6 b-r"><strong>Name</strong><p>{{ucfirst($client->firstname) . ' ' . $client->lastname}}</p></div>
					<div class="col-md-6"><strong>Birthdate</strong><p>{{$client->birthdate}}</p></div>
				</div>
				<!-- /.row -->
				<hr>
				<!-- .row -->
				<div class="row text-center m-t-10">
					<div class="col-md-6 b-r"><strong>Email ID</strong><p>{{$client->email}}</p></div>
					<div class="col-md-6"><strong>Phone</strong><p>{{$client->phone}}</p></div>
				</div>
				<!-- /.row -->
				<hr>
				<!-- .row -->
				<div class="row text-center m-t-10">
					<div class="col-md-12"><strong>Address</strong><p>{{$client->address}}.</p></div>
					
				</div>
				<hr>
				<!-- /.row -->
				
				<!-- Start Donut chart  -->
				<h3 class="box-title text-center"><strong>Values :</strong></h3>
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
				<!-- end Donut chart -->
			</div>
		</div>
	</div>
	<div class="col-md-8 col-xs-12">
		<div class="white-box">
			<!-- .tabs -->
			<ul class="nav nav-tabs tabs customtab">
				<li class="active tab"><a href="{{url('op/client/'.$client->id)}}#profile" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Profile</span> </a> </li>
				{{-- <li class="tab"><a href="{{url('op/client/'.$client->id)}}#invoices" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Invoices History</span> </a> </li> --}}
				<li class="tab" id="edit-tab"><a href="{{url('op/client/'.$client->id)}}#edit" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Edit Details</span> </a> </li>
			</ul>
			<!-- /.tabs -->
			<div class="tab-content" id="cont">
				<!-- .tabs1 -->
				<div class="tab-pane active" id="profile">
					<div class="row">
						<div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong> <br>
							<p class="text-muted">{{ucfirst($client->firstname) . ' ' . $client->lastname}}</p>
						</div>
						<div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong> <br>
							<p class="text-muted">{{$client->phone}}</p>
						</div>
						<div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong> <br>
							<p class="text-muted">{{$client->email}}</p>
						</div>
						<div class="col-md-3 col-xs-6"> <strong>Location</strong> <br>
							<p class="text-muted">{{$client->city}}</p>
						</div>
					</div>
					<hr>
					<p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
					
					<h4 class="font-bold m-t-30">Client Invoices</h4>
					<hr>
					<div class="row">
					@if((bool) $client->invoices->count())
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Invoice #</th>
                                    <th>Client</th>
                                    <th>Showroom</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tbody>
                                    @foreach($client->invoices as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->appointment->client->firstname .' '.$item->appointment->client->lastname }}</td>
                                        <td>{{ $item->showroom->city }}</td>
                                        <td><span class="text-muted"><i class="fa fa-clock-o"></i>{{ $item->created_at->format('l jS \\of F Y ') }}</span> </td>
                                        
                                        @if($item->status == 'paid')
                                            <td><div class="label label-table label-success">{{ $item->status }}</div></td>
                                        @elseif($item->status == 'pending')
                                            <td><div class="label label-table label-primary">{{ $item->status }}</div></td>
                                        @else
                                            <td><div class="label label-table label-danger">{{ $item->status }}</div></td>
                                        @endif
                                        <td>TND {{ $item->total }}</td>
                                        <td>
                                            <a href="{{ url('/invoice/'. $item->showroom_id .'/'. $item->appointment_id) }}" title="View invoice"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </tbody>
                        </table>
                    </div>
                @else
                <div class="alert alert-warning">Currently There are no invoices . </div>
                @endif
					</div>
				</div>
				<!-- /.tabs1 -->
				<!-- .tabs2 -->
				<div class="tab-pane" id="edit">
					<form class="form-horizontal form-material" role="form" method="POST" action="{{ route('updateClient') }}">
						<input type="hidden" name="id" value="{{ $client->id }} ">
						
						@include('op.partials.clientForm')
					</form>
				</div>
				<!-- /.tabs2 -->
				<!-- tabs3 -->
{{-- 				<div class="tab-pane" id="invoices">
					
				</div> --}}
				<!-- /.tabs3 -->
			</div>
		</div>
	</div>
</div>
@endsection
@section('content2')
<style type="text/css">.fc th.fc-widget-header{background: #03A9F3;}.fc-unthemed .fc-today {background:  #dadbf1 !important;}</style>
<div class="row">
	<div class="panel panel-default">
		<div class="panel-heading">View Calendar
			<div class="panel-action"><a href="panels-wells.html#" data-perform="panel-collapse"><i class="ti-minus"></i></a> <a href="panels-wells.html#" data-perform="panel-dismiss"><i class="ti-close"></i></a></div>
		</div>
		<div class="panel-wrapper collapse in">
			<div class="panel-body">
				<div id="calendar"></div>
			</div>
		</div>
	</div>
</div>

<div id="responsive-modal-create" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Create Appointment</h4>
			</div>
			<div class="modal-body" id="create-spinner">
				<form id="create-appointment" class="form-horizontal calender" role="form">
					@include('op.partials.appointment-modal',['showrooms' => $showrooms,'action' => 'create'])
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" id="close-create" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-info " id="create-app">Save changes<i style="margin-left:2%;" class="" id="bt-spin"></i></button>
			</div>
		</div>
	</div>
</div>
<div id="responsive-modal-update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Update Appointment</h4>
			</div>
			<div class="modal-body" id="update-spinner">
				<form id="edit-appointment" class="form-horizontal calender" role="form">
					<input type="hidden" class="form-control" id="id" name="id" value="">
					@include('op.partials.appointment-modal',['showrooms' => $showrooms,'action' => 'update'])
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" id="close-update" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-info " id="edit-app">Save changes<i style="margin-left:2%;" class="" id="bt-spin2"></i></button>
			</div>
		</div>
	</div>
</div>

<div id="fc_create" data-toggle="modal" data-target="#responsive-modal-create"></div>
<div id="fc_edit" data-toggle="modal" data-target="#responsive-modal-update"></div>
@endsection
@section('js')
<script src="{{ asset('js/charting.js') }}"></script>
<script type="text/javascript" src="{{asset('js/libs/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/libs/bootstrap-clockpicker.js')}}"></script>

<script type="text/javascript">
var evs = {!! json_encode($calendar) !!};
var errors = {!! json_encode($errors->first()) !!};
var donut = {!! json_encode($donut) !!};
var userdate = {!! json_encode($client->birthdate) !!};
</script>
<script type="text/javascript" src="{{ url('/js/op/showclient.js') }} "></script>
@endsection