@extends('layouts.master')
@section('breadcumbs')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Update Client</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }} ">Dashboard</a></li>
            <li class="active">Update Client</li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection
@section('content1')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Edit User <strong>{{ $user->fullname }}</strong></div>
            <div class="panel-body">
                <a href="{{ url('/admin/users') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <br />
                <br />
                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                {!! Form::model($user, [
                'method' => 'PATCH',
                'url' => ['/admin/users', $user->id],
                'class' => 'form-horizontal',
                'files' => true
                ]) !!}
                @include ('admin.users.form', [ 'submitButtonText' => 'Update',
                                                'showrooms' => $showrooms ,
                                                'roles' => $roles,
                                              ])
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