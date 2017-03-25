<div class="form-group">
	<label class="col-md-12">First Name</label>
	<div class="col-md-12">
		<input id="firstname" type="text" class="form-control form-control-line" name="firstname" value="{{ $client->firstname }}" required autofocus>
		@if ($errors->has('firstname'))
		<span class="help-block">
			<p class="text-danger">{{ $errors->first('firstname') }}</p>
		</span>
		@endif
	</div>
</div>
<div class="form-group">
	<label class="col-md-12">Last Name</label>
	<div class="col-md-12">
		<input id="lastname" type="text" class="form-control form-control-line" name="lastname" value="{{ $client->lastname }}" required autofocus>
		@if ($errors->has('lastname'))
		<span class="help-block">
			<p class="text-danger">{{ $errors->first('lastname') }}</p>
		</span>
		@endif
	</div>
</div>
<div class="form-group">
	<label for="example-email" class="col-md-12">Email</label>
	<div class="col-md-12">
		<input id="email" type="text" class="form-control form-control-line" name="email" required value="{{ $client->email }}">
		@if ($errors->has('email'))
		<span class="help-block">
			<p class="text-danger">{{ $errors->first('email') }}</p>
		</span>
		@endif
	</div>
</div>

<div class="form-group">
	<label class="col-md-12">Phone No</label>
	<div class="col-md-12">
		<input id="phone" type="tel" class="form-control form-control-line" name="phone" value="{{ $client->phone }}" required autofocus>
		@if ($errors->has('phone'))
		<span class="help-block">
			<p class="text-danger">{{ $errors->first('phone') }}</p>
		</span>@endif
	</div>
</div>
<div class="form-group">
	<label class="col-md-12">Address</label>
	<div class="col-md-12">
		<input id="address" type="tel" class="form-control form-control-line" name="address" value="{{ $client->address }}" required autofocus>
		@if ($errors->has('address'))
		<span class="help-block">
			<p class="text-danger">{{ $errors->first('adddress') }}</p>
		</span>@endif
	</div>
</div>
<div class="form-group">
	<label class="col-sm-12">Select City</label>
	<div class="col-sm-12">
		<select class="form-control form-control-line" name="city">
			<option>London</option>
			<option>India</option>
			<option>Usa</option>
			<option>Canada</option>
			<option>Thailand</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-12">Select State</label>
	<div class="col-sm-12">
		<select class="form-control form-control-line" name="state">
			<option>London</option>
			<option>India</option>
			<option>Usa</option>
			<option>Canada</option>
			<option>Thailand</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="col-md-12">Birth Date</label>
	<div class="col-md-12">
		<div class="input-group">
			<input id="datepicker-autoclose" type="text" class="form-control mydatepicker" placeholder="yyyy/mm/dd" name="birthdate"  required> <span class="input-group-addon"><i class="icon-calender"></i></span>
		</div>
		@if ($errors->has('birthdate'))
		<span class="help-block">
			<p class="text-danger">{{ $errors->first('birthdate') }}</p>
		</span>
		@endif
	</div>
</div>


<div class="form-group">
	<div class="col-sm-12">
		<button class="btn btn-success" type="submit">Update Profile</button>
	</div>
</div>
