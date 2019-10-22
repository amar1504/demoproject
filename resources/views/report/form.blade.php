<div class="form-group {{ $errors->has('customer_details_with_address') ? 'has-error' : ''}}">
    <label for="customer_details_with_address" class="control-label">{{ 'Customer Details With Address' }}</label>
    <input class="form-control" name="customer_details_with_address" type="text" id="customer_details_with_address" value="{{ isset($report->customer_details_with_address) ? $report->customer_details_with_address : ''}}" >
    {!! $errors->first('customer_details_with_address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Ordered products') ? 'has-error' : ''}}">
    <label for="Ordered products" class="control-label">{{ 'Ordered Products' }}</label>
    <input class="form-control" name="Ordered products" type="text" id="Ordered products" value="{{ isset($report->Ordered products) ? $report->Ordered products : ''}}" >
    {!! $errors->first('Ordered products', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('pagecontent') ? 'has-error' : ''}}">
    <label for="pagecontent" class="control-label">{{ 'Pagecontent' }}</label>
    <input class="form-control" name="pagecontent" type="text" id="pagecontent" value="{{ isset($report->pagecontent) ? $report->pagecontent : ''}}" >
    {!! $errors->first('pagecontent', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
