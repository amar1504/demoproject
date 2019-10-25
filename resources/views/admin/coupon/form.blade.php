<div class="form-group {{ $errors->has('coupon_title') ? 'has-error' : ''}}">
    <label for="coupon_title" class="control-label">{{ 'Coupon Title' }}</label>
    <input class="form-control" name="coupon_title" type="text" id="coupon_title" value="{{ isset($coupon->coupon_title) ? $coupon->coupon_title : ''}}" >
    {!! $errors->first('coupon_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
    <label for="code" class="control-label">{{ 'Code' }}</label>
    <input class="form-control" name="code" type="text" id="code" value="{{ isset($coupon->code) ? $coupon->code : ''}}" >
    {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ isset($coupon->description) ? $coupon->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('discount') ? 'has-error' : ''}}">
    <label for="discount" class="control-label">{{ 'Discount' }}</label>
    <input class="form-control" name="discount" type="number" id="discount" value="{{ isset($coupon->discount) ? $coupon->discount : ''}}" >
    {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }}</label>
    <select name="type" class="form-control" id="type" >
        <option     value="0">Select</option>
        <option value="1" {{ (isset($coupon->type) && $coupon->type == 1) ? 'selected' : ''}}>{{ 'Discount' }}</option>
        <option value="1" {{ (isset($coupon->type) && $coupon->type == 2) ? 'selected' : ''}}>{{ 'Amount' }}</option>
</select>
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
