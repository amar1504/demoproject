@include('Eshopper.header')

    <div class="container">
        <div class="row">
            <div class="col-md-3" >
            @include('Eshopper.category')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header left-sidebar"><h2>Address {{ $address->id }}</h2></div>
                    <div class="card-body">

                        <a href="{{ url('/eshopper/address') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/eshopper/address/' . $address->id . '/edit') }}" title="Edit Address"><button class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('eshopper/address' . '/' . $address->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Address" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $address->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $address->name }} </td></tr>
                                    <tr><th> Address1 </th><td> {{ $address->address1 }} </td></tr>
                                    <tr><th> Address2 </th><td> {{ $address->address2 }} </td></tr>
                                    <tr><th> City </th><td> {{ $address->city }} </td></tr>
                                    <tr><th> Zipcode </th><td> {{ $address->zipcode }} </td></tr>
                                    <tr><th> State </th><td> {{ $address->state }} </td></tr>
                                    <tr><th> Country </th><td> {{ $address->country }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@include('Eshopper.footer')
