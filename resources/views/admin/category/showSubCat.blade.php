@extends('master')

@section('content')
<h3>Sub Category #{{ $category->id }}<hr/></h3>

    <div class="container">
        <div class="row">

            <div class="col-md-7 col-md-offset-1">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="col-md-12 text-right">
                            <a href="{{ route('category.show',$category->parent_id) }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                            <!-- Access Control according to role start-->
                            @if(Gate::check('isSuperAdmin'))
                            <a href="{{ route('subcategory.edit', $category->id) }}" title="Edit Category"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                            <form method="POST" action="{{ route('subcateory.destroy',$category->id) }}" accept-charset="UTF-8" style="display:inline">
                               
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Category" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            </form>
                            @endif
                            <!-- Access Control according to role End-->
                        </div>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $category->id }}</td> <!-- fetch category id -->
                                    </tr>
                                    <tr>
                                        <th> Category Name </th>
                                        <td> {{ $category->category_name }} </td> <!-- fetch category detail -->
                                        </tr>
                                        <tr><th>Status</th><td>@if($category->status==1){{ 'Active' }} @else {{ 'Inactive' }} @endif</td></tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
