@extends('master')

@section('content')
<h3>Banner<hr></h3>
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6 text-center">
                                <form method="GET" action="{{ url('/admin/banner') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                    <a href="{{ route('banner.create') }}" class="btn btn-success btn-sm" title="Add New Banner">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                    </a><br/><br/>
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
                        <!-- Display flash Message in alert End -->
                        </div>
                        <div class="col-md-12 col-md-offset-1">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Title</th><th>Bannerimage</th><th>Status</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($banner)< 1)
                                    <tr>
                                    <div class="alert alert-danger text-center">
                                        No Records Found !
                                    </div>
                                    </tr>
                                @else
                                <!-- fetch All banners start-->
                                @foreach($banner as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td><td><img src="{{ asset('storage/'.$item->bannerimage) }}" class="imgsize" /></td>
                                        <td>@if($item->status==1){{ 'Active' }} @else {{ 'Inactive' }} @endif</td>
                                        <td>
                                            <a href="{{ route('banner.show' , $item->id) }}" title="View Banner"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <!--Access Control  according to role start -->
                                        @if(Gate::check('isAdmin') || Gate::check('isSuperAdmin'))

                                            <a href="{{ route('banner.edit', $item->id ) }}" title="Edit Banner"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ route('banner.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
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
                                @endif
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $banner->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

