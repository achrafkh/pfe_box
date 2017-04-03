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
                <div class="panel-heading">Edit invoice #{{ $invoice->id }}</div>
                <div class="panel-body">
                    {!! Form::open(['url' => '/invoices/'.$invoice->id,'method' => 'PUT' , 'class' => 'form-horizontal', 'files' => true]) !!}
                    <input type="hidden" name="appointment_id" value="{{ $invoice->appointment_id }}">
                    <input type="hidden" name="showroom_id" value="{{ $invoice->showroom_id }}">
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
                        <?php $i = 0; ?>
                        @foreach($invoice->items as $index => $item)
                            <tr id='addr{{ $i }}'>
                                <td>
                                    1
                                </td>
                                <td>
                                    <input type="text" name='desc[]'  placeholder='Description' class="form-control" value="{{ $item->description }} "/>
                                </td>
                                <td>
                                    <input type="text" name='quantity[]' placeholder='Quantity' class="form-control" value="{{ $item->quantity }}" />
                                </td>
                                <td>
                                    <input type="text" name='price[]' placeholder='Price' class="form-control" value="{{ $item->price }}" />
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                        <tr id='addr{{$i}}'></tr>
                    </tbody>
                </table>
                <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                    {!! Form::label('status', 'Status', ['class' => 'col-md-1 control-label']) !!}
                    <div class="col-md-4">
                        <select class="form-control" name="status" id="status" required="">
                            <option value="pending" {{ ($invoice->status == 'pending') ? 'selected' : ''}} >Pending</option>
                            <option value="paid" {{ ($invoice->status == 'paid') ? 'selected' : ''}}>Paid</option>
                            <option value="canceled" {{ ($invoice->status == 'canceled') ? 'selected' : ''}}>Canceled</option>
                        </select>
                    </div>
                </div>
                <a id="add_row" class="btn btn-info pull-left">Add Row</a>
                <a id='delete_row' class="pull-left btn btn-danger" style="margin-left:1%;">Delete Row</a>
                <div class="pull-right">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection



@section('js')

<script>

var i = {{ $i }};
console.log(status);
$(document).ready(function(){

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