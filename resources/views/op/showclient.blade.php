@extends('layouts.master')
@section('css-top')
<link href="{{ asset('css/calendar/fullcalendar.css') }}" rel="stylesheet">
<link href="{{ asset('css/morris.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.css">
@endsection
@section('breadcumbs')
<div class="row bg-title">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h4 class="page-title">Client Details</h4>
	</div>
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">Dashboard</a></li>
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
					<div class="col-md-6 b-r"><strong>Name</strong><p>Genelia Deshmukh</p></div>
					<div class="col-md-6"><strong>Designation</strong><p>Designer</p></div>
				</div>
				<!-- /.row -->
				<hr>
				<!-- .row -->
				<div class="row text-center m-t-10">
					<div class="col-md-6 b-r"><strong>Email ID</strong><p>genelia@gmail.com</p></div>
					<div class="col-md-6"><strong>Phone</strong><p>+123 456 789</p></div>
				</div>
				<!-- /.row -->
				<hr>
				<!-- .row -->
				<div class="row text-center m-t-10">
					<div class="col-md-12"><strong>Address</strong><p>E104, Dharti-2, Chandlodia Ahmedabad<br/> Gujarat, India.</p></div>
					
				</div>
				<hr>
				<!-- /.row -->
				
				<!-- Start Donut chart  -->
				<h3 class="box-title">Leads by Source</h3>
				<div id="morris-donut-chart" class="ecomm-donute" style="height: 250px;"></div>
				<ul class="list-inline m-t-30 text-center">
					<li class="p-r-20">
						<h5 class="text-muted"><i class="fa fa-circle" style="color: #fb9678;"></i> Ads</h5>
						<h4 class="m-b-0">8500</h4>
					</li>
					<li class="p-r-20">
						<h5 class="text-muted"><i class="fa fa-circle" style="color: #01c0c8;"></i> Tredshow</h5>
						<h4 class="m-b-0">3630</h4>
					</li>
					<li>
						<h5 class="text-muted"> <i class="fa fa-circle" style="color: #4F5467;"></i> Web</h5>
						<h4 class="m-b-0">4870</h4>
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
				<li class="tab"><a href="{{url('op/client/'.$client->id)}}#invoices" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Invoices History</span> </a> </li>
				<li class="tab" id="edit-tab"><a href="{{url('op/client/'.$client->id)}}#edit" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Edit Details</span> </a> </li>
			</ul>
			<!-- /.tabs -->
			<div class="tab-content" id="cont">
				<!-- .tabs1 -->
				<div class="tab-pane active" id="profile">
					<div class="row">
						<div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong> <br>
							<p class="text-muted">Johnathan Deo</p>
						</div>
						<div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong> <br>
							<p class="text-muted">(123) 456 7890</p>
						</div>
						<div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong> <br>
							<p class="text-muted">johnathan@admin.com</p>
						</div>
						<div class="col-md-3 col-xs-6"> <strong>Location</strong> <br>
							<p class="text-muted">London</p>
						</div>
					</div>
					<hr>
					<p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>
					<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
					<h4 class="font-bold m-t-30">Skill Set</h4>
					<hr>
					<h5>Wordpress <span class="pull-right">80%</span></h5>
					<div class="progress">
						<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">50% Complete</span> </div>
					</div>
					<h5>HTML 5 <span class="pull-right">90%</span></h5>
					<div class="progress">
						<div class="progress-bar progress-bar-custom" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%;"> <span class="sr-only">50% Complete</span> </div>
					</div>
					<h5>jQuery <span class="pull-right">50%</span></h5>
					<div class="progress">
						<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%;"> <span class="sr-only">50% Complete</span> </div>
					</div>
					<h5>Photoshop <span class="pull-right">70%</span></h5>
					<div class="progress">
						<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%;"> <span class="sr-only">50% Complete</span> </div>
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
				<div class="tab-pane" id="invoices">
					<div class="row">
						<h3 class="box-title m-b-0">Recent Invoices</h3>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Invoice</th>
										<th>User</th>
										<th>Date</th>
										<th>Amount</th>
										<th>Status</th>
										<th>Country</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><a href="javascript:void(0)">Order #26589</a></td>
										<td>Herman Beck</td>
										<td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2017</span> </td>
										<td>$45.00</td>
										<td>
											<div class="label label-table label-success">Paid</div>
										</td>
										<td>EN</td>
									</tr>
									<tr>
										<td><a href="javascript:void(0)">Order #58746</a></td>
										<td>Mary Adams</td>
										<td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 12, 2017</span> </td>
										<td>$245.30</td>
										<td>
											<div class="label label-table label-danger">Shipped</div>
										</td>
										<td>CN</td>
									</tr>
									<tr>
										<td><a href="javascript:void(0)">Order #98458</a></td>
										<td>Caleb Richards</td>
										<td><span class="text-muted"><i class="fa fa-clock-o"></i> May 18, 2017</span> </td>
										<td>$38.00</td>
										<td>
											<div class="label label-table label-info">Shipped</div>
										</td>
										<td>AU</td>
									</tr>
									<tr>
										<td><a href="javascript:void(0)">Order #32658</a></td>
										<td>June Lane</td>
										<td><span class="text-muted"><i class="fa fa-clock-o"></i> Apr 28, 2017</span> </td>
										<td>$77.99</td>
										<td>
											<div class="label label-table label-success">Paid</div>
										</td>
										<td>FR</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- /.tabs3 -->
			</div>
		</div>
	</div>
</div>
@endsection
@section('content2')
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
			<div class="modal-body">
				<form id="create-appointment" class="form-horizontal calender" role="form">
					@include('op.partials.appointment-modal',['showrooms' => $showrooms,'action' => 'create'])
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" id="close-create" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-info " id="create-app">Save changes</button>
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
			<div class="modal-body">
				<form id="edit-appointment" class="form-horizontal calender" role="form">
					<input type="hidden" class="form-control" id="id" name="id" value="">
					@include('op.partials.appointment-modal',['showrooms' => $showrooms,'action' => 'update'])
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" id="close-update" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-info " id="edit-app">Save changes</button>
			</div>
		</div>
	</div>
</div>

<div id="fc_create" data-toggle="modal" data-target="#responsive-modal-create"></div>
<div id="fc_edit" data-toggle="modal" data-target="#responsive-modal-update"></div>
@endsection
@section('js')
<script src="{{ asset('js/charting.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.js"></script>

<script type="text/javascript">
var evs = {!! json_encode($calendar) !!};
var errors = {!! json_encode($errors->first()) !!};
var donut = {!! json_encode($donut) !!};
var userdate = {!! json_encode($client->birthdate) !!};




Morris.Donut({
    element: 'morris-donut-chart',
    data: donut,
    resize: true,
    colors: ['#99d683', '#13dafe', '#6164c1']
});

$(window).load(function() {

	 if (errors.length > 0) {
        $('.nav li').removeClass('active');
        $('#cont div').removeClass('active');
        $('#edit-tab').addClass('active');
        $('#edit').addClass('active');
    }

	   $('.clockpicker').clockpicker({
            donetext: 'Done', 
        });


    var datepicker = jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: false,
        format: 'yyyy/mm/dd',
    });
    datepicker.datepicker('update', userdate);


        var modaldatepicker = jQuery('.thedatepicker').datepicker({
        autoclose: true,
        todayHighlight: false,
        format: 'yyyy/mm/dd',
    });

    var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay = false) {
            modaldatepicker.datepicker('update', moment(start).format('YYYY-MM-DD'));
            $('#fc_create').click();
            $("#create-app").unbind('click').bind("click", function() {
                $.ajax({
                    url: '/op/setappointment',
                    type: 'post',
                    dataType: 'json',
                    data: $('#create-appointment').serialize(),
                    success: function(data) {
                        $("#create-appointment").trigger('reset');
                        console.log(data);
                        var NewEvent = {
                            id: data.event.id,
                            title: data.event.title,
                            client_id: data.event.client_id,
                            showroom_id: data.event.showroom_id,

                            start: moment(data.event.start_at, ["MM-DD-YYYY", "YYYY-MM-DD"]),
                            end: moment(data.event.start_at, ["MM-DD-YYYY", "YYYY-MM-DD"]),
                            allDay: false,
                            notes: data.event.notes,
                            color: '#1751c3',
                        };
                        calendar.fullCalendar('renderEvent', NewEvent, false);
                    },
                    error: function(errors) {
                        console.log(errors.responseText);
                    }
                });
                calendar.fullCalendar('unselect');
                $('#close-create').click();
                return false;
            });
        },
        eventResize: function(event, delta, revertFunc, jsEvent, ui, view) {
            var start = event.start.format('YYYY-MM-DD HH:MM:SS');
            var end = event.end.format('YYYY-MM-DD HH:MM:SS');
            var id = event.id;
            $.ajax({
                url: '/op/updateapptime',
                type: 'post',
                dataType: 'json',
                data: {
                    'id': id,
                    'start': start,
                    'end': end
                },
                success: function(data) {
                    console.log(data);
                },
            });
        },
        eventDrop: function(event, dayDelta, minuteDelta, allDay, revertFunc) {
            var UpdatedEvent = {
                _id: event._id,
                id: event.id,
                client_id: event.client_id,
                title: event.title,
                showroom_id: event.showroom_id,
                start: moment(event.start, ["MM-DD-YYYY", "YYYY-MM-DD"]),
                end: moment(event.end, ["MM-DD-YYYY", "YYYY-MM-DD"]),
                allDay: false,
                notes: event.notes,
                color: '#1751c3',
            };
            console.log(UpdatedEvent);
            $.ajax({
                url: '/op/updateappointment',
                type: 'post',
                dataType: 'json',
                data: UpdatedEvent,
                success: function(data) {
                    console.log(data)
                },
            });
        },
        eventClick: function(calEvent, jsEvent, view) {
            var evid = calEvent._id;
            $('#title-update').val(calEvent.title);
            $('#notes-update').val(calEvent.notes);
            $('#id').val(calEvent.id);
            $('#start-time-update').val(moment(calEvent.start).format('HH:MM'));
            $('#end-time-update').val(moment(calEvent.end).format('HH:MM'));

            modaldatepicker.datepicker('update', moment(calEvent.start).format('YYYY-MM-DD'));

            $('#fc_edit').click();
            $("#edit-app").unbind('click').bind("click", function() {
                $.ajax({
                    url: '/op/updateappointment',
                    type: 'post',
                    dataType: 'json',
                    data: $('#edit-appointment').serialize(),
                    success: function(data) {
                        console.log(data);
                        $("#edit-appointment").trigger('reset');
                        var UpdatedEvent = {
                            _id: evid,
                            id: data.event.id,
                            title: data.event.title,
                            client_id: event.client_id,
                            showroom_id: event.showroom_id,
                            start: moment(data.event.start_at, ["MM-DD-YYYY", "YYYY-MM-DD"]),
                            end: moment(data.event.end_at, ["MM-DD-YYYY", "YYYY-MM-DD"]),
                            allDay: false,
                            notes: data.event.notes,
                            color: '#1751c3',
                        };
                        calendar.fullCalendar('removeEvents', evid);
                        calendar.fullCalendar('renderEvent', UpdatedEvent, false);
                    }
                });
                $('#close-update').click();
            });
            calendar.fullCalendar('unselect');
        },
        editable: true,
        events: evs,
    });
});
</script>
@endsection