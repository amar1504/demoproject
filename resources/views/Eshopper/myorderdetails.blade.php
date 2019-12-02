@include('Eshopper.header')
    <div class="container">
        <div class="row">
            <div class="col-md-3" >
            @include('Eshopper.myaccount')
            </div>
            <div class="col-md-9">
                <div class="card ">
                    <!-- <div class="card-header left-sidebar"><h2>My Orders</h2></div> -->
                    <h2 class="title text-center "> My Orders Details</h2>

                        <div class="card-body">
                        <br/>
                        <br/>
                        <!-- <div class="col-md-4 left-sidebar"> <h2>Details</h2></div> -->
                        <!-- <h2 class="title text-center "> Details</h2> -->
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
                                        <td>@if($orderdetails->OrderDetails->payment_mode==0){{ 'COD' }} @else {{ 'Paypal' }} @endif</td>
                                        <td>{{ $orderdetails->Addresses->address1.' '.$orderdetails->Addresses->address2.' '.$orderdetails->Addresses->city.' ,'.$orderdetails->Addresses->state.' ,'.$orderdetails->Addresses->country.' -'.$orderdetails->Addresses->zipcode }}</td>

                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="col-md-4 left-sidebar"> <h2> Products </h2></div> -->
                        <h2 class="title text-center "> Products</h2>
                        
                        <br/><br/>
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
                                        <td><img src="{{ asset('storage/'.$product->product_image)}}" class="imgsm"></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>${{ $product->price }}</td>

                                        
                                    </tr>
                                    @endforeach
                                

                                <tr>
                                    <td colspan="3">
                                        @if($coupon!="")
                                        <table class="table table-bordered ">
                                            <tr>
                                                <th colspan="3" class="text-center">Coupon Discount Details:</th>
                                            </tr>
                                            <tr>
                                                
                                                <td>Coupon Id:</td>
                                                <td class="col-md-6">#{{ $coupon->id }}</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Coupon Title:</td>
                                                <td class="col-md-6">{{ $coupon->coupon_title }}</td>
                                            </tr>
                                            <tr>
                                                <td>Coupon code:</td>
                                                <td class="col-md-6">{{ $coupon->code }}</td>
                                            </tr>
                                                
                                        </table>
                                        @endif
                                    </td>
                                    <td colspan="2">
                                        <table class="table table-bordered ">
                                            <tr>
                                                <td>Sub Total</td>
                                                <td class="col-md-6">${{ $item->subtotal }}</td>
                                            </tr>
                                            <tr>
                                                <td>Exo Tax</td>
                                                <td>${{ $item->tax }}</td>
                                            </tr>
                                            <tr class="shipping-cost">
                                                <td>Shipping Cost</td>
                                                <td>${{ $item->shipping_charge}}</td>										
                                            </tr>
                                            <tr class="shipping-cost">
                                                <td>Discount Cost</td>
                                                <td>- ${{ $item->discount }}</td>										
                                            </tr>
                                            <tr>
                                                <td>Total</td> 
                                                <td><span>${{ $item->total }}</span></td>
                                            </tr>

                                           
                                        </table>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                         
                        </div>

                        <h2 class="title text-center "> Track Order </h2>
                           <h4 class="title text-center "> ({{ 'Order ID: #'.$orderId.') (Status : '.ucfirst(trans($status))}})</h4>

                            <ul class="progressbar">
                            <li class=" @if($status=='pending' || $status=='processing' || $status=='dispatched' || $status=='delivered' || $status=='cancelled' ) {{ 'active' }} @endif">Pending</li>
                                <li class=" @if($status=='processing' || $status=='dispatched' || $status=='delivered' || $status=='cancelled') {{ 'active' }} @endif">Processing</li>
                                <li class=" @if($status=='dispatched' || $status=='delivered' || $status=='cancelled' ||  $status=='dispatched') {{ 'active' }} @endif">Dispactched</li>
                                <li class=" @if($status=='delivered' || $status=='cancelled') {{ 'active' }} @endif">Delivered</li>
                                <li class=" @if($status=='cancelled') {{ 'active' }} @endif">Cancelled</li>
                            </ul>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <br/>
@include('Eshopper.footer')
