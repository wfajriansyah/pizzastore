@extends('template.app')

@section('content')
                <div class="col-md-8 mt-4 offset-md-2">
                    <div class="row">
                        @foreach ($users as $user)
                        <div class="col-lg-4">
                            <div class="card cardm-b-30">
                                <div class="card-header bg-primary text-white">
                                    UserID : {{ $user->id }}
                                </div>
                                <div class="card-body">
                                    <blockquote class="card-bodyquote">
                                        Username : {{ $user->username }}<br/><br/>
                                        Email : {{ $user->email }}<br/><br/>
                                        Address : {{ $user->address }}<br/><br/>
                                        Phone Number : {{ $user->phone_number }}<br/><br/>
                                        Gender : {{ $user->gender }}
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
@endsection
