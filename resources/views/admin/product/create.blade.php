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

                        <form method="POST" action="{{ route('product.index') }}" data-parsley-validate="" accept-charset="UTF-8"  enctype="multipart/form-data">
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
      var id=$(this).val();
      var i;
      var option;
      //alert(id);

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
                //alert(data);
                $("#subcategory_id").empty();
                $("#subcategory_id").append("<option value="+' '+">"+'SELECT'+"</option>");
                console.log(data.name);
                for(i=0; i<data.name.length; i++){
                    console.log( data.name[i].category_name);
                    console.log( data.name[i].id);
                    
                    $("#subcategory_id").append("<option value="+data.name[i].id+">"+data.name[i].category_name+"</option>");
                }



                //$("#category_id").html(data);
            }
        });

    });
});
</script>

@endsection

