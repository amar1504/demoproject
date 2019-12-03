	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							@if(count($cms) >= 1)
								@foreach($cms as $k=>$c)
									@if($k==1)
										{!! $c->description !!}

									@endif
								@endforeach
							@endif
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{ asset('Eshopper/images/home/iframe1.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="Eshopper/images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{ asset('Eshopper/images/home/iframe3.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{ asset('Eshopper/images/home/iframe4.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="{{ asset('Eshopper/images/home/map.png')}}" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="single-widget">
							<h2>Get to Know us</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="{{ route('about') }}">About Us</a></li>
								<li><a href="{{ route('view.contactus') }}">Contact Us</a></li>
							</ul>
						</div>
					</div>
					<!-- <div class="col-sm-2">
						<div class="single-widget">
							<h2>Quick Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="{{ route('product',17) }}">T-Shirt</a></li>
								<li><a href="{{ route('product',18) }}">Shirt</a></li>
								<li><a href="{{ route('product',22) }}">Women Dress</a></li>
								<li><a href="{{ route('product',23) }}">Women Footware</a></li>
							</ul>
						</div>
					</div> -->
					<div class="col-sm-3">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="{{ route('privacy') }}">Privacy & Terms</a></li>
								<li><a href="{{ route('returnrefund') }}">Return & Refund Policy</a></li>
								<li><a href="{{ route('purchaseprotection') }}">100% Purchase Protection</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="single-widget">
							<h2>Connect with us</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Facebook</a></li>
								<li><a href="#">Twitter</a></li>
								<li><a href="#">Instagram</a></li>
								<li><a href="#">Google+</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 ">						
						<div class="single-widget" >
							<h2>About Shopper</h2>
							@if ($message = Session::get('success'))
						<div class="alert alert-success alert-block" >
							<button type="button" class="close" data-dismiss="alert" autofocus>×</button>	
								<strong>{{ $message }}</strong>
						</div>
						@endif

						@if ($message = Session::get('error'))
						<div class="alert alert-danger alert-block">
							<button type="button" class="close" data-dismiss="alert" autofocus>×</button>	
								<strong>{{ $message }}</strong>
						</div>
						@endif
							<form action="{{ route('subscribe') }}" method="POST" class="searchform" data-parsley-validate="">
								{{ csrf_field() }}
								<input name="email" id="email" type="email" placeholder="Your email address" data-parsley-trigger="change" required />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">
					@if(count($cms) >= 1)
						@foreach($cms as $c)
							@if($loop->iteration == 1)
							{!! $c->description !!}
							@endif
						@endforeach
					@endif
					</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="{{ asset('Eshopper/js/jquery.js')}}"></script>
	<script src="{{ asset('Eshopper/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('Eshopper/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{ asset('Eshopper/js/price-range.js')}}"></script>
    <script src="{{ asset('Eshopper/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{ asset('Eshopper/js/main.js')}}"></script>
</body>
</html>
