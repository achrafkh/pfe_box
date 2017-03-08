{{ csrf_field() }}

@if(isset($client))
<input type="hidden" name="id" value="{{ $client->id }} ">
@endif
<div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
	<label for="firstname" class="col-md-4 control-label">firstname</label>
	<div class="col-md-6">
		<input id="firstname" type="text" class="form-control" name="firstname" value="{{ isset($client) ? $client->firstname : old('firstname')  }}" required autofocus>
		@if ($errors->has('firstname'))
		<span class="help-block">
			<strong>{{ $errors->first('firstname') }}</strong>
		</span>
		@endif
	</div>
</div>
<div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
	<label for="lastname" class="col-md-4 control-label">lastname</label>
	<div class="col-md-6">
		<input id="lastname" type="text" class="form-control" name="lastname" required value=" {{ isset($client) ? $client->lastname : old('firstname') }} ">
		@if ($errors->has('lastname'))
		<span class="help-block">
			<strong>{{ $errors->first('lastname') }}</strong>
		</span>
		@endif
	</div>
</div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	<label for="email" class="col-md-4 control-label">email</label>
	<div class="col-md-6">
		<input id="email" type="email" class="form-control" name="email" value="{{ isset($client) ? $client->email : old('email') }} " required autofocus>
		@if ($errors->has('email'))
		<span class="help-block">
			<strong>{{ $errors->first('email') }}</strong>
		</span>
		@endif
	</div>
</div>
<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
	<label for="phone" class="col-md-4 control-label">Phone Numbere</label>
	<div class="col-md-6">
		<input id="phone" type="tel" class="form-control" name="phone" value="{{  isset($client) ? $client->phone : old('phone')  }}" required autofocus>
		@if ($errors->has('phone'))
		<span class="help-block">
			<strong>{{ $errors->first('phone') }}</strong>
		</span>
		@endif
	</div>
</div>
<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
	<label for="address" class="col-md-4 control-label">address</label>
	<div class="col-md-6">
		<input id="address" type="text" class="form-control" name="address" value="{{ isset($client) ? $client->address : old('address')  }}" required autofocus>
		@if ($errors->has('address'))
		<span class="help-block">
			<strong>{{ $errors->first('address') }}</strong>
		</span>
		@endif
	</div>
</div>
<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
	<label for="city" class="col-md-4 control-label">city</label>
	<div class="col-md-6">
		<input id="city" type="text" class="form-control" name="city" value="{{ isset($client) ? $client->city : old('city')  }}" required autofocus>
		@if ($errors->has('city'))
		<span class="help-block">
			<strong>{{ $errors->first('city') }}</strong>
		</span>
		@endif
	</div>
</div>
<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
	<label for="state" class="col-md-4 control-label">state</label>
	<div class="col-md-6">
		<input id="state" type="text" class="form-control" name="state" value="{{ isset($client) ? $client->state : old('state') }}" required autofocus>
		@if ($errors->has('state'))
		<span class="help-block">
			<strong>{{ $errors->first('state') }}</strong>
		</span>
		@endif
	</div>
</div>
<div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
	<label for="birthdate" class="col-md-4 control-label">birthdate</label>
	<div class="col-md-6">
		<input id="birthdate" type="date" class="form-control" name="birthdate" value="{{ isset($client) ? $client->birthdate : old('birthdate')  }}" required autofocus>
		@if ($errors->has('birthdate'))
		<span class="help-block">
			<strong>{{ $errors->first('birthdate') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group">
	<div class="col-md-8 col-md-offset-4">
		<button type="submit" class="btn btn-primary">
		{{ isset($client) ? 'Update' : 'Create'  }}
		</button>
	</div>
</div>