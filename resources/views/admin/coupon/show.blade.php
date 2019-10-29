@extends('master')

@section('content')
<h3>Coupon #{{ $coupon->id }}<hr/></h3>
    <div class="container">
        <div class="row">

            <div class="col-md-7">
                <div class="box box-primary">
                    <div class="box-body">

                        <a href="{{ url('/admin/coupon') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <!-- Access Control according to role start-->
                        @if(Gate::check('isSuperAdmin') )
                        <a href="{{ url('/admin/coupon/' . $coupon->id . '/edit') }}" title="Edit Coupon"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/coupon' . '/' . $coupon->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Coupon" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        @endif
                        <!-- Access Control according to role start-->
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <!-- fetch Coupon Details Start-->
                                    <tr>
                                        <th>ID</th><td>{{ $coupon->id }}</td>
                                    </tr>
                                    <tr><th> Coupon Title </th><td> {{ $coupon->coupon_title }} </td></tr>
                                    <tr><th> Code </th><td> {{ $coupon->code }} </td></tr>
                                    <tr><th> Description </th><td> {{ $coupon->description }} </td></tr>
                                    <tr><th> Type </th><td> @if($coupon->type ==1) {{ 'Discount'}} @else {{'Amount'}} @endif </td></tr>
                                    <tr><th> @if($coupon->type ==1) {{ 'Discount'}} @else {{'Amount'}} @endif </th><td> {{ $coupon->discount }} </td></tr>
                                    <!-- fetch Coupon Details end-->
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
