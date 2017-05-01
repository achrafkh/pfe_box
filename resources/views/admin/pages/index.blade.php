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
	<div class="panel-heading">Facebook Forms <a class="btn btn-info pull-right" href="{{ url('/admin/pages/edit') }} ">Edit</a></div>
	<div class="panel-body">
		
		<div class="row">
			        <a href="{{ url('/admin/forms/create') }}" class="btn btn-primary btn-sm" title="Add New Form">
			            <i class="fa fa-plus" aria-hidden="true"></i> Generate New Form
			        </a>
			@if(count($forms))
				@foreach($forms as $form)
				    <div class="row m-b-10 " style="padding-top : 2%;">
                        <div class="">
                            <div class="ribbon-wrapper">

                            @if($form->status == "ACTIVE")
                                <div class="ribbon ribbon-bookmark ribbon-success">{{ $form->status }}</div>
                            @else
                            	<div class="ribbon ribbon-bookmark ribbon-danger">{{ $form->status }}</div>
                            @endif
                                    <p class="ribbon-content">Form name : {{ $form->name }} </h4>
                                    Form ID : {{ $form->id }} | Local :  {{ $form->locale }}
                                    <a href="{{ url('/admin/leads',$form->id) }} " class="btn btn-info pull-right" >Check Leads</a>
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['/admin/form/delete', $form->id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete Form', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'title' => 'Delete User',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                        )) !!}
                                        {!! Form::close() !!}

                                    </p>
                            </div>
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

