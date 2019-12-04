
<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center">recommended items</h2>
	@if(count($recommendedproduct) < 1)
		<div class='alert alert-danger text-center'>Items are not available !</div>
	@else
	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			
				@foreach($recommendedproduct as $rproduct)
					<div class="item {{ $loop->first ? 'active' : '' }}">
					@foreach($rproduct as $item) 
					
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{asset('storage/'.$item['product_image'][0]['product_image'])}}" class="productimg" alt="" />
									<h2>${{ $item['price'] }} </h2>
									<p>{{ $item['product_name'] }}</p>
									<a href="{{ route('product-details', ['id'=>$item['id']] ) }}" class="btn btn-default add-to-cart"></i>View Product</a>
									@if($item['quantity']>=1)
										<a href="{{ route('cart.add',$item['id'] ) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									@else
										<a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Out Of Stock</a>
									@endif
								</div>
							</div>
						</div>
					</div>
					@endforeach
					</div>
				@endforeach
			
		</div>
			<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
			</a>
			<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
			</a>			
	</div>
	@endif


</div><!--/recommended_items-->
