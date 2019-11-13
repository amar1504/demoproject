<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($address->name) ? $address->name : old('name')}}" required="">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address1') ? 'has-error' : ''}}">
    <label for="address1" class="control-label">{{ 'Address1' }}</label>
    <textarea class="form-control" rows="5" name="address1" type="textarea" id="address1" required="" >{{ isset($address->address1) ? $address->address1 : old('address1')}}</textarea>
    {!! $errors->first('address1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address2') ? 'has-error' : ''}}">
    <label for="address2" class="control-label">{{ 'Address2' }}</label>
    <textarea class="form-control" rows="5" name="address2" type="textarea" id="address2" >{{ isset($address->address2) ? $address->address2 : old('address2')}}</textarea>
    {!! $errors->first('address2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('country') ? 'has-error' : ''}}">
    <label for="country" class="control-label">{{ 'Country' }}</label>
    <input class="form-control" name="country" type="text" id="country" value="{{ isset($address->country) ? $address->country : old('country')}}" required="">
    {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('state') ? 'has-error' : ''}}">
    <label for="state" class="control-label">{{ 'State' }}</label>
    <input class="form-control" name="state" type="text" id="state" value="{{ isset($address->state) ? $address->state : old('state')}}" required="">
    {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
    <label for="city" class="control-label">{{ 'City' }}</label>
    <input class="form-control" name="city" type="text" id="city" value="{{ isset($address->city) ? $address->city : old('city')}}" required="">
    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('zipcode') ? 'has-error' : ''}}">
    <label for="zipcode" class="control-label">{{ 'Zipcode' }}</label>
    <input class="form-control" name="zipcode" type="text" id="zipcode" value="{{ isset($address->zipcode) ? $address->zipcode : old('zipcode') }}" required="">
    {!! $errors->first('zipcode', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('mobileno') ? 'has-error' : ''}}">
    <label for="mobileno" class="control-label">{{ 'Mobileno' }}</label>
    <input class="form-control" name="mobileno" type="text" id="mobileno" value="{{ isset($address->mobileno) ? $address->mobileno : old('mobileno')}}" required="">
    {!! $errors->first('mobileno', '<p class="help-block">:message</p>') !!}
</div>

<input type="hidden" name="user_id" value="{{Auth::user()->id}}">


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    
</div>
