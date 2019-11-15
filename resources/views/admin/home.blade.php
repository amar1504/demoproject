@extends('master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <div class="row ">
                    <div class="col-md-12 col-md-offset-1">
                        <div class="col-md-6 text-center ">
                        
                            <!-- small box -->
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
                            <!-- small box -->
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

                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
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
</script>

@endsection
