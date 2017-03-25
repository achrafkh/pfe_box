@if(Session::has('success'))
	<div class="alert alert-success alert-dismissable">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  <strong>Success!</strong> {!! session('success') !!}
	</div>
@endif
@if(Session::has('error'))
	<div class="alert alert-danger alert-dismissable">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  <strong>Error!</strong> {!! session('error') !!}
	</div>
@endif