@extends('master')
@section('content')
<h3>customer Report<hr></h3>
<div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card ">
                        <div class="card-body">
                            <div class="col-md-10 col-md-offset-2 text-center">
                                <div class="panel">
                                    <div class="panel-heading"> Registered customer Report</div>
                                    <div class="panel-body">    
                                        {!! $chart->html() !!}
                                    </div>
                                </div>
                                {!! Charts::scripts() !!}
                                {!! $chart->script() !!}
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
  
@endsection



