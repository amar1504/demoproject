<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }} <font color="red">*</font></label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($banner->title) ? $banner->title : old('title')}}" required="" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bannerimage') ? 'has-error' : ''}}">
    
    <label for="bannerimage" class="control-label">{{ 'Bannerimage' }} @if( !isset($banner)) {!! '<font color="red">*</font>' !!} @endif</label>
    <input class="" name="bannerimage" type="file" id="bannerimage" value="{{ isset($banner->bannerimage) ? $banner->bannerimage : ''}}"  @if( !isset($banner)) {{ "required=true" }} @endif data-parsley-max-file-size="2048">
    {!! $errors->first('bannerimage', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }} <font color="red">*</font></label>
    <div class="radio">
    <label><input name="status" type="radio" value="1"    {{(old('status') == '1') ? 'checked' : ''}} {{ (isset($banner) && 1 == $banner->status) ? 'checked' : '' }} required=""> Active</label>
</div>
<div class="radio">
    <label><input name="status" type="radio" value="0"   {{(old('status') == '0') ? 'checked' : ''}} {{ (isset($banner) && 0 == $banner->status) ? 'checked' : '' }} > Inactive</label>
</div>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    
    <a href="{{ route('banner.index') }}" title="Back"><button type="button" class="btn btn-warning "><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
</div>
