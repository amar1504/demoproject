@include('Eshopper.header')
<div class='row'>
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			@if ($message = Session::get('success'))
			<div class="custom-alerts alert alert-success fade in">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
				{!! $message !!}
			</div>
			<?php Session::forget('success');?>
			@endif
			@if ($message = Session::get('error'))
			<div class="custom-alerts alert alert-danger fade in">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
				{!! $message !!}
			</div>
			<?php Session::forget('error');?>
			@endif

			<br/><br/><center> <h4>Your Order has been Submitted... </h4></center>
			<br/><br/>

		</div>
	</div>
	
</div>
<script>
$(document).ready(function() {
	window.setTimeout(function() {
	    window.location.href = '{{ route('eshopper') }}';
	}, 4000);
});
</script>
@include('Eshopper.footer')
