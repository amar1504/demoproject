<div class="form-group {{ $errors->has('parent_id') ? 'has-error' : ''}}">
    <label for="parent_id" class="control-label">{{ 'Parent Category' }}</label>
    <select name="parent_id" class="form-control" id="parent_id" >
    <option value="0">Select</option>
    @foreach ($parentCategory as $pcat)
        <option value="{{ $pcat->id }}" {{ (isset($category->parent_id) && $category->parent_id == $pcat->id) ? 'selected' : ''}}>{{ $pcat->category_name }}</option>
    @endforeach
</select>
    {!! $errors->first('parent_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('category_name') ? 'has-error' : ''}}">
    <label for="category_name" class="control-label">{{ 'Category Name' }} <font color="red">*</font></label>
    <input class="form-control" name="category_name" type="text" id="category_name" value="{{ isset($category->category_name) ? $category->category_name : old('category_name')}}" required="" >
    {!! $errors->first('category_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }} <font color="red">*</font></label>
    <div class="radio">
    <label><input name="status" type="radio" value="1" {{(old('status') == '1') ? 'checked' : ''}} {{ (isset($category) && 1 == $category->status) ? 'checked' : '' }} required=""> Active</label>
</div>
<div class="radio">
    <label><input name="status" type="radio" value="0" {{(old('status') == '0') ? 'checked' : ''}} {{ (isset($category) && 0 == $category->status) ? 'checked' : '' }} > Inactive</label>
</div>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    <a href="{{ route('category.index') }}" title="Back"><button type="button" class="btn btn-warning "><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                       
</div>
