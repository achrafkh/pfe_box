@extends('layouts.master')
@section('breadcumbs')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Create Client</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }} ">Dashboard</a></li>
            <li class="active">Create Client</li>
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
                <a href="{{ url('/admin/users') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <br />
                <br />
                {!! Form::open(['url' => '/admin/users', 'class' => 'form-horizontal', 'files' => true]) !!}
                @include ('admin.users.form',["showrooms" => $showrooms,"roles" => $roles])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script type="text/javascript">
$(function() {
    if($('#role').val() != '2')
    {
        $('#showroom').hide();
    }
    $('#role').change(function(){
        if($('#role').val() == '2') {
            $('#showroom').show(); 
        } else {
            $('#showroom').hide(); 
        } 
    });
});
</script>

@endsection