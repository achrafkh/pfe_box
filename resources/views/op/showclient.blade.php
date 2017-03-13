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
								<tr>
									<td>Filled form date:</td>
									<td>{{ $client->created_at }}</td>
								</tr>
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
					<form id="create-appointment" class="form-horizontal calender" role="form">
						
						@include('partials.appform', ['showrooms' => $showrooms,'action' => 'create'])

					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" id="close-create" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary " id="create-app">Save changes</button>
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
					
					
					<form id="edit-appointment" class="form-horizontal calender" role="form">
						
						@include('partials.appform', ['showrooms' => $showrooms,'action' => 'update'])

					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" id="close-update" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary " id="edit-app">Save changes</button>
			</div>
		</div>
	</div>
</div>
<div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
<div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
</div>
@endsection
@section('js')

<script src="{{ asset('js/calendar.js') }}"></script>

<script>
var evs = {!! json_encode($calendar) !!};
var errors = {!! json_encode($errors->first()) !!};
console.log(errors);

</script>
<script src="{{ asset('js/showclient.js') }}"></script>
@endsection