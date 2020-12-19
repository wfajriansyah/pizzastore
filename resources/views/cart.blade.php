@extends('template.app')

@section('content')
                <div class="col-md-8 mt-4 offset-md-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-b-30 card-body">
                                @if(Session::has('myCart') && Session::get('myCart')!=null)
                                @foreach (Session::get('myCart') as $keyCart => $valueCart)
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{ asset($valueCart['photo'])}}" style="width:290px;height:250px;" />
                                        </div>
                                        <div class="col-md-8">
                                            <h2>{{ $valueCart['name'] }}</h2>
                                            Rp. {{ $valueCart['price'] }}<br/>
                                            Quantity : {{ $valueCart['quantity'] }}<hr>
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </div>
                                            @endif
                                            <form action="{{ route('updateCart') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="pizza_id" value="{{ $keyCart }}" />
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        Quantity : <input type="number" class="form-control" name="qty" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="text-center">
                                                        <button type="submit" name="button" value="update" class="btn btn-info">Update Quantity</button>
                                                        <button type="submit" name="button" value="delete" class="btn btn-primary">Delete from Cart</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    @if(count(Session::get('myCart')) > 1)
                                    <hr>
                                    @endif
                                @endforeach
                                @else
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        You not have cart :(
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        @if(Session::has('myCart') && Session::get('myCart')!=null)
                        <div class="col-lg-12 text-center">
                            <a href="{{ route('checkoutCart') }}" class="btn btn-danger">Checkout</a>
                        </div>
                        @endif
                    </div>
                </div>
@endsection
