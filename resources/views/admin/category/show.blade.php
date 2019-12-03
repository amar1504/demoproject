@extends('master')

@section('content')
<h3>Category #{{ $category->id }}<hr/></h3>
    <div class="container">
        <div class="row">

            <div class="col-md-7 col-md-offset-1">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="col-md-12 text-right">
                            <a href="{{ route('category.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                            <!-- Access Control according to role start-->
                            @if(Gate::check('isSuperAdmin'))
                            <a href="{{ route('category.edit', $category->id) }}" title="Edit Category"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                            <form method="POST" action="{{ route('category.destroy', $category->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
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
                                        <th>ID</th><td>{{ $category->id }}</td>
                                    </tr>
                                    <tr><th> Category Name </th><td> {{ $category->category_name }} </td></tr>
                                    <tr><th>Status</th><td>@if($category->status==1){{ 'Active' }} @else {{ 'Inactive' }} @endif</td></tr>
                                    <tr><th></th><td></td></tr>    
                                    <tr><th>#</th><th>Subcategory Name</th><th>status</th><th>Actions</th> </tr> 
                                    @if(count($subcat) < 1)
                                        <tr>
                                            <td colspan="4" class="alert  alert-danger text-center red">No Records Found !</td>
                                        </tr>
                                    @else
                                    <!-- fetch subcategory in selected category -->
                                    @foreach($subcat as $scat)
                                        <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $scat->category_name }}  </td>
                                        <td>@if($scat->status==1){{ 'Active' }} @else {{ 'Inactive' }} @endif</td>
                                        <td>
                                            <a href="{{ route('subcateory.view', $scat->id) }}" title="View Category"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <!-- Access Control according to role start-->
                                            @if(Gate::check('isSuperAdmin'))
                                            <a href="{{ route('category.edit', $scat->id ) }}" title="Edit Category"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ route('subcateory.destroy', $scat->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Category" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                            @endif
                                            <!-- Access Control according to role End-->
                                        </td>

                                        </tr>
                                    @endforeach
                                    <!-- fetch subcategory in selected category -->
                                    @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
