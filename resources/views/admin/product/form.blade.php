<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="control-label">{{ 'Category' }}</label> 
    <select name="category_id" class="form-control" id="category_id" required="">
    <option value=" ">SELECT</option>
    @foreach ($category as $cat)
        @if(isset($parentcat->parent_id) && $parentcat->parent_id!='0' )
            <option value="{{ $cat->id }}" {{ (isset( $parentcat->parent_id ) && $parentcat->parent_id == $cat->id  ) ? 'selected' : ''}}>{{ $cat->category_name }}</option>

        @else
            <option value="{{ $cat->id }}" {{ (isset( $productCategory->category_id ) && $productCategory->category_id == $cat->id  ) ? 'selected' : ''}}>{{ $cat->category_name }}</option>
        
        @endif
    @endforeach
</select>
    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="subcategory_id" class="control-label">{{ 'SubCategory' }}</label>
    <select name="subcategory_id" class="form-control" id="subcategory_id" >
    <option value=" ">SELECT</option>
    @foreach ($subcategory as $subcat)
        <option value="{{ $subcat->id }}" {{ (isset($productCategory->category_id) && $productCategory->category_id == $subcat->id) ? 'selected' : ''}}>{{ $subcat->category_name }}</option>
    @endforeach
</select>
    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('product_name') ? 'has-error' : ''}}">
    <label for="product_name" class="control-label">{{ 'Product Name' }}</label>
    <input class="form-control" name="product_name" type="text" id="product_name" value="{{ isset($product->product_name) ? $product->product_name : old('product_name')}}" required="" >
    {!! $errors->first('product_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="text" id="price" value="{{ isset($product->price) ? $product->price : old('price')}}" data-parsley-type="number" required="">
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" data-parsley-minlength="6" required="" >{{ isset($product->description) ? $product->description : old('description')}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('product_image') ? 'has-error' : ''}}">
    <label for="product_image" class="control-label">{{ 'Product Image' }}</label>
    <input class="" name="product_image" type="file" id="product_image" value="{{ isset($product->product_image) ? $product->product_image : ''}}" required="" >
    {!! $errors->first('product_image', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    <a href="{{ url('/admin/product') }}" title="Back"><button type="button" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
</div>
