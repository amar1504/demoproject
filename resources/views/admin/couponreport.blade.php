@extends('master')

@section('content')
<h3>Coupon Report<hr></h3>

<div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card ">
                        <div class="card-body">
                            <div class="col-md-10 col-md-offset-2 text-center">
                              @if($totalCoupons=="" && $usedCoupons=="" && $unUsedCoupons=="" )
                                <div class='alert alert-danger text-center'>No Records Found !</div>
                              @endif
                               <input type="hidden" id="totalCoupon" value="{{ $totalCoupons }}">
                               <input type="hidden" id="usedCoupon" value="{{ $usedCoupons }}">
                               <input type="hidden" id="unUsedCoupon" value="{{ $unUsedCoupons }}">
                                 
                               <div class="panel">
                                  <div class="panel-heading">Coupon Report</div>
                                    <div class="panel-body">
                                        <div id="piechart"></div>
                                    </div>
                                  </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
  <script type="text/javascript">
    var totalCoupon=$('#totalCoupon').val();
    var usedCoupon=$('#usedCoupon').val();
    var unUsedCoupon=$('#unUsedCoupon').val();
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    
    // Draw the chart and set the chart values
    function drawChart() {
      c=parseInt(usedCoupon);
      p=parseInt(unUsedCoupon);
      var data = google.visualization.arrayToDataTable([
      ['Tasks', 'Coupon Report'],
      ['Used Coupon', c],
      ['Unused Coupon', p]
    ]);

      // Optional; add a title and set the width and height of the chart
      var options = {'title':'Coupon Report ( Total Coupons : '+totalCoupon+' )' , 'width':850, 'height':500};

      // Display the chart inside the <div> element with id="piechart"
      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      chart.draw(data, options);
    }
  </script>

@endsection

