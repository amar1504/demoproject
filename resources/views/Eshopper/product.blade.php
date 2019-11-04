@include('Eshopper.header')<!-- include header blade -->

<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
                        @include('Eshopper.category')
                    </div>
                </div>
                <div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center"> {{ $givencategory->category_name }}</h2>
                        
                        @foreach($product as $prod)
						
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{asset('storage/'.$prod->ProductImages->product_image)}}" class="imgsize" alt="" />
											<h2>${{$prod->Product->price}}</h2>
											<p>{{$prod->Product->product_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
											<h2>${{$prod->Product->price}}</h2>
											<p>{{$prod->Product->product_name}}</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach

                    </div>

                    @include('Eshopper.footerslider')  <!-- include footer blade -->              

                </div>
                
            </div>
        </div>
</section>



					
@include('Eshopper.footer') <!-- include footer blade -->
