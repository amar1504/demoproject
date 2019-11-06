<div class="left-sidebar">
	<h2>Category</h2>
	<div class="panel-group category-products" id="accordian"><!--category-productsr-->
		@foreach($category as $cat)
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordian" href="#{{$cat->id}}">
						<span class="badge pull-right"><i class="fa fa-plus"></i></span>
						{{$cat->category_name}}
					</a>
				</h4>
			</div>
			
			<div id="{{$cat->id}}" class="panel-collapse collapse">
				<div class="panel-body">
					<ul>
						@foreach($cat->subCategories as $subcat) 
						<li><a href="{{ route('product', [ 'id'=> $subcat->id ] ) }}"> {{  $subcat->category_name}} </a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
		@endforeach
		<!--<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a href="#">Kids</a></h4>
			</div>
		</div>-->
		
	</div><!--/category-products-->

	<div class="brands_products"><!--brands_products-->
		<h2>Brands</h2>
		<div class="brands-name">
			<ul class="nav nav-pills nav-stacked">
				@foreach($subcategorycount as $scount)
				<li><a> <span class="pull-right">({{ count($scount->products) }}) </span>{{ $scount->category_name }}</a></li>
				@endforeach
				
			</ul>
		</div>
	</div><!--/brands_products-->
	
	
	<div class="shipping text-center"><!--shipping-->
		<img src="{{ asset('Eshopper/images/home/shipping.jpg')}}" alt="" />
	</div><!--/shipping-->
	<br/>
</div>			
