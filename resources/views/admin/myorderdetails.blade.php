@extends('master')

@section('content')
<h3>Order Details<hr></h3>

    <div class="container">
        <div class="row">
            
            <div class="col-md-10">
                <div class="card ">
                        <div class="card-body">
                        <br/>
                        <br/>
                        <h4>Shipping Details</h4>
                        <div class="table-responsive ">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <th class="text-center">Order Id</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Order Date</th>
                                        <th class="text-center">Order Status</th>
                                        <th class="text-center">Payment</th>
                                        <th class="text-center col-md-3">Shipping Address</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">

                                    <tr>
                                    @foreach($orders as $orderdetails)
                                        
                                        <td>{{ $orderdetails->id }}</td>
                                        <td>{{ $orderdetails->Addresses->name }}</td>
                                        <td>{{ $orderdetails->created_at }}</td>
                                        <td>{{ $orderdetails->OrderDetails->status }}</td>
                                        <td>@if($orderdetails->OrderDetails->payment_mode==0){{ 'COD'}} <br/>{{'Transaction Id:'.$orderdetails->OrderDetails->transaction_id }} @else {{ 'Paypal'.' Transaction Id:'.$orderdetails->OrderDetails->transaction_id }} @endif</td>
                                        <td>{{ $orderdetails->Addresses->address1.' '.$orderdetails->Addresses->address2.' '.$orderdetails->Addresses->city.' ,'.$orderdetails->Addresses->state.' ,'.$orderdetails->Addresses->country.' -'.$orderdetails->Addresses->zipcode }}</td>

                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <br/>
                        <h4>Product Details</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Product Name</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                @foreach($orders as $item)
                                    @foreach($item->Orders as $product)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td><img src="{{ asset('storage/'.$product->product_image)}}" class="imgsize"></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>&#x20b9;{{ $product->price }}</td>

                                        
                                    </tr>
                                    @endforeach
                                

                                <tr>
                                    <td colspan="3">&nbsp;</td>
                                    <td colspan="2">
                                        <table class="table table-bordered ">
                                            <tr>
                                                <td>Sub Total</td>
                                                <td class="col-md-6">&#x20b9;{{ $item->subtotal }}</td>
                                            </tr>
                                            <tr>
                                                <td>Exo Tax</td>
                                                <td>&#x20b9;{{ $item->tax }}</td>
                                            </tr>
                                            <tr class="shipping-cost">
                                                <td>Shipping Cost</td>
                                                <td>&#x20b9;{{ $item->shipping_charge}}</td>										
                                            </tr>
                                            <tr class="shipping-cost">
                                                <td>Discount Cost</td>
                                                <td>- &#x20b9;{{ $item->discount }}</td>										
                                            </tr>
                                            <tr>
                                                <td><b>Total</b></td> 
                                                <td><span><b>&#x20b9;{{ $item->total }}</b></span></td>
                                            </tr>

                                           
                                        </table>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                           
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
