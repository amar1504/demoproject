@extends('master')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Configuration</div>
                    <div class="card-body">
                    <!--Access Control  according to role start -->
                    @if(Gate::check('isAdmin') || Gate::check('isSuperAdmin'))

                        <a href="{{ url('/admin/configuration/create') }}" class="btn btn-success btn-sm" title="Add New Configuration">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    @endif
                    <!--Access Control  according to role End -->
                        <form method="GET" action="{{ url('/admin/configuration') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <!-- Display flash Message in alert start -->
                        @if (session('flash_message'))
                            <div class="alert alert-warning">
                                {{ session('flash_message') }}
                            </div>
                        @endif
                        <!--Display flash Message in alert End -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>From</th><th>Subject</th><th>Body</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <!-- fetch All configuration start-->
                                @foreach($configuration as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->from }}</td><td>{{ $item->subject }}</td><td>{{ $item->body }}</td>
                                        <td>
                                        <!--Access Control  according to role start -->
                                        @if( Auth::user()->userRole->role_name=='admin' || Auth::user()->userRole->role_name=='superadmin')

                                            <a href="{{ url('/admin/configuration/' . $item->id) }}" title="View Configuration"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/configuration/' . $item->id . '/edit') }}" title="Edit Configuration"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/configuration' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Configuration" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        @else
                                            <a href="{{ url('/admin/configuration/' . $item->id) }}" title="View Configuration"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>

                                        @endif
                                        <!--Access Control  according to role End -->
                                        </td>
                                    </tr>
                                @endforeach
                                <!-- fetch All configuration End-->
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $configuration->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
