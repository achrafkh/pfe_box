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
							<div class="col-md-6 b-r"><strong>Name</strong><p id="name"></p></div>
							<div class="col-md-6"><strong>Birth</strong><p id="birthdate"></p></div>
						</div>
						<!-- /.row -->
						<hr>
						<!-- .row -->
						<div class="row text-center m-t-10">
							<div class="col-md-6 b-r"><strong>Email ID</strong><p id="email"></p></div>
							<div class="col-md-6"><strong>Phone</strong><p id="phone"></p></div>
						</div>
						<hr>
						<div class="row text-center m-t-10">
							<div class="col-md-6 b-r"><strong>Start At</strong><p id="start"></p></div>
							<div class="col-md-6"><strong>End At</strong><p id="end"></p></div>
						</div>
						<hr>
						<div class="row text-center m-t-10">
							<div class="col-md-6 b-r"><strong>ShowRoom</strong><p id="showroom"></p></div>
							<div class="col-md-6"><strong>With Agent</strong><p id="agent"></p></div>
						</div>
						<!-- /.row -->
						<hr>
						<!-- .row -->
						<div class="row text-center m-t-10">
							<div class="col-md-12"><strong>Address</strong><p id="address">Rue 118 Charles degaule.</p></div>
						</div>
						<hr>
						<!-- /.row -->
						<div class="row text-center m-t-10">
							<div class="col-md-12"><strong>Status</strong><p style="margin-top:3px;"><span id="status" class="" ></span></p></div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" id="close-update" data-dismiss="modal">Close</button>
				{{-- <button type="button" class="btn btn-info " id="submit-status">Save changes</button> --}}
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


function SetStats(stats){
	$( "#pending-apps" ).text(stats.pending);
	$( "#resc-apps" ).text(stats.resc);
	$( "#done-apps" ).text(stats.done);
	$( "#total-agents" ).text(stats.agents);
}

$( "#showroom-select" ).change(function() {
	$.ajax({
	    url: '/admin/getevents',
	    type: 'post',
	    dataType: 'json',
	    data: {
	        'showroom_id': $("#showroom-select").val()
	    },
	    success: function(data) {
	    	SetStats(data.stats)
	        $('#calendar').fullCalendar('removeEvents');
	        $("#calendar").fullCalendar('addEventSource', data.events);
	    }
	});
 });
 $(window).load(function() {
    var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },

        eventClick: function(calEvent, jsEvent, view) {
        	console.log(calEvent);
            $('#name').text(calEvent.client.firstname +' '+ calEvent.client.lastname);
            $('#email').text(calEvent.client.email);
            $('#address').text(calEvent.client.address);
            $('#phone').text(calEvent.client.phone);
            $('#birthdate').text(calEvent.client.birthdate);
            $('#start').text(calEvent.start.format('YYYY-MM-DD HH:MM:SS'));
            $('#end').text(calEvent.end.format('YYYY-MM-DD HH:MM:SS'));

            var status = $('#status');
            if(calEvent.status == 'done'){
            	status.removeClass().addClass('label label-success')
            	status.text(calEvent.status);
            }
            if(calEvent.status == 'pending'){
            	status.removeClass().addClass('label label-primary')
            	status.text(calEvent.status);
            }
            if(calEvent.status == 'rescheduled'){
            	status.removeClass().addClass('label label-danger')
            	status.text(calEvent.status);
            }
            

            $('#show').click();
            calendar.fullCalendar('unselect');
        },

        selectable: false,
        selectHelper: false,
        editable: false,
        events: evs,
    });
});
</script>
@endsection