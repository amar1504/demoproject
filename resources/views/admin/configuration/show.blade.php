@extends('master')

@section('content')
<h3>Configuration #{{ $configuration->id }}<hr/></h3>
    <div class="container">
        <div class="row">

            <div class="col-md-7 col-md-offset-1">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="col-md-12 text-right">
                            <a href="{{ route('configuration.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                            <!--Access Control  according to role start -->
                            @if(Gate::check('isAdmin') || Gate::check('isSuperAdmin'))
                            <a href="{{ route('configuration.edit', $configuration->id) }}" title="Edit Configuration"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                            <form method="POST" action="{{ route('configuration.destroy', $configuration->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Configuration" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            </form>
                            @endif
                            <!--Access Control  according to role End -->
                        </div>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <!-- fetch the configuration detail start-->
                                    <tr>
                                        <th>ID</th><td>{{ $configuration->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $configuration->name }} </td></tr>
                                    <tr><th> Value </th><td> {{ $configuration->value }} </td></tr>
                                    <tr><th> Title </th><td> {{ $configuration->title }} </td></tr>
                                    <tr><th>status</th><td>@if($configuration->status==1){{ 'Active' }} @else {{ 'Inactive' }} @endif</td><tr>
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
