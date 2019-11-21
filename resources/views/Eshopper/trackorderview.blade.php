@include('Eshopper.header')<!-- include header blade -->

<section>
		<div class="container">
			<div class="row">
                <div class="col-sm-3 features_items">
                    @include('Eshopper.myaccount') <!-- include my account blade -->
                </div>
                <div class="col-md-9">
                    <div class="col-md-10 col-md-offset-1">
                        <h2 class="title text-center features_items "> Track Order </h2>
                        <!-- Display flash Message in alert start -->
                        @if (session('flash_message'))
                            <div class="alert alert-success">
                                {{ session('flash_message') }}
                            </div>
                        @endif
                        <!-- Display flash Message in alert End -->
                        <form method="POST"  action="{{ route('user.trackorder') }}" data-parsley-validate="">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('order_id') ? 'has-error' : ''}}">
                                <label for="order_id" class="control-label">{{ 'Order Id' }} <font color="red">*</font></label>
                                <input type="text" class="form-control" name="order_id"  id="order_id" value="{{ old('order_id') }}"  required="">
                                {!! $errors->first('order_id', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                <label for="email" class="control-label">{{ 'Email Id' }} <font color="red">*</font></label>
                                <input type="email" class="form-control" name="email"  id="email" value="{{ old('email') }}"  required="">
                                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                            </div>
                            
                            <input type="submit" class="btn btn-primary" value="Track My Order">
                        </form>
                        <br/>
                    </div>
                    
                </div>
            </div>
        </div>
</section>

@include('Eshopper.footer') <!-- include footer blade -->
