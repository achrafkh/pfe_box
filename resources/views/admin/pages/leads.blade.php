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
     <a href="{{ url('/admin/pages') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
    <p style="padding-top:2%;">Form ID : {{ $form->id }}</p>
    <div class="row">
           <a href="#" class="btn btn-success " id="sync">Sync <i id="spin" class=""></i></a>
           <a target="_blank" class="btn btn-info " href=" {{ url($form->leadgen_export_csv_url) }} " style="margin-left:2%;margin-right:2%;">Download CSV</a> 
    </div>
    <div class="row" style="margin-top :3%;">
        @if(count($leads))
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Phone</th>
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


@section('js')
<script type="text/javascript">
var formid = {!! json_encode($form->id) !!}
    $(window).load(function() {
        $("#sync").unbind('click').bind("click", function(e) {
            $("#spin").fadeToggle("slow").toggleClass('fa fa-spinner fa-spin');
            e.preventDefault();
            $.ajax({
                url: '/admin/leads/sync',
                type: 'post',
                dataType: 'json',
                data: {'formid':formid},
                success: function(data) {
                    if(data)
                    {
                        showAlert('success', 'Success','Form : '+ formid +' Data Are being Synced');
                    } else{
                        showAlert('error', 'Error','Something Went Wrong!');
                    }
                    $("#spin").fadeToggle("slow").toggleClass('fa fa-spinner fa-spin');
                },
                error: function(errors) {
                    showAlert('error', 'Error','Something Went Wrong!');
                    $("#spin").fadeToggle("slow").toggleClass('fa fa-spinner fa-spin');
                }
            });
        });
    });
</script>
@endsection