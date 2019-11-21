@include('Eshopper.header')
<section id="cart_items">
	<form method="POST" action="{{ route('cart.storeorder') }}" >
				{{ csrf_field() }}
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Shipping Address</h2>
			</div>
			<!-- <div class="checkout-options">
				<h3>New User</h3>
				<p>Checkout options</p>
				<ul class="nav">
					<li>
						<label><input type="checkbox"> Register Account</label>
					</li>
					<li>
						<label><input type="checkbox"> Guest Checkout</label>
					</li>
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul>
			</div>/checkout-options -->
			
			<div class="row">
			<div class=col-md-12>
			@foreach($addresses as $address)
				<div class="col-md-4 ">
					<label><input type="radio" id="{{ $loop->index+1 }}" onclick="getAddress(this.id);"> Address {{ $loop->index+1 }}</label>
					<p>{{ $address->name.' '.$address->address1.' '.$address->address2 }}</p>
					<input type="hidden" name="name{{ $loop->index+1 }}" id="name{{ $loop->index+1 }}" value="{{ $address->name }}" >
					<input type="hidden" name="adddress1{{ $loop->index+1 }}" id="address1{{ $loop->index+1 }}" value="{{ $address->address1 }}" >
					<input type="hidden" name="adddress2{{ $loop->index+1 }}" id="address2{{ $loop->index+1 }}" value="{{ $address->address2 }}" >
					<input type="hidden" name="country{{ $loop->index+1 }}" id="country{{ $loop->index+1 }}" value="{{ $address->country }}" >
					<input type="hidden" name="state{{ $loop->index+1 }}" id="state{{ $loop->index+1 }}" value="{{ $address->state }}" >
					<input type="hidden" name="city{{ $loop->index+1 }}" id="city{{ $loop->index+1 }}" value="{{ $address->city }}" >
					<input type="hidden" name="zipcode{{ $loop->index+1 }}" id="zipcode{{ $loop->index+1 }}" value="{{ $address->zipcode }}" >
					<input type="hidden" name="mobileno{{ $loop->index+1 }}" id="mobileno{{ $loop->index+1 }}" value="{{ $address->mobileno }}" >
					<input type="hidden" name="addressid{{ $loop->index+1 }}" id="addressid{{ $loop->index+1 }}" value="{{ $address->id }}" >
				</div>
			@endforeach
			</div>
			</div>

			<div class="register-req">
				<p>Shipping Details</p>
			</div><!--/register-req-->
			
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-4 ">
						<div class="shopper-info">
							<p>Shopper Information</p>
							
								<input type="text" placeholder="Display Name" value="{{ Auth::user()->firstname.' '.Auth::user()->lastname }}">
								<input type="text" placeholder="User Name" value="{{ Auth::user()->email }}">
								
							
							<!-- <a class="btn btn-primary" href="">Get Quotes</a>
							<a class="btn btn-primary" href="">Continue</a> -->
						</div>
					</div>
					<div class="col-sm-4">
						<div class="shopper-info">
							<p>To Billing</p>

									<input type="text" name="billingname" id="compnayname" placeholder="Company Name" required="">
									<input type="text" name="billingaddress1" placeholder="Address 1 *"  id="address1" required="">
									<input type="text" name="billingaddress2" placeholder="Address 2" id="address2" required="">
									<input type="text" name="billingcountry" placeholder="Country" id="country" required="">
									<input type="text" name="billingstate" placeholder="State" id="state" required="">
									<input type="text" name="billingcity" placeholder="City" id="city" required="">
									<input type="text" name="billingzipcode" placeholder="Zipcode" id="zipcode" required="">
									<input type="text" name="billingmobileno" placeholder="Mobile No." id="mobileno" required="">
									<input type="hidden" name="billingaddressid" id="billingaddressid" value="" >

								
							<!-- <a class="btn btn-primary" href="">Get Quotes</a>
							<a class="btn btn-primary" href="">Continue</a> -->
						</div>
					</div>
					
					<div class="col-sm-4">
						<div class="shopper-info order ">
							<p>To Shipping</p>
							
									<input type="text" name="shippingname" id="shippingcompnayname" placeholder="Company Name" required="">
									<input type="text" name="shippingaddress1" placeholder="Address 1 *"  id="shippingaddress1" required="">
									<input type="text" name="shippingaddress2" placeholder="Address 2" id="shippingaddress2">
									<input type="text" name="shippingcountry" placeholder="Country" id="shippingcountry" required="">
									<input type="text" name="shippingstate" placeholder="State" id="shippingstate" required="">
									<input type="text" name="shippingcity" placeholder="City" id="shippingcity" required="">
									<input type="text" name="shippingzipcode" placeholder="Zipcode" id="shippingzipcode" required="">
									<input type="text" name="shippingmobileno" placeholder="Mobile No." id="shippingmobileno" required="">
									<label><input type="checkbox" name="sameaddress" id="sameaddress" value="1" onclick="getsameAddress(this.id);"> Shipping to bill address</lable>
									<input type="hidden" name="shippingaddressid" id="shippingaddressid" value="" >
									
								
							<!-- <a class="btn btn-primary" href="">Get Quotes</a>
							<a class="btn btn-primary" href="">Continue</a> -->
						</div>
					</div>
					
					<!-- <div class="col-sm-3">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>	
					</div>					 -->
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($cartcontent as $content)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ asset('storage/'.$content->options->product_image) }} " class="imgsize" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""> {{ ucwords($content->name) }}</a></h4>
								<p>Web ID: #{{ $content->id }}</p>
							</td>
							<td class="cart_price">
								<p>${{ $content->price }}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<input  type="text" class="cart_quantity_input" id="cartqty{{$content->id}}" name="quantity" value="{{ $content->qty }}" autocomplete="off" size="2" disabled>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price" id="cart_total_price{{$content->id}}">${{ $content->subtotal }}</p>
							</td>
						</tr>
						
						@endforeach
						<tr>
							<td colspan="3">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>${{ $subtotal }}</td>
									</tr>
									<tr>
										<td>Exo Tax</td>
										<td>${{ $tax }}</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>@if($total >500) {{ 'Free' }} @else ${{ 50 }} @endif</td>										
									</tr>
									<tr class="shipping-cost">
										<td>Discount Cost</td>
										<td>-{{ $couponDiscount }}</td>										
									</tr>
									<!-- @if($total >500) ${{ $total=$total }} @else ${{ $total=$total+50 }} @endif -->
									<tr>
										<td>Total</td> 
										<td><span>$ @if($couponDiscount > 0) {{ $total-$couponDiscount }} @else{{ $total }} @endif</span></td>
									</tr>

									<input type="hidden" name="couponDiscount" value="{{ $couponDiscount }}">
									<input type="hidden" name="coupon_id" value="{{ $coupon_id }}">
								</table>
							</td>
						</tr>
					
					</tbody>
				</table>
			</div>
			<div class="payment">
					<span>
						<label><b>Payment : </b></label>
					</span>
					<span>
						&emsp;<label><input name="paymentMode" type="radio" value="0" required=""> Cash On Delivery</label> &emsp;
					</span>
					<span>
						<label><input name="paymentMode" type="radio" value="1" required=""> Paypal</label>
					</span>
					
			</div>
			<div class="row">
				<div class="col-md-12">
						&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<input type="submit" class="btn btn-default check_out" value="Place Order">
				</div>
				<div class="col-md-12">
					<button  id="showpaypal" class="btn btn-primary btn-md" value="0" formaction="{{route('addmoney.paypal')}}" id="formButton" name="submit" style="margin-left:50px;margin-bottom:10px;" formmethod="POST">Pay with Paypal</button>	
				</div>
			</div><br/>
			
		</div>
		</form>	
</section> <!--/#cart_items-->

<script>
function getAddress(id){
	// alert(id);
	var name=$("#name"+id).val();	
	var address1=$("#address1"+id).val();	
	var address2=$("#address2"+id).val();	
	var country=$("#country"+id).val();	
	var state=$("#state"+id).val();	
	var city=$("#city"+id).val();	
	var zipcode=$("#zipcode"+id).val();	
	var mobileno=$("#mobileno"+id).val();
	var billingaddressid=$("#addressid"+id).val();
	$("#compnayname").val(name);
	$("#address1").val(address1);
	$("#address2").val(address2);
	$("#country").val(country);
	$("#state").val(state);
	$("#city").val(city);
	$("#zipcode").val(zipcode);
	$("#mobileno").val(mobileno);
	$("#billingaddressid").val(billingaddressid);
}
function getsameAddress(id){
	// alert(id);
	//$("#"+id).checked();
	if($("#"+id).prop("checked") == true){
		billingname=$("#compnayname").val();
		billingaddress1=$("#address1").val();
		billingaddress2=$("#address2").val();
		billingcountry=$("#country").val();
		billingstate=$("#state").val();
		billingcity=$("#city").val();
		billingzipcode=$("#zipcode").val();
		billingmobile=$("#mobileno").val();
		shippingaddressid=$("#billingaddressid").val();
		$("#shippingcompnayname").val(billingname);
		$("#shippingaddress1").val(billingaddress1);
		$("#shippingaddress2").val(billingaddress2);
		$("#shippingcountry").val(billingcountry);
		$("#shippingstate").val(billingstate);
		$("#shippingcity").val(billingcity);
		$("#shippingzipcode").val(billingzipcode);
		$("#shippingmobileno").val(billingmobile);
		$("#shippingaddressid").val(shippingaddressid);
	}
	else{
		$("#shippingcompnayname").val('');
		$("#shippingaddress1").val('');
		$("#shippingaddress2").val('');
		$("#shippingcountry").val('');
		$("#shippingstate").val('');
		$("#shippingcity").val('');
		$("#shippingzipcode").val('');
		$("#shippingmobileno").val('');
	}
	
}
</script>


@include('Eshopper.footer')