@include('Eshopper.header')<!-- include header blade -->

<div class="container">
        <div class="row">
            
            <div class="col-md-8  col-md-offset-2">
            <h3>{{$cmsPrivacy->title}}<hr></h3>

                <div class="card ">
                    <div class="card-body">
                    {!! $cmsPrivacy->description !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('Eshopper.footer') <!-- include footer blade -->
