@extends('layouts.app')
@section('content')
<style type="text/css">
.fc-event{
cursor: pointer;
}
.glyphicon {  margin-bottom: 10px;margin-right: 10px;}
small {
display: block;
line-height: 1.428571429;
color: #999;
}
</style>
<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
		Dashboard <small>Statistics Overview</small>
		</h1>
	</div>
</div>
@endsection
@section('content2')
<link href="/css/calendar/fullcalendar.css" rel="stylesheet">
<link href="/css/calendar/fullcalendar.print.css" rel="stylesheet" media="print">
<div class="container">
	<div class="row" id="accordion">
		<div class="col-md-10">

		<div class="col-sm-6">
			<select class="form-control input-large showroom" name="showroom" id="showroom-select">
				<option value="all"> All </option>
				@foreach($showrooms as $showroom)
					<option value="{{ $showroom->id }} "> {{ $showroom->city }} </option>
				@endforeach
			</select>
		</div>
			
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Calender Events <small>Sessions</small></h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i id="arrow" class="fa fa-chevron-down"></i></a>
							</li>
							
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content" id="collapseOne" class="panel-collapse collapse">
						<div id='calendar'></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Start Calender modal -->
<div id="show" data-toggle="modal" data-target="#CalenderModalShow"></div>
</div>
<div id="CalenderModalShow" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title" id="myModalLabel2">Show Appointment with : <div id="client-name"></div></h4>
		</div>
		<div class="modal-body">
			<small><cite title="San Francisco, USA" id="client-address"><i class="glyphicon glyphicon-map-marker">
			</i></cite></small>
			<p>
				<div id="client-email"><i class="glyphicon glyphicon-envelope"></i></div>
				<br />
				<div id="client-phone"> <i class="glyphicon glyphicon-globe"></i></div>
				<br />
				<div id="app-date"><i class="glyphicon glyphicon-calendar"></i></div>
				<div class="col-sm-6">
					<select class="form-control input-large showroom" name="status" id="status">
						<option value="pending">Pending</option>
						<option value="done">Done</option>
						<option value="rescheduled">Rescheduled</option>
					</select>
				</div>
			</p>
			<!-- Split button -->
			<div class="btn-group">
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" id="submit-status" data-dismiss="modal">Save</button>
			<button type="button" class="btn btn-default" id="close-update" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>
</div>
@endsection
@section('js')
<script>
var evs = {!! json_encode($calendar) !!};
console.log(evs);
var errors = {!! json_encode($errors->first()) !!};
</script>
<script src="{{ asset('js/com/showroom.js') }}"></script>



<script type="text/javascript">


$( "#showroom-select" ).change(function() {
	$.ajax({
	    url: '/com/getevents',
	    type: 'post',
	    dataType: 'json',
	    data: {
	        'showroom_id': $("#showroom-select").val()
	    },
	    success: function(data) {
	        console.log(data);
	        $('#calendar').fullCalendar('removeEvents');
	        $("#calendar").fullCalendar('addEventSource', data);
	    }
	});
 });
</script>
@endsection