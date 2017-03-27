{{ csrf_field() }}
<div class="p-10">
<input type="hidden" class="form-control" id="client_id-{{ $action }}" name="client_id" value="{{ $client->id }} ">
<div class="form-group">
	<label for="note">Title:</label>
	<input type="text" class="form-control" name="title" id="title-{{ $action }}" value="">
</div>
<div class="form-group">
	<label for="note">Note:</label>
	<textarea class="form-control" name="notes" id="notes-{{ $action }}" value=""></textarea>
</div>
<div class="form-group start-date">
	<label class="control-label" for="start-date">Day</label>
	<div class="input-group">
		<input  name="day" id="date-{{ $action }}" type="text" class="form-control thedatepicker" placeholder="yyyy/mm/dd" name="birthdate"  required> <span class="input-group-addon"><i class="icon-calender"></i></span>
	</div>
	<div class="input-group end-date-time col-md-12">
		<div class="col-md-6">
			<label class="m-t-40">Start Time</label>
			<div id="start_clock" class="input-group clockpicker " data-placement="top" data-align="top" data-autoclose="true">
				<input name="start_at" id="start-time-{{ $action }}" type="text" class="form-control" value="13:14"> <span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span> </span>
			</div>
		</div>
		<div class="col-md-6">
			<label class="m-t-40">End Time</label>
			<div id="end_clock" class="input-group clockpicker " data-placement="top" data-align="top" data-autoclose="true">
				<input name="end_at" id="end-time-{{ $action }}" type="text" class="form-control" value="14:14"> <span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span> </span>
			</div>
		</div>
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
</div>