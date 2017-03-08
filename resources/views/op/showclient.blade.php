@extends('layouts.app')
@section('content')
<style type="text/css">
	
.user-row {
margin-bottom: 14px;
}
.user-row:last-child {
margin-bottom: 0;
}
.dropdown-user {
margin: 13px 0;
padding: 5px;
height: 100%;
}
.dropdown-user:hover {
cursor: pointer;
}
.table-user-information > tbody > tr {
border-top: 1px solid rgb(221, 221, 221);
}
.table-user-information > tbody > tr:first-child {
border-top: 0;
}
.table-user-information > tbody > tr > td {
border-top: 0;
}
.toppad
{margin-top:20px;
}
</style>
<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
		Dashboard <small>Statistics Overview</small>
		</h1>
		{{-- <ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i> User
			</li>
		</ol> --}}
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xs-offset-0 col-sm-offset-0 toppad" >
		
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">{{ $client->firstname . ' ' . $client->lastname}}</h3>
			</div>
			<div class="panel-body" >
				<div class="row">
					<div class=" col-md-12 col-lg-12 ">
						<table class="table table-user-information">
							<tbody>
								{{-- <tr>
									<td>Department:</td>
									<td>Programming</td>
								</tr> --}}
								<tr>
									<td>Filled form date:</td>
									<td>{{ $client->created_at }}</td>
								</tr>
								{{-- 								<tr>
									<td>Status</td>
									<td>{{ $client->status }}</td>
								</tr> --}}
								
								<tr>
									<tr>
										<td>city</td>
										<td>{{ $client->city }}</td>
									</tr>
									<tr>
										<td>Home Address</td>
										<td>{{ $client->address }}</td>
									</tr>
									<tr>
										<td>Email</td>
										<td><a href="mailto:{{ $client->name }}">{{ $client->email }}</a></td>
									</tr>
									<td>Phone Number</td>
									<td>{{ $client->phone }}<br>
									</td>
									
								</tr>
								
							</tbody>
						</table>
						
						<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#schedule">Schedule Rendez-vous</a>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<a  type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
				<span class="pull-right">
					<a href="{{ route('editClientForm', $client->id)  }}" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
				</span>
			</div>
			
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 toppad pull-righ">
<h2>Previous invoices</h2>
	  <table class="table">
	    <thead>
	      <tr>
	        <th>Code</th>
	        <th>Date</th>
	        <th>Product</th>
	        <th>Action</th>
	      </tr>
	    </thead>
	    <tbody>
		      <tr>
		        <td>zaeza</td>
		        <td>zaeaeaze</td>
		        <td>azeaezaea</td>
		        <td> <a href="#" class="btn btn-primary">View</a>
		      </tr>
		      <tr>
		        <td>zaeza</td>
		        <td>zaeaeaze</td>
		        <td>azeaezaea</td>
		        <td> <a href="#" class="btn btn-primary">View</a>
		      </tr>
		      <tr>
		        <td>zaeza</td>
		        <td>zaeaeaze</td>
		        <td>azeaezaea</td>
		        <td> <a href="#" class="btn btn-primary">View</a>
		      </tr>
		      <tr>
		        <td>zaeza</td>
		        <td>zaeaeaze</td>
		        <td>azeaezaea</td>
		        <td> <a href="#" class="btn btn-primary">View</a>
		      </tr>
	      </tbody>
	  </table>
  </div>
</div>
<div class="modal fade" id="schedule" role="dialog">
	<div class="modal-dialog">
		<form class="form-horizontal" action="{{ route('setAppointment') }} " method="Post">
			
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Rendez Vour pour {{ $client->firstname . ' ' . $client->lastname}}</h4>
				</div>
				<div class="modal-body">
					
					<div style="margin-left: 2%;margin-right: 2%">
						
						{{ csrf_field() }}
						<input type="hidden" class="form-control" id="client_id" name="client_id" value="{{ $client->id }} ">
						<div class="form-group">
							<label for="note">Title:</label>
							<input type="text" class="form-control" name="title" id="title">
						</div>
						<div class="form-group">
							<label for="note">Note:</label>
							<textarea class="form-control" name="note" id="note"></textarea>
						</div>
						
						<div class="form-group start-date">
							<label class="control-label" for="start-date">Day</label>
							<div class="input-group start-date-time">
								<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
								<input class="form-control" name="day" id="start-date" type="date">
								
							</div>
							<div class="row" style="margin-left: 2%;margin-right: 2%">
								<label class="control-label pull-left" for="end-date">Start time:</label>
								<label class="control-label pull-right" for="end-date">End Time:</label>
							</div>
							<div class="input-group end-date-time">
								<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-time" aria-hidden="true"></span></span>
								<input class="form-control" name="start_time" id="end-date" type="time">
								<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-time" aria-hidden="true"></span></span>
								<input  class="form-control" name="end_time" id="end-time" type="time">
								
							</div>
						</div>
						<div class="input-group col-sm-12 col-md-12">
							<div>
								<label class="control-label col-sm-6 pull-left" for="showroom">Select Showroom</label>
							</div>
							
							<div class="col-sm-6">
								<select class="form-control input-large" name="showroom_id">
									@foreach($showrooms as $showroom)
									<option value="{{ $showroom->id }} "> {{ $showroom->city }} </option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				
			</div>
		</form>
	</div>
</div>
@endsection
@section('content2')
<link href="/css/calendar/fullcalendar.css" rel="stylesheet">
<link href="/css/calendar/fullcalendar.print.css" rel="stylesheet" media="print">
<div class="container">
	<div class="row" id="accordion">
		<div class="col-md-10">
			
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
<div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h4 class="modal-title" id="myModalLabel">New Calender Entry</h4>
</div>
<div class="modal-body">
	<div id="testmodal" style="padding: 5px 20px;">
		<form id="antoform" class="form-horizontal calender" role="form">
			<div class="form-group">
				<label class="col-sm-3 control-label">Title</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="title" name="title">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Description</label>
				<div class="col-sm-9">
					<textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
	<button type="button" class="btn btn-primary antosubmit">Save changes</button>
</div>
</div>
</div>
</div>
<div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h4 class="modal-title" id="myModalLabel2">Edit Calender Entry</h4>
</div>
<div class="modal-body">
	<div id="testmodal2" style="padding: 5px 20px;">
		<form id="antoform2" class="form-horizontal calender" role="form">
			<div class="form-group">
				<label class="col-sm-3 control-label">Title</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="title2" name="title2">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Description</label>
				<div class="col-sm-9">
					<textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
	<button type="button" class="btn btn-primary antosubmit2">Save changes</button>
</div>
</div>
</div>
</div>
<div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
<div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
</div>

@endsection


@section('js')
<script src="/js/moment/moment.min.js"></script>
<script src="/js/calendar/fullcalendar.min.js"></script>
<!-- pace -->
<script>

var evs = {!! json_encode($calendar) !!};


console.log(evs);
$(window).load(function() {
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    var started;
    var categoryClass;
    console.log(new Date(y, m, d + 14, 12, 0));
    var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay = false) {
            $('#fc_create').click();
            console.log('this creates');
            started = start;
            ended = end
            $(".antosubmit").on("click", function() {
                var title = $("#title").val();
                if (end) {
                    ended = end
                }
                categoryClass = $("#event_type").val();
                if (title) {
                    calendar.fullCalendar('renderEvent', {
                            title: title,
                            start: started,
                            end: end,
                            allDay: allDay
                        },
                        true // make the event "stick"
                    );
                }
                $('#title').val('');
                calendar.fullCalendar('unselect');
                $('.antoclose').click();
                return false;
            });
        },
        eventClick: function(calEvent, jsEvent, view) {
            //alert(calEvent.title, jsEvent, view);
            $('#fc_edit').click();
            $('#title2').val(calEvent.title);
            $('#descr2').val(calEvent.notes);
            categoryClass = $("#event_type").val();
            $(".antosubmit2").on("click", function() {
                calEvent.title = $("#title2").val();
                calendar.fullCalendar('updateEvent', calEvent);
                console.log('this updates');
                $('.antoclose2').click();
            });
            calendar.fullCalendar('unselect');
        },
        editable: true,
        events: evs,
    });
});
</script>
@endsection