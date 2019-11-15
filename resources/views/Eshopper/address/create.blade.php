@include('Eshopper.header')

    <div class="container">
        <div class="row">
            <div class="col-md-3" >
            @include('Eshopper.myaccount')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header left-sidebar"><h2>Create New Address</h2></div>
                    <div class="card-body">
                        <a href="{{ url('/eshopper/address') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/eshopper/address') }}" data-parsley-validate="" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('Eshopper.address.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@include('Eshopper.footer')
