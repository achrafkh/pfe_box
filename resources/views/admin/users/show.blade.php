@extends('layouts.master')
@section('breadcumbs')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Client Details</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }} ">Dashboard</a></li>
            <li class="active">Client Details</li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection

@section('content1')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">User {{ $user->id }}</div>
            <div class="panel-body">
                <a href="{{ url('/admin/users') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <a href="{{ url('/admin/users/' . $user->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                {!! Form::open([
                'method'=>'DELETE',
                'url' => ['admin/users', $user->id],
                'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                'type' => 'submit',
                'class' => 'btn btn-danger btn-xs',
                'title' => 'Delete User',
                'onclick'=>'return confirm("Confirm delete?")'
                ))!!}
                {!! Form::close() !!}
                <br/>
                <br/>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>ID</th><td>{{ $user->id }}</td>
                            </tr>
                            <tr>
                                <th> Fullname </th>
                                <td> {{ $user->fullname }}</td>
                            </tr>
                            <tr>
                                <th> Username </th>
                                <td> {{ $user->username }} </td>
                            </tr>
                            <tr>
                                <th> Email </th>
                                <td> {{ $user->email }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection