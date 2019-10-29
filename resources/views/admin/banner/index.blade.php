@extends('master')

@section('content')
<h3>Banner<hr></h3>
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                    <!--Access Control  according to role start -->
                    @if(Gate::check('isAdmin') || Gate::check('isSuperAdmin'))
                        <a href="{{ url('/admin/banner/create') }}" class="btn btn-success btn-sm" title="Add New Banner">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a><br/><br/>
                    @endif
                    <!--Access Control  according to role End -->
                        <form method="GET" action="{{ url('/admin/banner') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                        <!-- Display flash Message in alert End -->

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Title</th><th>Bannerimage</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <!-- fetch All banners start-->
                                @foreach($banner as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td><td><img src="{{ asset('storage/'.$item->bannerimage) }}" /></td>
                                        <td>
                                            <a href="{{ url('/admin/banner/' . $item->id) }}" title="View Banner"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <!--Access Control  according to role start -->
                                        @if(Gate::check('isAdmin') || Gate::check('isSuperAdmin'))

                                            <a href="{{ url('/admin/banner/' . $item->id . '/edit') }}" title="Edit Banner"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/banner' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Banner" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        @endif
                                        <!--Access Control  according to role end -->
                                        </td>
                                    </tr>
                                @endforeach
                                <!-- fetch All banners start-->
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $banner->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
