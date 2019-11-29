<div class="form-group {{ $errors->has('from') ? 'has-error' : ''}}">
    <label for="from" class="control-label">{{ 'From' }} <font color="red">*</font></label>
    <input class="form-control" name="from" type="text" id="from" value="{{ isset($configuration->from) ? $configuration->from : old('from')}}" data-parsley-type="email" required="" >
    {!! $errors->first('from', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
    <label for="subject" class="control-label">{{ 'Subject' }} <font color="red">*</font></label>
    <input class="form-control" name="subject" type="text" id="subject" value="{{ isset($configuration->subject) ? $configuration->subject : old('subject')}}" required="" >
    {!! $errors->first('subject', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
    <label for="body" class="control-label">{{ 'Body' }} <font color="red">*</font></label>
    <input class="form-control" name="body" type="text" id="body" value="{{ isset($configuration->body) ? $configuration->body : old('body')}}" required="">
    {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('notification_title') ? 'has-error' : ''}}">
    <label for="notification_title" class="control-label">{{ 'Notification Title' }} <font color="red">*</font></label>
    <input class="form-control" name="notification_title" type="text" id="notification_title" value="{{ isset($configuration->notification_title) ? $configuration->notification_title : old('notification_title')}}" required="">
    {!! $errors->first('notification_title', '<p class="help-block">:message</p>') !!}
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
