@extends('layouts.master')
@section('breadcumbs')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Create Form</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }} ">Dashboard</a></li>
            <li class="active">Create Form</li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection
@section('content1')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Create New User</div>
            <div class="panel-body">
                <a href="{{ url('/admin/pages') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <br />
                <br />
                {!! Form::open(['url' => '/admin/forms/create', 'class' => 'form-horizontal', 'files' => true]) !!}

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        {!! Form::label('name', 'Form Name', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('legalurl') ? 'has-error' : ''}}">
                        {!! Form::label('legalurl', 'Privacy policy URL', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::url('legalurl', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('legalurl', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('redirect') ? 'has-error' : ''}}">
                        {!! Form::label('redirect', 'redirect URL', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::url('redirect', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('redirect', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-4 col-md-4">
                            {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection