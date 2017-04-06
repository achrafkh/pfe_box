@extends('layouts.master')
@section('breadcumbs')
<div class="row bg-title">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h4 class="page-title">Invoice #50541654</h4>
	</div>
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="{{ url('/admin') }} ">Invoices</a></li>
			<li class="active">View</li>
		</ol>
	</div>
	<!-- /.col-lg-12 -->
</div>
@endsection
@section('content1')
<div class="row">
	<div class="col-md-12">
		<div class="white-box printableArea">
			<h3><b>INVOICE</b> <span class="pull-right">#{{ $appointment->invoice->id }}</span></h3>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<div class="pull-left"> <address>
						<h3> &nbsp;<b class="text-danger">{{ config('app.name') }}</b></h3>
						<p class="text-muted m-l-5"><strong>Showroom : </strong>{{ $showroom->city }}, <br/>
							Box ADS, <br/>
							KheirEddne, 364002<br/>
						</p><br/>

						<strong>Status : </strong>
						@if($appointment->invoice->status == 'done')
                        <span class="label label-success font-weight-100">Paid</span>
                      @elseif($appointment->invoice->status =='pending')
                        <span class="label label-primary font-weight-100">Pending</span>
                      @else
                        <span class="label label-danger font-weight-100">Canceled</span>
                      @endif
					</address> </div>
					<div class="pull-right text-right"> <address>
						<h3>To,</h3>
						@if(Auth::user()->role->title == "mark")
						<h4 class="font-bold">{{ $appointment->client->firstname . ' '. $appointment->client->lastname  }}</h4>
						@else
						<h4 class="font-bold"><a onclick="goto()" style="text-decoration: none;cursor: pointer;">{{ $appointment->client->firstname . ' '. $appointment->client->lastname  }}</a></h4>
						@endif
						<p class="text-muted m-l-30">{{ $appointment->client->city }} <br/>
							{{ $appointment->client->address }}, <br/>
							{{$appointment->client->phone }}, <br/>
						{{$appointment->client->email}} </p>
						<p class="m-t-30"><b>Appointment Date :</b> <i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($appointment->start_at)->format('l jS \\of F Y ')  }} </p>
						<p><b>Invoice Date :</b> <i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($appointment->invoice->created_at)->format('l jS \\of F Y ')  }} </p>
					</address> </div>
				</div>
				<div class="col-md-12">
					<div class="table-responsive m-t-40" style="clear: both;">>
						<table class="table table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th>Description</th>
									<th class="text-right">Quantity</th>
									<th class="text-right">Unit Cost</th>
									<th class="text-right">Total</th>
								</tr>
							</thead>
							<tbody>
							<?php $total = 0; ?>
                            @foreach($appointment->invoice->items as $item)
                            <?php $total += ($item->quantity * $item->price) ?>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>{{ $item->description }}</td>
                                    <td class="text-right">{{ $item->quantity }} </td>
                                    <td class="text-right">TND {{ $item->price }} </td>
                                    <td class="text-right">TND {{ ($item->quantity * $item->price) }} </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="pull-right m-t-30 text-right">
                        <p>Sub - Total amount: TND {{ $total }}</p>
                        <p>vat (10%) : {{ $total * 0.10 }} </p>
                        <hr>
                    <h3><b>Total :</b>TND {{ $total * 1.10 }}</h3> </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="text-right">
                        <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')



<script src="/js/jquery.PrintArea.js" type="text/JavaScript"></script>
<script>
var url = {!! json_encode(url(Auth::user()->role->title . '/client/'.$appointment->client->id))!!};
function goto() {
    window.location.href = url;
}
$(document).ready(function () {
    $("#print").click(function () {
        var mode = 'iframe'; //popup
        var close = mode == "popup";
        var options = {
            mode: mode,
            popClose: close
        };
        $("div.printableArea").printArea(options);
    });
}); 
</script>

@endsection