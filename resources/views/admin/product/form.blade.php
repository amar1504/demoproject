<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="control-label">{{ 'Category Id' }}</label>
    <select name="category_id" class="form-control" id="category_id" >
    <option value="0">SELECT</option>
    @foreach ($category as $cat)
        <option value="{{ $cat->id }}" {{ (isset($productCategory->category_id) && $productCategory->category_id == $cat->id) ? 'selected' : ''}}>{{ $cat->category_name }}</option>
    @endforeach
</select>
    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('product_name') ? 'has-error' : ''}}">
    <label for="product_name" class="control-label">{{ 'Product Name' }}</label>
    <input class="form-control" name="product_name" type="text" id="product_name" value="{{ isset($product->product_name) ? $product->product_name : ''}}" >
    {!! $errors->first('product_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="number" id="price" value="{{ isset($product->price) ? $product->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ isset($product->description) ? $product->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('product_image') ? 'has-error' : ''}}">
    <label for="product_image" class="control-label">{{ 'Product Image' }}</label>
    <input class="form-control" name="product_image" type="file" id="product_image" value="{{ isset($product->product_image) ? $product->product_image : ''}}" >
    {!! $errors->first('product_image', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
