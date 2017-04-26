@extends('layouts.master')

@section('breadcumbs')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Manage Leads</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }} ">Dashboard</a></li>
            <li class="active">Manage Leads</li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection

@section('content1')
<div class="panel panel-default">
    <div class="panel-heading">Leads for Form : {{ $form->name }}</div>
    <div class="panel-body">
    <p>Form ID : {{ $form->id }}</p>
    <div class="row">
           <a class="btn btn-success ">Sync</a>
           <a class="btn btn-info " style="margin-left:2%;margin-right:2%;">Download CSV</a> 
    </div>
    <div class="row" style="margin-top :3%;">
        @if(count($leads))
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>Adresse</th>
                        <th>City</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leads as $lead)
                   
                        <tr>
                            <td>{{ $lead->field_data['0']->values['0'] }} </td>
                            <td>{{ $lead->field_data['1']->values['0'] }} </td>
                            <td>{{ $lead->field_data['2']->values['0'] }} </td>
                            <td>{{ $lead->field_data['3']->values['0'] }} </td>
                            <td>{{ $lead->field_data['4']->values['0'] }} </td>
                            <td>{{ $lead->field_data['5']->values['0'] }} </td>
                        </tr>
                  
                    @endforeach
                </tbody>
            </table>
        @else
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        There are No leads Yet</div>
        @endif
        </div>
    </div>
</div>

@endsection