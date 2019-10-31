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
											@if($cat->parent_id==0)
												@foreach($cat->subCategories as $subcat) 
											<li><a href="#">{{  $subcat->category_name}} </a></li>
											@endforeach
											@endif
										</ul>
									</div>
								</div>
							</div>
							@endforeach
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Kids</a></h4>
								</div>
							</div>
							<!--@foreach($category as $cat)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">{{$cat->category_name}}</a></h4>
								</div>
								
							</div>
							@endforeach-->
							
						</div><!--/category-products-->

						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
								@foreach($category as $cat)
									<li><a href="#"> <span class="pull-right">(50)</span>{{$cat->category_name}}</a></li>
								@endforeach
								</ul>
							</div>
						</div><!--/brands_products-->
						