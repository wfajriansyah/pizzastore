@extends('template.app')

@section('content')
                <div class="col-md-8 mt-5 offset-md-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-b-30">
                                <div class="card-header bg-primary">Viewing ID Transaction {{ $transaction[0]->id }} | Orders ID : {{ $transaction[0]->cart->orders[0]->id_orders }} | Total : Rp. {{ $transaction[0]->total }}</div>
                                <div class="card-body">
                                    @if (count($transaction[0]->cart->orders) > 1)
                                        @foreach ($transaction[0]->cart->orders as $orders)
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src="{{ asset($orders->pizza->image)}}" style="width:290px;height:250px;" />
                                                </div>
                                                <div class="col-md-8">
                                                    <h2>{{ $orders->pizza->name }}</h2>
                                                    Rp. {{ $orders->pizza->price }}<br/>
                                                    Quantity : {{ $orders->quantity }}<br/><br/>
                                                    Price : Rp. {{ $orders->pizza->price*$orders->quantity }}
                                                </div>
                                            </div><hr>
                                        @endforeach
                                    @else
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="{{ asset($transaction[0]->cart->orders[0]->pizza->image)}}" style="width:290px;height:250px;" />
                                            </div>
                                            <div class="col-md-8">
                                                <h2>{{ $transaction[0]->cart->orders[0]->pizza->name }}</h2>
                                                Rp. {{ $transaction[0]->cart->orders[0]->pizza->price }}<br/>
                                                Quantity : {{ $transaction[0]->cart->orders[0]->quantity }}<br/><br/>
                                                Price : Rp. {{ $transaction[0]->cart->orders[0]->pizza->price*$transaction[0]->cart->orders[0]->quantity }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
