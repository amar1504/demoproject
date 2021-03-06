@extends('master')

@section('content')
<h3>Configuration<hr/></h3>
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6 text-center">
                                <form method="GET" action="{{ route('configuration.index') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                <a href="{{ route('configuration.create') }}" class="btn btn-success btn-sm" title="Add New Configuration">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a> <br> <br/>
                                @endif
                                <!--Access Control  according to role End -->
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <div class="col-md-12 col-md-offset-1">
                        <!-- Display flash Message in alert start -->
                        @if (session('flash_message'))
                            <div class="alert alert-warning text-center">
                                {{ session('flash_message') }}
                            </div>
                        @endif
                        <!--Display flash Message in alert End -->
                        </div>
                        <div class="col-md-12 col-md-offset-1">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Name</th><th>Value</th><th>Title</th><th>Status</th><th class="col-md-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($configuration) < 1)
                                    <tr>
                                    <div class="alert alert-danger text-center">
                                        No Records Found !
                                    </div>
                                    </tr>
                                @else
                                <!-- fetch All configuration start-->
                                @foreach($configuration as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->value }}</td><td>{{ $item->title }}</td>
                                        <td>@if($item->status==1){{ 'Active' }} @else {{ 'Inactive' }} @endif</td>
                                        <td>
                                        <!--Access Control  according to role start -->
                                        @if( Auth::user()->userRole->role_name=='admin' || Auth::user()->userRole->role_name=='superadmin')

                                            <a href="{{ route('configuration.show',$item->id) }}" title="View Configuration"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ route('configuration.edit', $item->id ) }}" title="Edit Configuration"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ route('configuration.destroy',$item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Configuration" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        @else
                                            <a href="{{ route('configuration.show', $item->id) }}" title="View Configuration"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>

                                        @endif
                                        <!--Access Control  according to role End -->
                                        </td>
                                    </tr>
                                @endforeach
                                <!-- fetch All configuration End-->
                                @endif
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $configuration->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
