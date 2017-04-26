@extends('layouts.master')
@section('breadcumbs')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Configure Settings</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }} ">Dashboard</a></li>
            <li class="active">Configure Settings</li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection
@section('content1')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Configure Settings</div>
            <div class="panel-body">
            <p>You need to provide And access token (With Manage Ads) and Facebook page ID first</p>
                <a href="{{ url('/admin/pages') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <br />
                <br />
                {!! Form::open(['url' => '/admin/pages/settings', 'class' => 'form-horizontal']) !!}

                    <div class="form-group {{ $errors->has('access_token') ? 'has-error' : ''}}">
                        {!! Form::label('access_token', 'Access Token', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('access_token', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('access_token', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('page_id') ? 'has-error' : ''}}">
                        {!! Form::label('page_id', 'Page ID', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('page_id', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('page_id', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('app_sercret') ? 'has-error' : ''}}">
                        {!! Form::label('app_sercret', 'App Secret', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('app_sercret', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('app_sercret', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                     <div class="form-group {{ $errors->has('app_id') ? 'has-error' : ''}}">
                        {!! Form::label('app_id', 'App ID', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('app_id', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('app_id', '<p class="help-block">:message</p>') !!}
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