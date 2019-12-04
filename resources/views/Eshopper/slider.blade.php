	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					@if(count($banner) >= 1)
						<div id="slider-carousel" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">								
								@foreach($banner as $ban)
								<li data-target="#slider-carousel" data-slide-to="{{$loop->index}}" class="{{ $loop->first ? 'active' : '' }}"></li>
								@endforeach								
							</ol>
							
							<div class="carousel-inner">								
								@foreach($banner as $ban)
								<div class="item {{ $loop->first ? 'active' : '' }}">
									<div class="col-sm-6">
										<h1><span>E</span>-SHOPPER</h1>
										<h2>{{$ban->title}}</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
										<!-- <button type="button" class="btn btn-default get">Get it now</button> -->
									</div>
									<div class="col-sm-6">
										<img src="{{ asset('storage/'.$ban->bannerimage)}}" class="girl img-responsive" alt="" />
										<img src="{{ asset('Eshopper/images/home/pricing.png')}}"  class="pricing" alt="" />
									</div>
								</div>
								@endforeach								
							</div>
							
							<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							</a>
							<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
								<i class="fa fa-angle-right"></i>
							</a>
						</div>
					@endif
				</div>
			</div>
		</div>
	</section><!--/slider-->

