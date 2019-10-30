@extends('master')

@section('content')
<h3>User #{{ $user->id }}<hr/></h3>
    <div class="container">
        <div class="row">

            <div class="col-md-7 col-md-offset-1">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="col-md-12 text-right">
                            <a href="{{ url('/admin/users') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                            <!--Access Control  according to role start -->                        
                                @if(Gate::check('isAdmin') || Gate::check('isSuperAdmin'))

                                <a href="{{ url('/admin/users/' . $user->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                <form method="POST" action="{{ url('admin/users' . '/' . $user->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete User" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                </form>
                                @endif
                            <!--Access Control  according to role End -->
                        </div>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <!-- fetch the user detail start-->
                                    <tr>
                                        <th>ID</th><td>{{ $user->id }}</td>
                                    </tr>
                                    <tr><th> Firstname </th><td> {{ $user->firstname }} </td></tr>
                                    <tr><th> Lastname </th><td> {{ $user->lastname }} </td></tr>
                                    <tr><th> Email </th><td> {{ $user->email }} </td></tr>
                                    <tr><th> Role </th><td> {{ $user->userRole->role_name }} </td></tr>
                                    @if(isset($user->image) && $user->image!="")
                                        <tr><th> Image </th><td><img src="{{ asset('storage/'.$user->image) }}"> </td></tr>
                                    @endif
                                    <tr>Status<th></th><td>@if($user->status==1){{ 'Active' }} @else {{ 'Inactive' }} @endif</td></tr>
                                <!-- fetch the user detail End-->
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
