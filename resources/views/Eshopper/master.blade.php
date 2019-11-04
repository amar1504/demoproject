@include('Eshopper.header')<!-- include header blade -->
@include('Eshopper.slider')<!-- include slider blade -->
	
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
                        @include('Eshopper.category')
                    </div>
                </div>
                
                @include('Eshopper.featuresitems')                
                @include('Eshopper.footerslider')                
            </div>
        </div>
</section>
@yield('content') <!-- include Content -->

					
@include('Eshopper.footer') <!-- include footer blade -->
