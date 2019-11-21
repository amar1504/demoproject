@extends('master')

@section('content')
<h3>Order List<hr></h3>

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card ">
                        <div class="card-body">
                            <div class="col-md-12 col-md-offset-1">
                                <!-- Display flash Message in alert start -->
                                @if (session('flash_message'))
                                    <div class="alert alert-warning">
                                        {{ session('flash_message') }}
                                    </div>
                                @endif
                                <!-- Display flash Message in alert End -->
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th><th class="text-center">Order Id</th><th class="text-center">Order Date</th><th class="text-center">Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $item)
                                                <tr class="text-center">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->created_at}}</td>
                                                    <td>                                               
                                                        <a href="{{ route('order.details',$item->id) }}" class="btn btn-info" ><i class="fa fa-shopping-bag"></i> View Order</a>                                                
                                                        <a href="{{ route('order.changestatus',$item->id) }}" class="btn btn-danger" ><i class="fa fa-edit"></i> Change Status</a>                                                
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    <div class="pagination-wrapper"> {{ $orders->links() }} </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

