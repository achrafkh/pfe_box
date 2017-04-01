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
                <div class="panel-heading">Invoices</div>
                <div class="panel-body">
                @if((bool) $invoices->count())
                    {!! Form::open(['method' => 'GET', 'url' => '/invoices', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                    <div class="input-group" style="margin-top: -5%;">
                        <input type="text" class="form-control" name="search" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                            <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    {!! Form::close() !!}
                    <br /><br />
                    <hr>
                
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Invoice #</th>
                                    <th>Client</th>
                                    <th>Showroom</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tbody>
                                    @foreach($invoices as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->appointment->client->firstname .' '.$item->appointment->client->lastname }}</td>
                                        <td>{{ $item->showroom->city }}</td>
                                        <td><span class="text-muted"><i class="fa fa-clock-o"></i>{{ $item->created_at->format('l jS \\of F Y ') }}</span> </td>
                                        
                                        @if($item->status == 'paid')
                                            <td><div class="label label-table label-success">{{ $item->status }}</div></td>
                                        @elseif($item->status == 'pending')
                                            <td><div class="label label-table label-primary">{{ $item->status }}</div></td>
                                        @else
                                            <td><div class="label label-table label-danger">{{ $item->status }}</div></td>
                                        @endif
                                        <td>TND {{ $item->total }}</td>
                                        <td>
                                            <a href="{{ url('/invoice/'. $item->showroom_id .'/'. $item->appointment_id) }}" title="View invoice"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/invoices/' . $item->id . '/edit') }}" title="Edit invoice"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['/invoices', $item->id],
                                            'style' => 'display:inline'
                                            ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-xs',
                                            'title' => 'Delete invoice',
                                            'onclick'=>'return confirm("Confirm delete?")'
                                            )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </tbody>
                        </table>
                    </div>
                @else
                <div class="alert alert-warning">Currently There are no invoices . </div>
                @endif
                    <div class="pagination-wrapper"> {!! $invoices->appends(['search' => Request::get('search')])->render() !!} </div>
                    
                </div>
            </div>
        </div>
</div>
@endsection



