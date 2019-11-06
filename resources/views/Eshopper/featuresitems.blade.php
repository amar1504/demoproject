<div class="col-sm-9 padding-right" id="features_items">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						@foreach($product as $prod)
						
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{asset('storage/'.$prod->ProductImage->first()->product_image)}}" class="imgsize" alt="" />
											<h2>${{$prod->price}}</h2>
											<p>{{$prod->product_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
											<h2>${{$prod->price}}</h2>
											<p>{{$prod->product_name}}</p>
												<a href="{{ route('product-details', ['id'=>$prod->id] ) }}" class="btn btn-default add-to-cart"></i>View Product</a>
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
					</div><!--features_items-->
					
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								@foreach($randomsubcategory as $mcat)
								<li class="{{ $loop->first ? 'active' : '' }}" value="{{$mcat->id}}" id="subcategories{{$loop->iteration}}"><a href="" name="{{$mcat->id}}"  id="subcategories" data-toggle="tab" onClick="getproducts({{$mcat->id}})"; >{{$mcat->category_name}}</a></li>
								
								@endforeach
								
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="tshirt" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								
							</div>
							
						</div>
					</div><!--/category-tab-->
					

<style>
.imgsize{
	height:268px;
}
#img{
	height:210px;
	width:183px;
}
</style>				

<script>

$(document).ready(function() {
	// console.log($('#subcategories1').val());
	// 	alert($('#subcategories1').val());
	id=$('#subcategories1').val();
	
	getproducts(id);
	
});
</script>

<script>


function getproducts(id)
{
	//alert(id);

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
    
	$.ajax({
		type:"POST",
		url:"{{ route('getproducts') }}",
		data:{category_id:id},
		success:function(data) {
			$("#tshirt").empty();
			//alert(data);
			//console.log(data.name);
			//console.log(data.product);
			var apppendproduct;
			for(i=0; i<data.product.length; i++){
			console.log( data.product[i].product.product_name);
			console.log( data.product[i].product_images.product_image);
			console.log( data.product[i].id);
			$("#tshirt").append(`<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="{{ asset('storage')}}/`+data.product[i].product_images[0].product_image+`" id="img" alt="" />
							<h2>`+data.product[i].product.price+`</h2>
							<p>`+data.product[i].product.product_name+`</p>
							<a href="{{ route('product-details') }}/`+data.product[i].product.id+`" class="btn btn-default add-to-cart"></i>View Product</a>
							<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
						</div>
						
					</div>
				</div>
			</div>`);
			}
			
			//$("#category_id").html(data);
		},
		
	});

}
</script>
