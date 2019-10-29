@extends('master')

@section('content')
<h3>Create New Product<hr/></h3>

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

                        <form method="POST" action="{{ url('/admin/product') }}" data-parsley-validate="" accept-charset="UTF-8"  enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.product.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


<script>
$(document).ready(function(){
    $('#category_id').change(function() {
      var id=this.value;
      alert(id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            type:"POST",
            url:"{{ route('dropdown_route') }}",
            data:{category_id:id},
            success:function(data) {
                //alert($data);
                //$("#category_id").html(data);
            }
        });

    });
});
</script>

@endsection

