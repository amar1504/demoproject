<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="control-label">{{ 'Category' }} <font color="red">*</font></label> 
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
    <label for="product_name" class="control-label">{{ 'Product Name' }} <font color="red">*</font></label>
    <input class="form-control" name="product_name" type="text" id="product_name" value="{{ isset($product->product_name) ? $product->product_name : old('product_name')}}" required="" >
    {!! $errors->first('product_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }} <font color="red">*</font></label>
    <input class="form-control" name="price" type="text" id="price" value="{{ isset($product->price) ? $product->price : old('price')}}" data-parsley-type="number" required="">
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }} <font color="red">*</font></label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" data-parsley-minlength="6" required="" >{{ isset($product->description) ? $product->description : old('description')}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    <label for="quantity" class="control-label">{{ 'Quantity' }} <font color="red">*</font></label>
    <input class="form-control" name="quantity" type="text" id="quantity" value="{{ isset($product->quantity) ? $product->quantity : old('quantity')}}" data-parsley-type="number"  required="" >
    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('product_image') ? 'has-error' : ''}}">
    <label for="product_image" class="control-label">{{ 'Product Image' }} @if( !isset($product)) {!! '<font color="red">*</font>' !!} @endif</label>
    <input class="" name="product_image[]" type="file" id="product_image" multiple value="{{ isset($product->product_image) ? $product->product_image : ''}}"  @if( !isset($product)) {{ "required=true" }} @endif data-parsley-max-file-size="2048" >
    {!! $errors->first('product_image', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
    <label for="color" class="control-label">{{ 'Colour' }} <font color="red">*</font></label>
    <input class="form-control" name="color" type="text" id="color" value="{{ isset($productAttributes->color) ? $productAttributes->color : old('color')}}"   required="" >
    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('size') ? 'has-error' : ''}}">
    <label for="size" class="control-label">{{ 'Size' }} <font color="red">*</font></label>
    <input class="form-control" name="size" type="text" id="size" value="{{ isset($productAttributes->size) ? $productAttributes->size : old('size')}}"   required="" >
    {!! $errors->first('size', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }} <font color="red">*</font></label>
    <input class="form-control" name="type" type="text" id="type" value="{{ isset($productAttributes->type) ? $productAttributes->type : old('type')}}"   required="" >
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }} <font color="red">*</font></label>
    <div class="radio">
    <label><input name="status" type="radio" value="1" {{(old('status') == '1') ? 'checked' : ''}} {{ (isset($product->status) && 1 == $product->status) ? 'checked' : '' }} required=""> Active</label>
</div>
<div class="radio">
    <label><input name="status" type="radio" value="0" {{(old('status') == '0') ? 'checked' : ''}} {{ (isset($product->status) && 0 == $product->status) ? 'checked' : '' }} > Inactive</label>
</div>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    <a href="{{ route('product.index') }}" title="Back"><button type="button" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
</div>
