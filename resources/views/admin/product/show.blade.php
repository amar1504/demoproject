@extends('master')

@section('content')
<h3>Product #{{ $product->id }}<hr/></h3>
    <div class="container">
        <div class="row">

            <div class="col-md-7 col-md-offset-1">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="col-md-12 text-right">
                            <a href="{{ url('/admin/product') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                            <!-- Access Control according to role start-->
                            @if(Gate::check('isSuperAdmin') )
                            <a href="{{ url('/admin/product/' . $product->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                            <form method="POST" action="{{ url('admin/product' . '/' . $product->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            </form>
                            @endif
                            <!-- Access Control according to role End--> 
                            </div>                       
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                    <!-- fetch Product Details Start-->
                                        <th>ID</th><td>{{ $product->id }}</td>
                                    </tr>
                                    <tr><th> Category Id </th>  <td>{{ $product->ProductCategory->category->category_name }}</td></tr>
                                    <tr><th> Product Name </th><td> {{ $product->product_name }} </td></tr>
                                    <tr><th> Price </th><td> {{ $product->price }} </td></tr>
                                    <tr><th> Product Image </th><td> <img src="{{ asset('/storage/'.$product->ProductImage->first()->product_image) }}" style="width:80px; height:auto;"> </td></tr>
                                    <tr><th> Status </th><td> @if($product->status==1){{ 'Active' }} @else {{ 'Inactive' }} @endif </td></tr>
                                    <!-- fetch Product Details End -->
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
