@extends('master')

@section('content')
<h3>CMS #{{ $cm->id }}<hr></h3>
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-md-offset-1">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="col-md-12 text-right">   
                            <a href="{{ route('cms.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                            <a href="{{ route('cms.edit',$cm->id) }}" title="Edit cm"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                            <form method="POST" action="{{ route('cms.destroy',$cm->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete cm" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            </form>
                        </div>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $cm->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $cm->title }} </td></tr><tr><th> Description </th><td> {{ $cm->description }} </td></tr><tr><th> Status </th><td> @if($cm->status==1) {{ 'Active' }} @else {{ 'Inactive' }} @endif</td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
