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
                        <form method="POST"  action="{{ route('user.updatepassword') }}" data-parsley-validate="">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="name" class="control-label">{{ 'Current Password' }} <font color="red">*</font></label>
                                <input class="form-control" name="oldpassword" type="password" id="oldpassword" data-parsley-length="[8, 12]" data-parsley-type="alphanum"	 value="" required="">
                                {!! $errors->first('oldpassword', '<p class="help-block red">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="name" class="control-label">{{ 'New Password' }} <font color="red">*</font></label>
                                <input class="form-control" name="newpassword" type="password" id="newpassword" value="" data-parsley-length="[8, 12]" data-parsley-type="alphanum"	 required="">
                                {!! $errors->first('newpassword', '<p class="help-block red">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="name" class="control-label">{{ 'Confirm Password' }} <font color="red">*</font></label>
                                <input class="form-control" name="confirmpassword" type="password" id="confirmpassword" value=""  data-parsley-equalto="#newpassword" required="">
                                {!! $errors->first('confirmpassword', '<p class="help-block red">:message</p>') !!}
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
