@include('Eshopper.header')<!-- include header blade -->

<section>
		<div class="container">
			<div class="row">
                <div class="col-sm-3 features_items">
                    @include('Eshopper.myaccount') <!-- include my account blade -->
                </div>
                <div class="col-md-9">
                    <div class="col-md-10 col-md-offset-1">
                        <h2 class="title text-center features_items "> Track Order ({{ '#'.$orderId.') ('.$status}})</h2>
                            <ul class="progressbar">
                            <li class=" @if($status=='pending' || $status=='processing' || $status=='dispatched' || $status=='delivered' || $status=='cancelled' ) {{ 'active' }} @endif">Pending</li>
                                <li class=" @if($status=='processing' || $status=='dispatched' || $status=='delivered' || $status=='cancelled') {{ 'active' }} @endif">Processing</li>
                                <li class=" @if($status=='dispatched' || $status=='delivered' || $status=='cancelled' ||  $status=='dispatched') {{ 'active' }} @endif">Dispactched</li>
                                <li class=" @if($status=='delivered' || $status=='cancelled') {{ 'active' }} @endif">Delivered</li>
                                <li class=" @if($status=='cancelled') {{ 'active' }} @endif">Cancelled</li>
                            </ul>
                        <br/>
                    </div>
                    
                </div>
            </div>
        </div>
</section>

@include('Eshopper.footer') <!-- include footer blade -->
