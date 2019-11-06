@include('Eshopper.header')<!-- include header blade -->
@include('Eshopper.slider')<!-- include slider blade -->
	
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					    @include('Eshopper.category')
                    
                </div>
                
                @include('Eshopper.featuresitems')                
                @include('Eshopper.footerslider')                
            </div>
        </div>
</section>
@yield('content') <!-- include Content -->

					
@include('Eshopper.footer') <!-- include footer blade -->
