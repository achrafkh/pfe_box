{{ csrf_field() }}

<input type="hidden" class="form-control" id="client_id-{{ $action }}" name="client_id" value="{{ $client->id }} ">
@if($action == 'update')
	<input type="hidden" class="form-control" id="appid" name="id" value="">
@endif
<div class="form-group">
	<label for="note">Title:</label>
	<input type="text" class="form-control" name="title" id="title-{{ $action }}">
</div>
<div class="form-group">
	<label for="note">Note:</label>
	<textarea class="form-control" name="notes" id="notes-{{ $action }}"></textarea>
</div>

<div class="form-group start-date">
	<label class="control-label" for="start-date">Day</label>
	<div class="input-group start-date-time">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
		<input class="form-control" name="day" id="date-{{ $action }}" type="date">
		
	</div>
	<div class="row" style="margin-left: 2%;margin-right: 2%">
		<label class="control-label pull-left" for="start-date">Start time:</label>
		<label class="control-label pull-right" for="end-date">End Time:</label>
	</div>
	<div class="input-group end-date-time">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-time" aria-hidden="true"></span></span>
		<input class="form-control" name="start_at" id="start-time-{{ $action }}" type="time">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-time" aria-hidden="true"></span></span>
		<input  class="form-control" name="end_at" id="end-time-{{ $action }}" type="time">
		
	</div>
</div>
<div class="input-group col-sm-12 col-md-12">
	<div>
		<label class="control-label col-sm-6 pull-left" for="showroom">Select Showroom</label>
	</div>
	
	<div class="col-sm-6">
		<select class="form-control input-large showroom" name="showroom_id" id="showroom_id-{{ $action }}">
			@foreach($showrooms as $showroom)
			<option value="{{ $showroom->id }} "> {{ $showroom->city }} </option>
			@endforeach
		</select>
	</div>
</div>
