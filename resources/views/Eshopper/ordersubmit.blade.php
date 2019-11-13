@include('Eshopper.header')
<div class='row'>
	<br/><br/><center> <h4>Your Order has been Submitted... </h4></center>
	<br/><br/>
</div>
<script>
$(document).ready(function() {
	window.setTimeout(function() {
	    window.location.href = '{{ route('eshopper') }}';
	}, 5000);
});
</script>
@include('Eshopper.footer')
