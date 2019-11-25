@extends('master')

@section('content')
<h3>Roles <hr></h3>
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                    <div class="row ">
                    <div class="col-md-6 text-center">
                    <form method="GET" action="{{ route('roles.index') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="row">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                    <!--Access Control  according to role start -->
                    @if(Gate::check('isAdmin') || Gate::check('isSuperAdmin'))
                        <a href="{{ route('roles.create') }}" class="btn btn-success btn-sm" title="Add New Role">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a><br/><br/>
                    @endif  
                    <!--Access Control  according to role End -->
                    </div>
                    </div>
                    <div class="col-md-12 col-md-offset-1">
                        <!-- Display flash Message in alert start -->
                        @if (session('flash_message'))
                            <div class="alert alert-warning">
                                {{ session('flash_message') }}
                            </div>
                        @endif
                        <!-- Display flash Message in alert End -->
                        </div>
                        <br/>
                        <br/>
                        <div class="col-md-12 col-md-offset-1">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Role Name</th><th>Status</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <!-- fetch All roles start-->
                                @foreach($roles as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->role_name }}</td>
                                        <td>@if($item->status==1){{ 'Active' }} @else {{ 'Inactive' }} @endif</td>
                                        <td>
                                        @if( Auth::user()->userRole->role_name=='admin' || Auth::user()->userRole->role_name=='superadmin')

                                            <a href="{{ route('roles.show', $item->id) }}" title="View Role"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ route('roles.edit' , $item->id) }}" title="Edit Role"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ route('roles.destroy',$item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Role" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        @else
                                        <a href="{{ route('roles.show' , $item->id) }}" title="View Role"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>

                                        @endif
                                        </td>
                                    </tr>
                                @endforeach
                                <!-- fetch All roles End-->
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $roles->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
