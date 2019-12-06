@include('Eshopper.header')

	<section ><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
					 	<!-- Display flash Message in alert start -->
						@if (session('info'))
							<div class="alert alert-info text-center">
								{{ session('info') }}
							</div>
						@endif
						<!-- Display flash Message in alert End -->
						<h2>Login to your account</h2>
						<form method="POST" action="{{ route('login') }}">
							{{csrf_field()}}
							<label for="email" class="control-label">{{ 'Email' }} <font color="red">*</font></label>
							<input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
							<label for="password" class="control-label">{{ 'Password' }} <font color="red">*</font></label>
							<input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
							@if ($errors->has('password'))
								<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
						
							<span>
								<!--<input type="checkbox" class="checkbox"> 
								Keep me signed in-->
								<a href="{{ route('forgot.passwordview') }}"> Forgot password ? </a>
							</span>
							<button type="submit" class="btn btn-default">Login</button>
							<hr/>
							<h4>Login with</h4>
						<a href="{{ url('auth/google') }}" class="btn btn-lg btn-google btn-block ">
							<i class="fa fa-google-plus" aria-hidden="true"></i>&emsp;<strong>Login with  Google</strong>
		
						</a>
						<a href="{{ url('auth/facebook') }}" class="btn btn-lg btn-fb btn-block ">
							<i class="fa fa-facebook-square"  aria-hidden="true"></i>&emsp;<strong> Login with Facebook </strong>
						</a>  
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<!-- Display flash Message in alert start -->
						@if (session('flash_message'))
								<div class="alert alert-info text-center">
									{{ session('flash_message') }}
								</div>
						@endif
						<!-- Display flash Message in alert End -->
						<h2>New User Signup!</h2>
						<form method="POST" action="{{ route('customer.store') }}" accept-charset="UTF-8"  enctype="multipart/form-data">
                            {{ csrf_field() }}


							<div class="form-group {{ $errors->has('firstname') ? 'has-error' : ''}}">
								<label for="firstname" class="control-label">{{ 'Firstname' }} <font color="red">*</font></label>
								<input class="form-control" name="firstname" type="text" id="firstname" value="{{  old('firstname')}}" required="">
								{!! $errors->first('firstname', '<p class="help-block">:message</p>') !!}
							</div>
							<div class="form-group {{ $errors->has('lastname') ? 'has-error' : ''}}">
								<label for="lastname" class="control-label">{{ 'Lastname' }} <font color="red">*</font></label>
								<input class="form-control" name="lastname" type="text" id="lastname" value="{{  old('lastname')}}" required="">
								{!! $errors->first('lastname', '<p class="help-block">:message</p>') !!}
							</div>
							<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
								<label for="email" class="control-label">{{ 'Email' }} <font color="red">*</font></label>
								<input class="form-control" name="email" type="text" id="email" value="{{ old('email')}}"  data-parsley-type="email" required="">
								{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
							</div>
							<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
								<label for="password" class="control-label">{{ 'Password' }} <font color="red">*</font></label>
								<input class="form-control" name="password" type="password" id="password" value="{{old('password')}}" data-parsley-length="[8, 12]" required="">
								{!! $errors->first('password', '<p class="help-block">:message</p>') !!}
							</div>

							<div class="form-group {{ $errors->has('confirmpassword') ? 'has-error' : ''}}">
								<label for="confirm password" class="control-label">{{ 'Confirm Password' }} <font color="red">*</font></label>
								<input class="form-control" name="confirmpassword" type="password" id="confirmpassword" value="{{old('confirmpassword')}}" data-parsley-equalto="#password"  required="">
								{!! $errors->first('confirmpassword', '<p class="help-block">:message</p>') !!}
							</div>
							<input type="hidden" name="roles" value="{{ $role_id }}">
							<input type="hidden" name="status" value="1">


							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form--><br/>
@include('Eshopper.footer')




