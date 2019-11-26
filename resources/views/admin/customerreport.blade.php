@extends('master')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<h3>customer Report<hr></h3>

<div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card ">
                        <div class="card-body">
                            <div class="col-md-10 col-md-offset-2 text-center">
                                <!-- Display flash Message in alert start -->
                                @if (session('flash_message'))
                                    <div class="alert alert-warning">
                                        {{ session('flash_message') }}
                                    </div>
                                @endif
                                <!-- Display flash Message in alert End -->
                                
                                <canvas id="bar-chart" width="800" height="450"></canvas>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
      new Chart(document.getElementById("bar-chart"), {
        type: 'bar',
        data: {
          labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
          datasets: [
            {
              label: "Customer (millions)",
              backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
              data: [1,2,3,4,5,6,7,8,10]
            }
          ]
        },
        options: {
          legend: { display: false },
          title: {
            display: true,
            text: 'Registerd Customer'
          }
        }
    });
    </script>
@endsection


