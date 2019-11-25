<div class="form-group {{ $errors->has('coupon_title') ? 'has-error' : ''}}">
    <label for="coupon_title" class="control-label">{{ 'Coupon Title' }} <font color="red">*</font></label>
    <input class="form-control" name="coupon_title" type="text" id="coupon_title" value="{{ isset($coupon->coupon_title) ? $coupon->coupon_title : old('coupon_title')}}" required="" >
    {!! $errors->first('coupon_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
    <label for="code" class="control-label">{{ 'Code' }} <font color="red">*</font></label>
    <input class="form-control" name="code" type="text" id="code" value="{{ isset($coupon->code) ? $coupon->code : old('code')}}"  required="">
    {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }} <font color="red">*</font></label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" data-parsley-minlength="10" required="">{{ isset($coupon->description) ? $coupon->description : old('description')}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('discount') ? 'has-error' : ''}}">
    <label for="discount" class="control-label">{{ 'Discount/Amount' }} <font color="red">*</font></label>
    <input class="form-control" name="discount" type="text" id="discount" value="{{ isset($coupon->discount) ? $coupon->discount : old('discount')}}" data-parsley-type="number"  required="" >
    {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }} <font color="red">*</font></label>
    <select name="type" class="form-control "  id="type" required="" >
        <option value=" ">Select</option>
        @if(isset($coupon->type) && $coupon->type==1) 
        <option value="1" {{ (isset($coupon->type) && $coupon->type == 1) ? 'selected' : ''}}>{{ 'Discount' }}</option>
        @elseif(isset($coupon->type) && $coupon->type==2) 
        <option value="2" {{ (isset($coupon->type) && $coupon->type == 2) ? 'selected' : ''}}>{{ 'Amount' }}</option>
        @else
        <option value="1" {{ (isset($coupon->type) && $coupon->type == 1) ? 'selected' : ''}}>{{ 'Discount' }}</option>    
        <option value="2" {{ (isset($coupon->type) && $coupon->type == 2) ? 'selected' : ''}}>{{ 'Amount' }}</option>
        @endif
</select>
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }} <font color="red">*</font></label>
    <div class="radio">
    <label><input name="status" type="radio" value="1" {{ (isset($coupon) && 1 == $coupon->status) ? 'checked' : '' }} required=""> Active</label>
</div>
<div class="radio">
    <label><input name="status" type="radio" value="0" {{ (isset($coupon) && 0 == $coupon->status) ? 'checked' : '' }} > Inactive</label>
</div>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    <a href="{{ route('coupon.index') }}" title="Back"><button type="button" class="btn btn-warning "><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    
</div>
