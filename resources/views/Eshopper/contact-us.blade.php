@include('Eshopper.header')<!-- include header blade -->

<section>
	<div class="container">
		<div class="row">
			<div id="contact-page" class="container">
				<div class="bg">
					<div class="row">    		
						<div class="col-sm-12">    			   			
							<h2 class="title text-center">Contact <strong>Us</strong></h2>    
							<!-- Display flash Message in alert start -->
							@if (session('flash_message'))
                            	<div class="alert alert-success">
                                	{{ session('flash_message') }}
								</div>
							@endif
							<!-- Display flash Message in alert End -->			    				    				
							<div id="gmap" class="contact-map">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3781.8765417115364!2d73.73649385006665!3d18.57960388731262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bbc1aaaaaaab%3A0x316090d140dfd0b3!2sNeosoft%20Technologies!5e0!3m2!1sen!2sin!4v1574060994042!5m2!1sen!2sin" width="1150" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
							</div>
						</div>			 		
					</div> <br/>    	
					<div class="row">  	
						<div class="col-sm-8">
							<div class="contact-form">
								<h2 class="title text-center">Get In Touch</h2>
								<div class="status alert alert-success" style="display: none"></div>
								<form id="main-contact-form" class="contact-form row" name="contact-form" method="POST" action="{{ route('contactus.add') }}">
									{{ csrf_field() }}
									<div class="form-group col-md-6">
										<input type="text" name="name" class="form-control" required="required" placeholder="Name">
									</div>
									<div class="form-group col-md-6">
										<input type="email" name="email" class="form-control" required="required" placeholder="Email">
									</div>
									<div class="form-group col-md-12">
										<input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
									</div>
									<div class="form-group col-md-12">
										<textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
									</div>                        
									<div class="form-group col-md-12">
										<input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
									</div>
								</form>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="contact-info">
								<h2 class="title text-center">Contact Info</h2>
								<address>
									<p>E-Shopper Inc.</p>
									<p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
									<p>Newyork USA</p>
									<p>Mobile: +2346 17 38 93</p>
									<p>Fax: 1-714-252-0026</p>
									<p>Email: info@e-shopper.com</p>
								</address>
								<div class="social-networks">
									<h2 class="title text-center">Social Networking</h2>
									<ul>
										<li>
											<a href="#"><i class="fa fa-facebook"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-twitter"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-google-plus"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-youtube"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>    			
					</div>  
				</div>	
			</div><!--/#contact-page-->
		</div>
	</div>
</section>

@include('Eshopper.footer') <!-- include footer blade -->

