@include('Eshopper.header')<!-- include header blade -->

<section>
		<div class="container">
			<div class="row">
                <div class="col-sm-3 features_items">
                    @include('Eshopper.myaccount') <!-- include my account blade -->
                </div>
                <div class="col-md-9">
                    <div class="col-md-10 col-md-offset-1">
                        <h2 class="title text-center features_items "> My Profile </h2>
                        <!-- Display flash Message in alert start -->
                        @if (session('flash_message'))
                            <div class="alert alert-success">
                                {{ session('flash_message') }}
                            </div>
                        @endif
                        <!-- Display flash Message in alert End -->
                        <form method="POST"  action="{{ route('user.update') }}" data-parsley-validate="">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="name" class="control-label">{{ 'Firstname' }} <font color="red">*</font></label>
                                <input class="form-control" name="firstname" type="text" id="name" value="{{ Auth::user()->firstname }}" data-parsley-pattern="^[a-zA-Z]+$" required="">
                                {!! $errors->first('firstname', '<p class="help-block red">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="name" class="control-label">{{ 'Lastname' }} <font color="red">*</font></label>
                                <input class="form-control" name="lastname" type="text" id="name" value="{{ Auth::user()->lastname }}" data-parsley-pattern="^[a-zA-Z]+$" required="">
                                {!! $errors->first('lastname', '<p class="help-block red">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="name" class="control-label">{{ 'Email' }} <font color="red">*</font></label>
                                <input class="form-control" name="email" type="text" id="name" value="{{ Auth::user()->email }}" data-parsley-type="email" required="">
                                {!! $errors->first('email', '<p class="help-block red">:message</p>') !!}
                            </div>
                            <input type="submit" class="btn btn-primary" value="Update Profile">
                        </form>
                        <br/>
                    </div>
                    
                </div>
            </div>
        </div>
</section>

@include('Eshopper.footer') <!-- include footer blade -->
