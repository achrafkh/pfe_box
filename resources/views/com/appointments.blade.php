@extends('layouts.app')
@section('content')

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
<div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
<div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
</div>
@endsection
@section('js')

<script src="{{ asset('js/calendar.js') }}"></script>

<script>
var evs = {!! json_encode($calendar) !!};
var errors = {!! json_encode($errors->first()) !!};
</script>
<script src="{{ asset('js/showroom.js') }}"></script>
@endsection