@include('Eshopper.header')<!-- include header blade -->

<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					@include('Eshopper.category') <!-- include category blade -->
                </div>
                <div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center"> @if($givencategory->category_name !="") {{$givencategory->category_name }} @endif</h2>
                        @if(count($product) < 1)
							<div class='alert alert-danger text-center'>Products are not available !</div>
						@else
							@foreach($product as $prod)
							
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{asset('storage/'.$prod->ProductImages->first()->product_image)}}" class="productimg" alt="" />
												<h2>$ {{$prod->Product->price}}</h2>
												<p>{{$prod->Product->product_name}}</p>
												@if($prod->Product->quantity >=1)
												<a href="{{ route('cart.add',$prod->Product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												@else
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Out of Stock</a>
												@endif
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
												<h2>$ {{$prod->Product->price}}</h2>
												<p>{{$prod->Product->product_name}}</p>
													<a href="{{ route('product-details', ['id'=>$prod->Product->id] ) }}" class="btn btn-default add-to-cart"></i>View Product</a>
													@if($prod->Product->quantity >=1)
												<a href="{{ route('cart.add',$prod->Product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												@else
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Out of Stock</a>
												@endif
												</div>
											</div>
									</div>
									<div class="choose">
										<ul class="nav nav-pills nav-justified">
											
										@if (Auth::user())  
											<li><a href="{{ route('wishlist.add',$prod->Product->id) }}"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										@else
											<li><a href="{{ route('userlogin') }}"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										@endif
											<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
										</ul>
									</div>
								</div>
							</div>
							@endforeach
						@endif
                    </div>

                    @include('Eshopper.footerslider')  <!-- include footer blade -->              

                </div>
                
            </div>
        </div>
</section>
					
@include('Eshopper.footer') <!-- include footer blade -->
