@extends('master')

@section('content')
<h3>Change Order Status (order id:#{{ $orders->id }})<hr></h3>
    <div class="container">
        <div class="row">

            <div class="col-md-7 col-md-offset-1">
                <div class="box box-primary">
                    <div class="box-body">
                        
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <!-- fetch the order detail start-->
                                    <tr>
                                        <th>ID</th><td>{{ $orders->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Date </th><td> {{ $orders->created_at }} </td>
                                    </tr>
                                    <form method="post" action="{{ route('order.updatestatus')}}">
                                        {{ csrf_field() }}
                                        <tr>
                                            <th> Status </th>
                                            <td>
                                                <select name="status" class="form-control">
                                                    <option value="pending" @if($orders->OrderDetails->status=='pending') {{ 'selected' }} @endif>Pending</option>
                                                    <option value="processing" @if($orders->OrderDetails->status=='processing') {{ 'selected' }} @endif>Processing</option>
                                                    <option value="dispatched" @if($orders->OrderDetails->status=='dispatched') {{ 'selected' }} @endif>Dispatched</option>
                                                    <option value="delivered" @if($orders->OrderDetails->status=='delivered') {{ 'selected' }} @endif>Delivered</option>
                                                    <option value="cancelled" @if($orders->OrderDetails->status=='cancelled') {{ 'selected' }} @endif>Cancelled</option>
                                                </select>
                                                {!! $errors->first('status', '<p class="help-block red">:message</p>') !!}
                                            </td>
                                        </tr>
                                        <input type="hidden" name="order_id" value="{{ $orders->id }}">
                                        <tr>
                                            <th></th>
                                            <td><input type="submit" value="Update Status" class="btn btn-primary"></td>

                                        </tr>
                                    </form>
                                    <!-- fetch the order detail End-->
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
