@include('Eshopper.header')<!-- include header blade -->

<div class="container">
        <div class="row">
            
            <div class="col-md-8  col-md-offset-2">
            <h3>{{$cmspurchaseProtection->title}}<hr></h3>

                <div class="card ">
                    <div class="card-body">
                    {!! $cmspurchaseProtection->description !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('Eshopper.footer') <!-- include footer blade -->
