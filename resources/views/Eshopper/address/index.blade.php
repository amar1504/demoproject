@include('Eshopper.header')
    <div class="container">
        <div class="row">
            <div class="col-md-3" >
            @include('Eshopper.myaccount')
            </div>
            <div class="col-md-9">
                <div class="card ">
                    <div class="card-header left-sidebar"><h2>Address</h2></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <form method="GET" action="{{ url('/eshopper/address') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                        <div class="input-group row">
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                        </div>
                                        <div class="col-md-4 text-left">
                                            <span class="input-group-append">
                                                <button class="btn btn-secondary" type="submit">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="{{ route('address.create') }}" class="btn btn-success btn-sm" title="Add New Address">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                    </a>
                                </div>
                            </div>
                       
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Name</th><th>Address1</th><th>City/State</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($address as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->address1 }}</td>
                                        <td>{{ $item->city.' / '.$item->state }}</td>
                                        <td>
                                            <a href="{{ route('address.show',['address'=>$item->id]) }}" title="View Address"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ route('address.edit',['address'=>$item->id])  }}" title="Edit Address"><button class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ route('address.destroy',['address'=>$item->id]) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Address" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $address->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@include('Eshopper.footer')

