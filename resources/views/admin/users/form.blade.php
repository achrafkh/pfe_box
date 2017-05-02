@if(isset($submitButtonText))
 {!! Form::hidden('id', null, null) !!}
 @endif
<div class="form-group {{ $errors->has('fullname') ? 'has-error' : ''}}">
    {!! Form::label('fullname', 'Fullname', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('fullname', null, ['class' => 'form-control']) !!}
        {!! $errors->first('fullname', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
    {!! Form::label('username', 'Username', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('username', null, ['class' => 'form-control']) !!}
        {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::password('password', ['class' => 'form-control']) !!}
        @if(isset($submitButtonText))
            <span class="help-block text-warning">leave this field empty it won't change</span>
        @endif
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}

    </div>
</div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
    {!! Form::label('role', 'Role', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('role_id', $roles, null, ['class' => 'form-control','id' => 'role']) !!}
        {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
    </div>
</div><div id="showroom" class="form-group {{ $errors->has('showroom') ? 'has-error' : ''}}">
    {!! Form::label('showroom', 'Showroom', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('showroom_id', $showrooms, null, ['placeholder' => 'Pick a size...','class' => 'form-control']) !!}
        {!! $errors->first('showroom', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
