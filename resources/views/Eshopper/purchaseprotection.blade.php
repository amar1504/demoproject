@include('Eshopper.header')<!-- include header blade -->

<div class="container">
        <div class="row">
            
            <div class="col-md-8  col-md-offset-2">
            @if(count($cmspurchaseProtection) < 1 )
                <div class='alert alert-danger text-center'>No Records Found !</div>
            @else
            <h3>{{$cmspurchaseProtection->title}}<hr></h3>
                <div class="card ">
                    <div class="card-body">
                    {!! $cmspurchaseProtection->description !!}

                    </div>
                </div>
            @endif
            </div>
        </div>
    </div>
</div>
@include('Eshopper.footer') <!-- include footer blade -->
