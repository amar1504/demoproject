@extends('master')

@section('content')
<h3>Contact Us<hr></h3>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row ">
                    <div class="col-md-12 col-md-offset-1">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <!-- fetch All conatc us data -start-->
                                @foreach($contactList as $contact)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->subject }}</td>
                                        <td>{{ $contact->message }}<td>
                                        <a href="{{ route('contactus.show',$contact->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</a>

                                    </tr>
                                @endforeach
                                <!-- fetch All contact us data -end-->
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {{ $contactList->links() }} </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
