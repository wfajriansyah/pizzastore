@extends('template.app')

@section('content')
                <div class="col-md-8 mt-5 offset-md-2">
                    <div class="card m-b-30 card-body">
                        <h3 class="card-title text-center font-20 mt-0">View - Pizza<hr></h3>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img src="{{ asset($pizza->image) }}" style="width:290px;height:250px;" />
                                </div>
                                <div class="col-lg-8">
                                    <h1>{{ $pizza->name }}</h1><hr>
                                    {{ $pizza->description }}<br>
                                    Rp. {{ $pizza->price }}<br><br>
                                    @can('isMember')
                                        <form method="POST" action="{{ route('addCart') }}">
                                            @csrf

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </div>
                                            @endif

                                            <div class="form-group row">
                                                <input type="hidden" name="pizza_id" value="{{ $pizza->id }}" />
                                                <div class="col-md-4">
                                                    Quantity :
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" name="qty" value="1" class="form-control" />
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                                                </div>
                                            </div>
                                        </form>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
