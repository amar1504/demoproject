@extends('master')

@section('content')
<h3>Create New Subategory<hr></h3>

    <div class="container">
        <div class="row">

            <div class="col-md-7">
                <div class="box box-primary">
                    <div class="box-body">
                       
                        <!--@if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif-->

                        <form method="POST" action="{{ route('subcateory.store') }}" data-parsley-validate="" accept-charset="UTF-8"  enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.category.scatform', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
