@extends('master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                <div class="row mg">
                    <br/><br/>
                        <!-- Display flash Message in alert start -->
                        @if (session('flash_message'))
                            <div class="alert alert-danger text-center">
                                {{ session('flash_message') }}
                            </div>
                        @endif
                        <!-- Display flash Message in alert End -->
                        <div class="col-xs-3 text-center circle">
                            <input type="text" class="knob" data-readonly="true" value="{{ $userCount }} " data-width="60" data-height="60"
                                data-fgColor="#39CCCC">

                            <div class="knob-label">Users &nbsp;&nbsp;<i class='ion ion-person-add'></i></div>
                        </div>

                        <div class="col-xs-3 text-center circle">
                            <input type="text" class="knob" data-readonly="true" value="{{ $orderCount }}" data-width="60" data-height="60"
                                data-fgColor="#39CCCC">

                            <div class="knob-label">Orders &nbsp;&nbsp;<i class="fa fa-shopping-cart"></i></div>
                        </div>
                    
                        <div class="col-xs-3 text-center" style="border-right: 1px solid #f4f4f4">
                            <input type="text" class="knob" data-readonly="true" value="{{ $productCount }}" data-width="60" data-height="60"
                                    data-fgColor="#39CCCC">

                            <div class="knob-label">Products &nbsp;&nbsp;<i class="fa fa-shopping-bag"></i></div>
                        </div>

                        <div class="col-xs-3 text-center">
                            <input type="text" class="knob" data-readonly="true" value="{{ $couponCount }}" data-width="60" data-height="60"
                                    data-fgColor="#39CCCC">

                            <div class="knob-label">Coupons &nbsp;&nbsp;<i class="fa fa-gift "></i></div>
                        </div>
                        <br/><br/><br/><br/><br/><br/>
                        
                    </div>
                    <div class="row ">
                        <div class="col-md-12 col-md-offset-1">
                            <div class="col-md-6 text-center ">
                                <br/>
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3 class="stat-count">{{ $userCount }}</h3>

                                        <p>User Registrations <i class="fa fa-user-plus"></i></p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="#" class="small-box-footer"> User Registrations <i class="fa fa-user-plus"></i></a>
                                </div>
                            </div>

                            <div class="col-md-6 text-center">
                                <br/>
                                <div class="small-box bg-danger ">
                                    <div class="inner">
                                        <h3 class="stat-count">{{ $productCount }}</h3>

                                        <p>Products <i class="fa fa-shopping-bag"></i></p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer"> Products <i class="fa fa-shopping-bag"></i></a>
                                </div>

                            </div>
    
                            <div class="col-md-6 text-center">
                                <br/>
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3 class="stat-count">{{ $orderCount }}</h3>

                                        <p>Orders <i class="fa fa-shopping-cart"></i></p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <a href="#" class="small-box-footer"> Orders <i class="fa fa-shopping-cart"></i></a>
                                </div>

                            </div>

                            <div class="col-md-6 text-center">
                                <br/>
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3 class="stat-count">{{ $couponCount }}</h3>

                                        <p>Coupons <i class="fa fa-gift "></i></p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-gift "></i>
                                    </div>
                                    <a href="#" class="small-box-footer"> Coupons <i class="fa fa-gift "></i></a>
                                </div>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// jquery code to get live count of order, products, user registrations and coupons. -start
jQuery(document).ready(function() {
	function count($this){
		var current = parseInt($this.html(), 10);
		current = current + 1; /* Where 1 is increment */
		$this.html(++current);
		if(current > $this.data('count')){
			$this.html($this.data('count'));
		} else {
			setTimeout(function(){count($this)}, 200);
		}
	}

	jQuery(".stat-count").each(function() {
	  jQuery(this).data('count', parseInt(jQuery(this).html(), 10));
	  jQuery(this).html('0');
	  count(jQuery(this));
	});
});
// jquery code to get live count of order, products, user registrations and coupons. -End

</script>

@endsection
