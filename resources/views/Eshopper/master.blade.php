@include('Eshopper.header')
@include('Eshopper.slider')
	
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
                        @include('Eshopper.category')
                    </div>
                </div>
                
                @include('Eshopper.recomended')                
            </div>
        </div>
</section>
@yield('content') <!-- include Content -->

					
@include('Eshopper.footer')
