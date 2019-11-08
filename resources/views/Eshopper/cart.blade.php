@include('Eshopper.header')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
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
					@if(count($cartcontent)>0)
						@foreach($cartcontent as $content)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ asset('storage/'.$content->options->product_image) }} " class="imgsize" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""> {{ $content->name }}</a></h4>
								<p>Web ID: #{{ $content->id }}</p>
							</td>
							<td class="cart_price">
								<p>${{ $content->price }}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="{{ route('cart.add',$content->id) }}"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{ $content->qty }}" autocomplete="off" size="2">
									<a class="cart_quantity_down" href="{{ route('cart.update',$content->rowId) }}"> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">${{ $content->subtotal }}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{ route('cart.remove', $content->rowId) }}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						
						@endforeach

						@if(isset($subtotal) && $subtotal!=0 )
						<tr>
							<td colspan=4 class="text-right"><h4> Subtotal : </h4></td>
							<td><p class="cart_total_price">${{ $subtotal }}</p></td>
						</tr>
						@endif

						@if(isset($tax) && $tax!=0 )
						<tr>
							<td colspan=4 class="text-right"><h4> Tax : </h4></td>
							<td><p class="cart_total_price">${{ $tax }}</p></td>
						</tr>
						@endif

						@if(isset($total) && $total!=0 )
						<tr>
							<td colspan=4 class="text-right"><h4> Total : </h4></td>
							<td><p class="cart_total_price">${{ $total }}</p></td>
						</tr>
						@endif
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
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>${{ $subtotal }}</span></li>
							<li>Eco Tax <span>${{ $tax }}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>${{ $total }}</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@include('Eshopper.footer')