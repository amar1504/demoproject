<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($banner->title) ? $banner->title : old('title')}}" required="" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bannerimage') ? 'has-error' : ''}}">
    
    <label for="bannerimage" class="control-label">{{ 'Bannerimage' }}</label>
    <input class="" name="bannerimage" type="file" id="bannerimage" value="{{ isset($banner->bannerimage) ? $banner->bannerimage : ''}}" required="" >
    {!! $errors->first('bannerimage', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    
    <a href="{{ url('/admin/banner') }}" title="Back"><button type="button" class="btn btn-warning "><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
</div>

