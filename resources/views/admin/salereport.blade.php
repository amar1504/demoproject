@extends('master')

@section('content')
<h3>Sale Report<hr></h3>

<div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card ">
                        <div class="card-body">
                            <div class="col-md-10 col-md-offset-2 text-center">
                               <input type="hidden" id="ordercount" value=" {{ $order }}">
                               <input type="hidden" id="cod" value=" {{ $orderCod }}">
                               <input type="hidden" id="paypal" value=" {{ $orderPaypal }}">
                               <div class="panel">
                                  <div class="panel-heading">Sale Report</div>
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
    var cod=$('#cod').val();
    var paypal=$('#paypal').val();
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    
    // Draw the chart and set the chart values
    function drawChart() {
      c=parseInt(cod);
      p=parseInt(paypal);
      var data = google.visualization.arrayToDataTable([
      ['Tasks', 'order Payment'],
      ['Cash On delivery', c],
      ['Paypal', p]
    ]);

      // Optional; add a title and set the width and height of the chart
      var options = {'title':'Sale Order ( Total Order : '+(c+p)+')' , 'width':850, 'height':500};

      // Display the chart inside the <div> element with id="piechart"
      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      chart.draw(data, options);
    }
  </script>

@endsection

