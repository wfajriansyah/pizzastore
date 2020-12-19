@extends('template.app')

@section('content')
                <div class="col-md-8 mt-4 offset-md-2">
                    <div class="row">
                        <div class="col-lg-12">
                            @foreach ($transaction as $keyTransaksi => $valueTransaksi)
                            <div class="card cardm-b-30">
                                <a href="{{ route('viewTransactionAdmin', ['id' => $valueTransaksi->id]) }}"><div class="card-header bg-primary text-white">
                                    Transaction at {{ $valueTransaksi->created_at }}<br>
                                    User ID : {{ $valueTransaksi->cart->users[0]->id }}<br>
                                    Username : {{ $valueTransaksi->cart->users[0]->username }}
                                </div></a>
                            </div><br>
                            @endforeach
                        </div>
                    </div>
                </div>
@endsection
