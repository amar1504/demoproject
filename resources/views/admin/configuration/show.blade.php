@extends('master')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Configuration {{ $configuration->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/configuration') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <!--Access Control  according to role start -->
                        @if(Gate::check('isAdmin') || Gate::check('isSuperAdmin'))
                        <a href="{{ url('/admin/configuration/' . $configuration->id . '/edit') }}" title="Edit Configuration"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/configuration' . '/' . $configuration->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Configuration" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        @endif
                        <!--Access Control  according to role End -->
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <!-- fetch the configuration detail start-->
                                    <tr>
                                        <th>ID</th><td>{{ $configuration->id }}</td>
                                    </tr>
                                    <tr><th> From </th><td> {{ $configuration->from }} </td></tr><tr><th> Subject </th><td> {{ $configuration->subject }} </td></tr><tr><th> Body </th><td> {{ $configuration->body }} </td></tr>
                                    <!-- fetch the configuration detail End-->
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
