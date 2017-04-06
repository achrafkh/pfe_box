@extends('layouts.master')
@section('breadcumbs')
<div class="row bg-title">
	<!-- .page title -->
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h4 class="page-title">Dashboard</h4>
	</div>
	<!-- /.page title -->
	<!-- .breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="{{ url('/'.Auth::user()->role->title.'/dashboard') }} ">Dashboard</a></li>
			<li class="active">Showrooms</li>
		</ol>
	</div>
	<!-- /.breadcrumb -->
</div>
<!-- .row -->
@endsection
@section('content1')

<div class="row">
	<div class="white-box">
		<h3 class="box-title">Showrooms List</h3>
		<div class="table-responsive">
			<table class="table color-table inverse-table">
				<thead>
					<tr>
						<th>#ID</th>
						<th>City</th>
						<th>Agents Count</th>
						<th>Monthly Sales</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($showrooms as $showroom)
						<tr>
							<td>{{$showroom->id }} </td>
							<td>{{$showroom->city }}</td>
							<td>{{$showroom->users->count() }}</td>
							<td>TND {{$showroom->invoices->where('status','paid')->sum('total') }}</td>
							<td><a href="{{ url('mark/showroom/'. $showroom->id) }}" title="View Showroom"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection