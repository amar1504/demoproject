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
                        <!-- Display flash Message in alert start -->
                        @if (session('flash_message'))
                            <div class="alert alert-warning">
                                {{ session('flash_message') }}
                            </div>
                        @endif
                        <!-- Display flash Message in alert End -->
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
                                @if(count($contactList) < 1)
                                    <tr>
                                    <div class="alert alert-danger text-center">
                                        No Records Found !
                                    </div>
                                    </tr>
                                @else
                                <!-- fetch All conatc us data -start-->
                                @foreach($contactList as $contact)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->subject }}</td>
                                        <td>{{ $contact->message }}</td>
                                        <td class="col-md-2">
                                        <a href="{{ route('contactus.show',$contact->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                        @if($contact->reply=="")
                                            <a href="{{ route('contactus.reply',$contact->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-reply" aria-hidden="true"></i> Reply</a>
                                        
                                        @endif
                                        </td> 
                                       
                                    </tr>
                                @endforeach
                                <!-- fetch All contact us data -end-->
                                @endif
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
