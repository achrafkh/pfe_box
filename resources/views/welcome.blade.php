<!DOCTYPE html>
<html lang="en">
	<head>
		@include('layouts.partials.head')
	</head>
	<body>
		<!-- Preloader -->
		<div class="preloader">
			<div class="cssload-speeding-wheel"></div>
		</div>
		<style type="text/css">
		.login-register{
		background: url(../../plugins/images/login-register1.jpg) center center/cover no-repeat!important;
		}
		</style>
		<section id="wrapper" class="login-register">
			<div class="login-box">
				<div class="white-box">
					<form class="form-horizontal form-material" id="loginform"  role="form" method="POST" action="{{ route('login') }}">
						{{ csrf_field() }}
						<b><img style=" display: block;margin: 0 auto;" src="/logo.jpg" alt="home" /></b>
						<h3 class="box-title m-b-20 text-center">Sign In</h3>
						<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
							<div class="col-xs-12">
								<input id="username" type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}" required autofocus>
								@if ($errors->has('username'))
								<p class="help-block text-danger">{{ $errors->first('username') }}</p>
								@endif
							</div>
						</div> 
						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<div class="col-xs-12">
								<input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
								@if ($errors->has('password'))
								<p class="help-block text-danger">{{ $errors->first('password') }}</p>
								@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<div class="checkbox checkbox-primary pull-left p-t-0">
									<input id="checkbox-signup" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
									<label for="checkbox-signup"> Remember me </label>
								</div>
								{{-- <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> --}}
							</div>
						</div>
						<div class="form-group text-center m-t-20">
							<div class="col-xs-12">
								<button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="login" id="login">Log In</button>
							</div>
						</div>
						{{-- <div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
								<div class="social"><a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip"  title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a> <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip"  title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a> </div>
							</div>
						</div> --}}
						<div class="form-group m-b-0">
							<div class="col-sm-12 text-center">
								<p>Ego vero sic intellego, Patres conscripti, nos hoc tempore in provinciis decernendis perpetuae pacis habere oportere rationem.</p>
							</div>
						</div>
					</form>
					<form class="form-horizontal" id="recoverform" action="index.html">
						<div class="form-group ">
							<div class="col-xs-12">
								<h3>Recover Password</h3>
								<p class="text-muted">Enter your Email and instructions will be sent to you! </p>
							</div>
						</div>
						<div class="form-group ">
							<div class="col-xs-12">
								<input class="form-control" type="text" required="" placeholder="Email">
							</div>
						</div>
						<div class="form-group text-center m-t-20">
							<div class="col-xs-12">
								<button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
		<!-- jQuery -->
		@include('layouts.partials.scripts')
	</body>
</html>