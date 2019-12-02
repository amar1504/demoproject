@include('Eshopper.header')<!-- include header blade -->

<section>
		<div class="container">
			<div class="row">
                <div class="col-sm-3 features_items">
                    @include('Eshopper.myaccount') <!-- include my account blade -->
                </div>
                <div class="col-md-9">
                    <div class="col-md-12 ">
                        <h2 class="title text-center features_items "> My Wish List </h2>
                        <!-- Display flash Message in alert start -->
                        @if (session('flash_message'))
                            <div class="alert alert-success">
                                {{ session('flash_message') }}
                            </div>
                        @endif
                        <!-- Display flash Message in alert End -->
                       
                        @foreach($wishList as $prod)
						
						<div class="col-md-4">
							<div class="product-image-wrapper">
								<div class="single-products">
                                    @foreach($prod->wishlistProduct as $product)
										<div class="productinfo text-center">
											<img src="{{asset('storage/'.$product->ProductImage->first()->product_image)}}" class="productimg" alt="" />

											<h2>${{ $product->price}}</h2>
											<p>{{ $product->product_name}}</p>
											<!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
											<h2>${{ $product->price}}</h2>
											<p>{{ $product->product_name}}</p>
												<a href="{{ route('product-details', [$prod->product_id] ) }}" class="btn btn-default add-to-cart"></i>View Product</a>
												<!-- <a href="{{ route('cart.add',$prod->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
											</div>
                                        </div> 
                                    @endforeach
								</div>
								<!-- <div class="choose">
									<ul class="nav nav-pills nav-justified">
									@if (Auth::user())  
										<li><a href="{{ route('wishlist.add',$prod->id) }}"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									@else
									<li><a href="{{ route('userlogin') }}"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									@endif
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div> -->
							</div>
						</div>
						@endforeach
                        <br/>
                    </div>
                    
                </div>
            </div>
        </div>
</section>

@include('Eshopper.footer') <!-- include footer blade -->
