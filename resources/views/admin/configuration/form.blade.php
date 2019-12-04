<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }} <font color="red">*</font></label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($configuration->name) ? $configuration->name : old('name')}}" required="" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('value') ? 'has-error' : ''}}">
    <label for="value" class="control-label">{{ 'Value' }} <font color="red">*</font></label>
    <input class="form-control" name="value" type="text" id="value" value="{{ isset($configuration->value) ? $configuration->value : old('value')}}" required="">
    {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }} <font color="red">*</font></label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($configuration->title) ? $configuration->title : old('title')}}" required="">
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }} <font color="red">*</font></label>
    <div class="radio">
    <label><input name="status" type="radio" value="1" {{(old('status') == '1') ? 'checked' : ''}} {{ (isset($configuration) && 1 == $configuration->status) ? 'checked' : '' }} required=""> Active</label>
</div>
<div class="radio">
    <label><input name="status" type="radio" value="0" {{(old('status') == '0') ? 'checked' : ''}}  {{ (isset($configuration) && 0 == $configuration->status) ? 'checked' : '' }} > Inactive</label>
</div>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    <a href="{{ route('configuration.index') }}" title="Back"><button type="button" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
</div>
