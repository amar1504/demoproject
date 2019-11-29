@include('Eshopper.header')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<!-- Display flash Message in alert start -->
			
				<div class="alert alert-danger text-center">
					<strong id="cartResponse"></strong>
				</div>
			
			<!-- Display flash Message in alert End -->		
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
					@if(count($cartcontent)>0)
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
									<!-- <a class="cart_quantity_up" href="{{ route('cart.add',$content->id) }}">+</a> -->
									<a class="cart_quantity_up"  href="javascript:void(0);"><p  onClick="additems('{{$content->rowId }}',{{$content->id }});"> + </p></a>
									<input  type="text" class="cart_quantity_input" id="cartqty{{$content->id}}" name="quantity" value="{{ $content->qty }}" autocomplete="off" size="2" disabled>
									<!-- <a class="cart_quantity_down" href="{{ route('cart.update',$content->rowId) }}">-</a> -->
									<a class="cart_quantity_down" href="javascript:void(0);"><p  onClick="removeitems('{{$content->rowId }}',{{$content->id }});"> - </p></a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price" id="cart_total_price{{$content->id}}">${{ $content->subtotal }}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{ route('cart.remove', $content->rowId) }}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						
						@endforeach

					@else
						<tr class="alert alert-warning">
							<td colspan=6 class="text-center"><h4> Your Cart is Empty </h4></td>
						</tr>
					@endif
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				{!! $cmsCart->description !!}
				
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_info">
							<li>
								<label>Use Coupon Code</label>
							</li>
							
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Enter Coupon Code:</label>
								<p id="coupon_msg"></p>
							</li>
							<li class="single_field">
								<input type="text" name="coupon_code" id="coupon_code">
								
							</li>
							<li><i  class="fa fa-spinner fa-spin" ></i>
							</li>
							
						</ul>
						<!-- <a class="btn btn-default update" href="">Get Quotes</a> -->
						&emsp; <button class="btn btn-default check_out" onclick="applyCoupon();">Apply Coupon</button>
						&emsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-default check_out" onclick="couponCancel();">Cancel Coupon</button>

					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span id="subtotal" >${{ $subtotal }}</span></li>
							<li>Eco Tax <span id="tax">${{ $tax }}</span></li>
							<li>Shipping Cost <span id="shippingcost">@if($total >500) {{ 'Free' }} @else ${{ 50 }} @endif</span></li>
							<li>Total <span id="total">@if($total >500) ${{ $total }} @else ${{ $total+50 }} @endif </span></li>
							<li>Discount Cost <span id="discount"> - </span></li>
							<li>Grand Total <span id="grandtotal">@if($total >500) ${{ $total }} @else ${{ $total+50 }} @endif</span></li>

						</ul>
							<!-- <a class="btn btn-default update" href="">Update</a> -->
							@if(Auth::check() && $count >=1) 
								<form method="POST" action="{{ route('cart.checkout') }}">
									{{ csrf_field() }}
									<input type="hidden" name="coupon_id" id="couponid" value="">
									<input type="hidden" name="coupondiscount" id="coupondiscount" value="">
									&emsp;&nbsp;&nbsp;<input type="submit"  class="btn btn-default check_out" value="Check Out">
								</form>
							@elseif(Auth::check() && $count <=1)
								&emsp;&nbsp;&nbsp;<input type="submit" @if($count < 1) {{ 'disabled="disabled' }} @endif  class="btn btn-default check_out" value="Check Out">
							@else
							&emsp;&nbsp;&nbsp;<a   class="btn btn-default check_out" href="{{ route('userlogin') }}"  >Check Out</a>
							@endif
							
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

<script>
$(document).ready(function(){
	$(".fa-spin").hide();
	$(".alert").hide();
});
/**
 * function to add item using ajax
 */
function additems(id, selector){
	//alert(selector);
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
    
	$.ajax({
		type:"POST",
		url:"{{ route('cart.additems') }}",
		data:{id:id},
		success:function(data) {
			if(data.errormsg)
			{
				//alert(data.errormsg);
				$(".alert").show();
				$("#cartResponse").html(data.errormsg);
				
			}
			else{
				// alert(data.itemsubtotal);
				//console.log(data.qty);
				$('#cart_total_price'+selector).text('$'+data.itemsubtotal);
				$('#cartqty'+selector).val(data.qty);
				if(data.total<500){
					data.total=parseFloat(data.total)+50;
					//alert(data.total);
					$('#total').text('$'+data.total);
					$('#shippingcost').text('$'+50);
				}
				else{
					$('#total').text('$'+data.total);
					$('#shippingcost').text('Free');
				}
				$('#subtotal').text('$'+data.subtotal);
				$('#tax').text('$'+data.tax);
				$('#grandtotal').text('$'+data.total);
			}
		},
		
	});
	
}
/**
 * function to remove item using ajax
 */
function removeitems(id, selector){

	//alert(id);
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
    
	$.ajax({
		type:"POST",
		url:"{{ route('cart.removeitems') }}",
		data:{id:id},
		success:function(data) {
			if(data.errormsg =="You Cannot minimize the quantity")
			{
				//alert(data.errormsg);
				$(".alert").show();
				$("#cartResponse").html(data.errormsg);
				//console.log(data.error_msg);
			}
			else{
			// alert(data.itemsubtotal);
			//console.log(data.qty);
			$('#cartqty'+selector).val(data.qty);
			$('#cart_total_price'+selector).text('$'+data.itemsubtotal);
			if(data.total<500){
				data.total=parseFloat(data.total)+50;
				//alert(data.total);
				$('#total').text('$'+data.total);
				$('#shippingcost').text('$'+50);
			}
			else{
				$('#total').text('$'+data.total);
				$('#shippingcost').text('Free');
			}
			$('#subtotal').text('$'+data.subtotal);
			$('#tax').text('$'+data.tax);
			$('#grandtotal').text('$'+data.total);
			}
		},
		
	});
	
}
</script>

<script>
/**
 * function to apply coupon using ajax
 */
function applyCoupon(){
	$('.fa-spin').show();
	
	
	code=$("#coupon_code").val();
	//alert(code);
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
    
	$.ajax({
		type:"POST",
		url:"{{ route('cart.coupon') }}",
		data:{code:code},
		success:function(data) {
			if(data!="")
			{
				$('.fa-spin').hide(1000);
			}
			// alert("hii");
			console.log(data.discount);
			if(data.error_msg =="Invalid Coupon")
			{
				$("#coupon_msg").html(`<br/><font color="red">`+data.error_msg+`</font>`);
				//console.log(data.error_msg);
			}
			else{
				$("#coupon_msg").html(`<br/><font color="red"> Valid Coupon </font>`);
				$("#discount").html('-$'+data.discount);
				$("#coupondiscount").val(data.discount);
				$("#couponid").val(data.couponid);
				if(data.total >= 500){
					grandtotal=data.total-data.discount;
					//alert("1: "+grandtotal);
				}
				else{
					grandtotal=data.total-data.discount;
					grandtotal=grandtotal+50;
					//alert("2: "+grandtotal);
				}
				
				$("#grandtotal").html('$'+grandtotal.toFixed(2));
			}
			
		},
		
	});
}
/**
 * function to remove coupon
 */
function couponCancel(){
	total=$("#total").text();
	 //alert(total);	
	$("#discount").html('-');
	$("#grandtotal").html(total);
}
</script>

@include('Eshopper.footer')