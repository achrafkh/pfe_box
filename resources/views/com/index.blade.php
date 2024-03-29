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
			<li><a href="{{ url('/') }} ">Dashboard</a></li>
			<li class="active">Appointments</li>
		</ol>
	</div>
	<!-- /.breadcrumb -->
</div>
<!-- .row -->
@endsection
@section('css-top')
<link href="{{ asset('css/calendar/fullcalendar.css') }}" rel="stylesheet">
@endsection
@section('css')
<style type="text/css">
.fc-event{
    cursor: pointer;
}
</style>
@endsection
@section('content1')
<div class="row">
	<div class="col-lg-12 col-sm-12 col-xs-12">
		<div class="row">
			<div class="col-lg-3 col-sm-3 col-xs-12">
				<div class="white-box">
					<h3 class="box-title">Agents N:</h3>
					<ul class="list-inline two-part">
						<li><i class="icon-people text-info"></i></li>
						<li class="text-right"><span class="counter" id="total-agents">{{$data['agents']}}</span></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-sm-3 col-xs-12">
				<div class="white-box">
					<h3 class="box-title">Pending Appointments</h3>
					<ul class="list-inline two-part">
						<li><i class="icon-folder text-purple"></i></li>
						<li class="text-right"><span class="counter" id="pending-apps">{{$data['pending']}}</span></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-sm-3 col-xs-12">
				<div class="white-box">
					<h3 class="box-title">Rescheduled Appointments</h3>
					<ul class="list-inline two-part">
						<li><i class="icon-folder-alt text-danger"></i></li>
						<li class="text-right"><span class="" id="resc-apps">{{$data['resc']}}</span></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-sm-3 col-xs-12">
				<div class="white-box">
					<h3 class="box-title">Finished Appointments</h3>
					<ul class="list-inline two-part">
						<li><i class="ti-wallet text-success"></i></li>
						<li class="text-right"><span class="" id="done-apps">{{$data['done']}}</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('content2')
<style type="text/css">.fc th.fc-widget-header{background: #03A9F3;}</style>
<div class="row">
	<div class="panel panel-default">
		<div class="panel-heading"><div class="form-group">
			<label for="status" style="width:auto;display:inline-block;"><strong>View ShowRoom Calendar : </strong></label><span class="highlight"></span> <span class="bar"></span>
			<select class="form-control" id="showroom-select" required="" style="width:50%;display:inline-block;">
			<option value="all">All</option>
			@foreach($showrooms as $showroom)
				<option value="{{ $showroom->id }}">{{ $showroom->city }}</option>
			@endforeach
			</select>
			
			<div class="panel-action" style="display:inline-block;"><a href="panels-wells.html#" data-perform="panel-collapse"><i class="ti-minus"></i></a> <a href="panels-wells.html#" data-perform="panel-dismiss"><i class="ti-close"></i></a></div></div>
		</div>
		<style type="text/css">.fc th.fc-widget-header{background: #03A9F3;}.fc-unthemed .fc-today {background:  #dadbf1 !important;}</style>
		<div class="panel-wrapper collapse in">
			<div class="panel-body">
				<div id="calendar"></div>
			</div>
		</div>
	</div>
</div>
<div id="com-modal-update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Appointment</h4>
			</div>
			<div class="modal-body">
				<form id="edit-appointment" class="form-horizontal calender" role="form">
					<input type="hidden" class="form-control" id="id" name="id" value="">
					<div class="user-btm-box" style="margin-top: -8%;">
						<!-- .row -->
						<div class="row text-center m-t-10" >
							<div class="col-md-6 b-r"><strong>Name</strong><p>AZEAEAZEA</p></div>
							<div class="col-md-6"><strong>Birth</strong><p>20/20/1993</p></div>
						</div>
						<!-- /.row -->
						<hr>
						<!-- .row -->
						<div class="row text-center m-t-10">
							<div class="col-md-6 b-r"><strong>Email ID</strong><p>sqdsqd@dsqd.sd</p></div>
							<div class="col-md-6"><strong>Phone</strong><p>+879879878</p></div>
						</div>
						<hr>
						<div class="row text-center m-t-10">
							<div class="col-md-6 b-r"><strong>Start At</strong><p>28/20/12 19:30</p></div>
							<div class="col-md-6"><strong>End At</strong><p>28/20/12 20:30</p></div>
						</div>
						<hr>
						<div class="row text-center m-t-10">
							<div class="col-md-6 b-r"><strong>ShowRoom</strong><p>Sousse</p></div>
							<div class="col-md-6"><strong>With Agent</strong><p>Ahmed Sami</p></div>
						</div>
						<!-- /.row -->
						<hr>
						<!-- .row -->
						<div class="row text-center m-t-10">
							<div class="col-md-12"><strong>Address</strong><p>Rue 118 Charles degaule.</p></div>
						</div>
						<hr>
						<!-- /.row -->
						<label for="status"><strong>Change Status</strong></label><span class="highlight"></span> <span class="bar"></span>
						<select class="form-control" id="status" required="">
							<option value="pending">Pending</option>
							<option value="done">Done</option>
							<option value="rescheduled">Rescheduled</option>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
			
				<a href="" class="btn btn-primary pull-left hidden" id="view-invoice">Invoices</a>
				<a href="" class="btn btn-danger pull-left hidden" id="create-invoice">Create Invoice</a>
			
				<button type="button" class="btn btn-default" id="close-update" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-info " id="submit-status">Save changes</button>
			</div>
		</div>
	</div>
</div>
<div id="fc_edit" data-toggle="modal" data-target="#com-modal-update"></div>
<div id="show" data-toggle="modal" data-target="#com-modal-update"></div>
@endsection



@section('js')

<script type="text/javascript">
var evs = {!! json_encode($calendar) !!};
var errors = {!! json_encode($errors->first()) !!};
</script>
<script type="text/javascript" src="{{ url('/js/com/index.js') }} "></script>
@endsection