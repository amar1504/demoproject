@extends('master')

@section('content')
<h3>Contact Us #{{ $contact->id }}<hr></h3>
    <div class="container">
        <div class="row">

            <div class="col-md-7 col-md-offset-1">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="col-md-12 text-right">   
                                <a href="{{ route('contactus.list') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                              
                            </div>
                            <br/>
                            <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <!-- fetch the contact us detail start-->
                                    <tr>
                                        <th>ID</th><td>{{ $contact->id }}</td>
                                    </tr>
                                    <tr><th> Name :</th><td> {{ $contact->name }} </td></tr>
                                    <tr><th> Email :</th><td> {{ $contact->email }}</td></tr>
                                    <tr><th> Subject :</th><td> {{ $contact->subject }}</td></tr>
                                    <tr><th> Message :</th><td> {{ $contact->message }}</td></tr>
                                    <form method="POST" action="{{ route('contactus.replyupdate') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="contact_id" value="{{ $contact->id }}">
                                        <tr><th> Reply :</th><td> <textarea rows="5" class="form-control" name="reply" required></textarea></td></tr>
                                        <tr><th></th><td> <button type="submit" name="submit" class="btn btn-primary" > Send Reply&nbsp;&nbsp;<i class="fa fa-reply"></i></button></td></tr>
                                    </form>
                                    <!-- fetch the contact us detail End-->
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
