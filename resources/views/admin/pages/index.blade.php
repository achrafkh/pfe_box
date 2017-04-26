@extends('layouts.master')

@section('breadcumbs')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Manage Pages</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }} ">Dashboard</a></li>
            <li class="active">Manage Pages</li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection

@section('content1')
<div class="panel panel-default">
	<div class="panel-heading">Facebook Forms</div>
	<div class="panel-body">
		
		<div class="row">
			<div class="col-md-12 p-20">
			        <a href="{{ url('/admin/forms/create') }}" class="btn btn-success btn-sm" title="Add New Form">
			            <i class="fa fa-plus" aria-hidden="true"></i> Generate New Form
			        </a>
			@if(count($forms))
				@foreach($forms as $form)
				<div class="media">
					<div class="media-body">
						<h4 class="media-heading">Form name : {{ $form->name }} </h4>Form ID : {{ $form->id }} | Status :  {{ $form->status }}
						| Local :  {{ $form->locale }}
					</div>
					<div class="media-right">
						<a href="{{ url('/admin/leads',$form->id) }} " class="btn btn-info" style="margin-top:25%;">Check Leads</a>
					</div>
				</div>
				@endforeach
			@else

			<div class="alert alert-warning alert-dismissable" style="margin-top:2%;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        There are No Forms Yet</div>
			@endif
			</div>
		</div>
	</div>
</div>

@endsection