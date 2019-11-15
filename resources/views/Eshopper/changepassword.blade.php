@include('Eshopper.header')<!-- include header blade -->

<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3 features_items">
                    @include('Eshopper.myaccount')
                </div>
                <div class="col-md-9">
                    <div class="col-md-10 col-md-offset-1">
                        <h2 class="title text-center features_items "> Change Password </h2>
                        <!-- Display flash Message in alert start -->
                        @if (session('flash_message'))
                            <div class="alert alert-success">
                                {{ session('flash_message') }}
                            </div>
                        @endif
                        <!-- Display flash Message in alert End -->
                        <form method="POST"  action="{{ route('user.updatepassword') }}">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="name" class="control-label">{{ 'Current Password' }}</label>
                                <input class="form-control" name="oldpassword" type="password" id="oldpassword" value="" required="">
                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="name" class="control-label">{{ 'New Password' }}</label>
                                <input class="form-control" name="newpassword" type="password" id="newpassword" value="" required="">
                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="name" class="control-label">{{ 'Confirm Password' }}</label>
                                <input class="form-control" name="confirmpassword" type="password" id="confirmpassword" value="" required="">
                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                            </div>
                            <input type="submit" class="btn btn-primary" value="Change Password">
                        </form>
                        <br/>
                    </div>
                    
                </div>
            </div>
        </div>
</section>

@include('Eshopper.footer') <!-- include footer blade -->
