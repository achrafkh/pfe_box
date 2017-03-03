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
				<h3 class="panel-title">{{ $lead->client->name }}</h3>
			</div>
			<div class="panel-body">
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
									<td>{{ $lead->created_at }}</td>
								</tr>
								<tr>
									<td>Status</td>
									<td>{{ $lead->status }}</td>
								</tr>
								
								<tr>
									<tr>
										<td>city</td>
										<td>{{ $lead->client->city }}</td>
									</tr>
									<tr>
										<td>Home Address</td>
										<td>{{ $lead->client->address }}</td>
									</tr>
									<tr>
										<td>Email</td>
										<td><a href="mailto:{{ $lead->client->name }}">{{ $lead->client->email }}</a></td>
									</tr>
									<td>Phone Number</td>
									<td>{{ $lead->client->phone }}<br>
									</td>
									
								</tr>
								
							</tbody>
						</table>
						
						<a href="#" class="btn btn-primary">Schedule Rendez-vous</a>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
				<span class="pull-right">
					<a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
					<a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
				</span>
			</div>
			
		</div>
	</div>
</div>

@endsection
@section('js')
<script type="text/javascript">
	
$(document).ready(function() {
	var panels = $('.user-infos');
	var panelsButton = $('.dropdown-user');
	panels.hide();
	//Click dropdown
		panelsButton.click(function() {
		//get data-for attribute
		var dataFor = $(this).attr('data-for');
		var idFor = $(dataFor);
		//current button
		var currentButton = $(this);
			idFor.slideToggle(400, function() {
			//Completed slidetoggle
			if(idFor.is(':visible'))
				{
					currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
				}
			else
				{
				currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
				}
			})
		});
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
@endsection