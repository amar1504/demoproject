<div class="form-group {{ $errors->has('firstname') ? 'has-error' : ''}}">
    <label for="firstname" class="control-label">{{ 'Firstname' }} <font color="red">*</font></label>
    <input class="form-control" name="firstname" type="text" id="firstname" value="{{ isset($user->firstname) ? $user->firstname : old('firstname')}}" required="">
    {!! $errors->first('firstname', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('lastname') ? 'has-error' : ''}}">
    <label for="lastname" class="control-label">{{ 'Lastname' }} <font color="red">*</font></label>
    <input class="form-control" name="lastname" type="text" id="lastname" value="{{ isset($user->lastname) ? $user->lastname : old('lastname')}}" required="">
    {!! $errors->first('lastname', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}  @if( !isset($user)) {!! '<font color="red">*</font>' !!} @endif</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($user->email) ? $user->email : old('email')}}"  data-parsley-type="email" required="">
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="control-label">{{ 'Password' }} @if( !isset($user)) {!! '<font color="red">*</font>' !!} @endif</label>
    <input class="form-control" name="password" type="password" id="password" value="{{old('password')}}" data-parsley-pattern-message="Password Should be Alphanumeric." data-parsley-pattern="[a-zA-Z]+[0-9]+[a-zA-Z0-9]*" data-parsley-length="[8, 12]" @if( !isset($user)) {{ "required=true" }} @endif >
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('confirmpassword') ? 'has-error' : ''}}">
    <label for="confirm password" class="control-label">{{ 'Confirm Password' }} @if( !isset($user)) {!! '<font color="red">*</font>' !!} @endif</label>
    <input class="form-control" name="confirmpassword" type="password" id="confirmpassword" value="{{old('confirmpassword')}}"  data-parsley-pattern-message="Password Should be Alphanumeric." data-parsley-pattern="[a-zA-Z]+[0-9]+[a-zA-Z0-9]*" data-parsley-equalto="#password"  @if( !isset($user)) {{ "required=true" }} @endif >
    {!! $errors->first('confirmpassword', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }} <font color="red">*</font></label>
    <div class="radio">
    <label><input name="status" type="radio" value="1" {{(old('status') == '1') ? 'checked' : ''}} {{ (isset($user) && 1 == $user->status) ? 'checked' : '' }} required=""> Active</label>
</div>
<div class="radio">
    <label><input name="status" type="radio" value="0" {{(old('status') == '0') ? 'checked' : ''}} {{ (isset($user) && 0 == $user->status) ? 'checked' : '' }} > Inactive</label>
</div>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }} </label>
    <input class="" name="image" type="file" id="image" value="{{ isset($user->image) ? $user->image : ''}}" data-parsley-max-file-size="2048" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('roles') ? 'has-error' : ''}}">
    <label for="roles" class="control-label">{{ 'Role' }} </label>
    <select name="roles" class="form-control" id="roles" required="" >
    <option  value=" ">Select</option>
    @foreach($roles as $role)
        <option  value="{{ $role->id }}" @if( isset($user->roles) ?  $user->roles==$role->id : $role->role_name=='customer'){{'selected'}} @else {{''}} @endif >{{  $role->role_name }}</option>
    @endforeach
</select>
    {!! $errors->first('roles', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    <a href="{{ route('users.index') }}" title="Back"><button type="button" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

</div>
