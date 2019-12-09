@include('Eshopper.header')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					@include('Eshopper.category')
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						@if(!isset($productdetails))
							<div class='alert alert-danger text-center'>Records Not Found !</div>
						@else
							<div class="col-sm-5">
								<div class="view-product">
									<img src="{{ asset('storage/'.$productdetails->ProductImage->first()->product_image)  }}" id="mainImage" alt="" />
									
								</div>
								@if(count($productdetails->ProductImage) >1)
								<div id="similar-product" class="carousel slide" data-ride="carousel">
																	<!-- Wrapper for slides -->
										<div class="carousel-inner"> 
											@foreach($productdetails->ProductImage as $pimg)
											<div class="item imgslider {{$loop->first ? 'active' : '' }} ">
											<a href=""><img src="{{ asset('storage/'.$pimg->product_image)  }}" class="imgsize" alt=""></a>
											</div>
											@endforeach
										</div>

									<!-- Controls -->
									<a class="left item-control" href="#similar-product" onclick="previousImageSilder();" data-slide="prev">
										<i class="fa fa-angle-left"></i>
									</a>
									<a class="right item-control" href="#similar-product"  onclick="nextImageSilder();" data-slide="next">
										<i class="fa fa-angle-right"></i>
									</a>
								</div>
								@endif
							</div>
							<div class="col-sm-7">
								<div class="product-information"><!--/product-information-->
									<!-- <img src="images/product-details/new.jpg" class="newarrival" alt="" /> -->
									<h2>{{ucwords($productdetails->product_name)}}</h2>
									<p>Web ID: #{{$productdetails->id}}</p>
									<p>{{$productdetails->description}}</P>
									<!-- <img src="images/product-details/rating.png" alt="" /> -->
									<span>
										<span> ${{$productdetails->price}}</span>
										<!-- <label>Quantity:</label> -->
										<!-- <input type="text" value="3" disabled/> -->
										@if($productdetails->quantity >=1)
										<a href="{{ route('cart.add',$productdetails->id ) }}" class="btn btn-fefault cart">
											<i class="fa fa-shopping-cart"></i>
											Add to cart
										</a>
										@else
										<a href="" class="btn btn-fefault cart">
											<i class="fa fa-shopping-cart"></i>
											Out of Stock
										</a>
										@endif
									</span>
									<p><b>Availability:</b> @if($productdetails->quantity <1) {{ 'Out Of Stock' }} @else {{ 'In Stock' }} @endif </p>
									<p><b>Condition:</b> New</p>
									<p><b>Colour:</b> {{ $productdetails->ProductAttributes->color }}</p>
									<p><b>Size:</b> {{ $productdetails->ProductAttributes->size }}</p>
									<p><b>Type:</b> {{ $productdetails->ProductAttributes->type }}</p>
									<p><b>Brand:</b> E-SHOPPER</p>
									<!-- <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a> -->
								</div><!--/product-information-->
							</div>
						@endif
					</div>
					@include('Eshopper.footerslider')
					
				</div>
			</div>
		</div>
	</section>

<script>
function previousImageSilder(){
	//alert('hii');
	var  CurrentActiveImg=$('.active').prev('div .item').find('a img').prop('src');
	//alert(CurrentActiveImg);
	if(CurrentActiveImg==undefined){
		var  CurrentActiveImg=$("div .item a img").last().prop('src');
		// console.log(CurrentActiveImg);
		$("#mainImage").attr('src',CurrentActiveImg);
	}
	//console.log($("#mainImage").prop('src'));
	$("#mainImage").attr('src',CurrentActiveImg);
}

function nextImageSilder(){
	//alert('hii');
	var  CurrentActiveImg=$('.active').next('div .item').find('a img').prop('src');
	if(CurrentActiveImg==undefined){
		var  CurrentActiveImg=$("div .item a img").first().prop('src');
		//console.log(CurrentActiveImg);
		$("#mainImage").attr('src',CurrentActiveImg);
	}
	//console.log(CurrentActiveImg);
	$("#mainImage").attr('src',CurrentActiveImg);
}

</script>



@include('Eshopper.footer')