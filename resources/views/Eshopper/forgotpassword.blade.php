@include('Eshopper.header')
<section ><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="login-form "><!--login form-->
						<h2>Forgot Your Password ?</h2><hr/>
                        <!-- <h6>Enter Your Email Address</h6> -->
											
						<!-- Display flash Message in alert start -->
						@if (session('flash_message'))
							<div class="alert alert-warning">
								{{ session('flash_message') }}
							</div>
						<!-- Display flash Message in alert End -->
						@else
						
						<form method="POST" action="{{ route('forgot.password') }}">
							{{csrf_field()}}
							<label for="email" class="control-label">{{ 'Email' }} <font color="red">*</font></label>
							<input id="email" type="email" class="form-control" name="email" placeholder="example@gmail.com" value="{{ old('email') }}" required autofocus>
							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
							
							<button type="submit" class="btn btn-default">Send</button>
						</form>
						@endif
					</div><!--/login form-->
				</div>
				
			</div>
		</div>
	</section><!--/form--><br/>
@include('Eshopper.footer')
