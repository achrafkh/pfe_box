@extends('layouts.master')
@section('breadcumbs')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Create Invoice</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }} ">Dashboard</a></li>
            <li class="active">Create Invoice</li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection
@section('content1')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New invoice</div>
                    <div class="panel-body">
                        <a href="{{ url('/invoices') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />
                        {!! Form::open(['url' => '/invoice/create', 'class' => 'form-horizontal', 'files' => true]) !!}

                        <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                        <input type="hidden" name="showroom_id" value="{{ $showroom->id }}">
                        <h4 class="page-title">Invoice Items</h4>
                            <table class="table table-bordered table-hover" id="tab_logic">
                                <thead>
                                    <tr >
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th class="text-center">
                                            Description
                                        </th>
                                        <th class="text-center">
                                            Quantity
                                        </th>
                                        <th class="text-center">
                                            Price
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id='addr0'>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            <input type="text" name='desc[]'  placeholder='Description' class="form-control"/>
                                        </td>
                                        <td>
                                            <input type="text" name='quantity[]' placeholder='Quantity' class="form-control"/>
                                        </td>
                                        <td>
                                            <input type="text" name='price[]' placeholder='Price' class="form-control"/>
                                        </td>
                                    </tr>
                                <tr id='addr1'></tr>
                            </tbody>
                            </table>

                            <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                                {!! Form::label('status', 'Status', ['class' => 'col-md-1 control-label']) !!}
                                <div class="col-md-4">
                                   <select class="form-control" name="status" required="">
                                        <option value="pending">Pending</option>
                                        <option value="paid">Paid</option>
                                    </select>
                                </div>
                            </div>
                        <a id="add_row" class="btn btn-info pull-left">Add Row</a>
                        <a id='delete_row' class="pull-left btn btn-danger" style="margin-left:1%;">Delete Row</a>
                        <div class="pull-right">
                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

<script>
$(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='desc[]' type='text' placeholder='Description' class='form-control input-md'  /> </td><td><input  name='quantity[]' type='text' placeholder='Quantity'  class='form-control input-md'></td><td><input  name='price[]' type='text' placeholder='Price'  class='form-control input-md'></td>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
  });
     $("#delete_row").click(function(){
         if(i>1){
         $("#addr"+(i-1)).html('');
         i--;
         }
     });

});
</script>

@endsection