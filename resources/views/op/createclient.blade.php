@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-11">
			<div class="panel panel-default">
				<div class="panel-heading">Add new Client</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ route('createClient') }}">
						@include('op.op-partials.clientform')
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection