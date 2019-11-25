@include('Eshopper.header')
    <div class="container">
        <div class="row">
            <div class="col-md-3" >
            @include('Eshopper.myaccount') <!-- include my account blade -->
            </div>
            <div class="col-md-9">
                <div class="card ">
                    <div class="card-header left-sidebar"><h2>My Order</h2></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
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
                                                
                                                <a href="{{ route('user.myorderdetails',$item->id) }}" class="btn btn-info" >view Order</a>
                                                <a href="{{ route('user.trackorderList',$item->id)}}" class="btn btn-warning" >Track Order</a>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@include('Eshopper.footer')

