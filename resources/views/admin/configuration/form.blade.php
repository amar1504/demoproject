<div class="form-group {{ $errors->has('from') ? 'has-error' : ''}}">
    <label for="from" class="control-label">{{ 'From' }}</label>
    <input class="form-control" name="from" type="text" id="from" value="{{ isset($configuration->from) ? $configuration->from : ''}}" >
    {!! $errors->first('from', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
    <label for="subject" class="control-label">{{ 'Subject' }}</label>
    <input class="form-control" name="subject" type="text" id="subject" value="{{ isset($configuration->subject) ? $configuration->subject : ''}}" >
    {!! $errors->first('subject', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
    <label for="body" class="control-label">{{ 'Body' }}</label>
    <input class="form-control" name="body" type="text" id="body" value="{{ isset($configuration->body) ? $configuration->body : ''}}" >
    {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('notification_title') ? 'has-error' : ''}}">
    <label for="notification_title" class="control-label">{{ 'Notification Title' }}</label>
    <input class="form-control" name="notification_title" type="text" id="notification_title" value="{{ isset($configuration->notification_title) ? $configuration->notification_title : ''}}" >
    {!! $errors->first('notification_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <div class="radio">
    <label><input name="status" type="radio" value="1" {{ (isset($configuration) && 1 == $configuration->status) ? 'checked' : '' }}> Yes</label>
</div>
<div class="radio">
    <label><input name="status" type="radio" value="0" {{ (isset($configuration) && 0 == $configuration->status) ? 'checked' : '' }} > No</label>
</div>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
