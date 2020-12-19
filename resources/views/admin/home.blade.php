@extends('template.app')

@section('content')
                <div class="col-md-8 mt-4 offset-md-2">
                    <h4 class="text-center">Our freshly made pizza !</h4><hr>
                    <div class="row">
                        <div class="col-lg-12 mb-2 text-center">
                            <a href="{{ route('add_pizza') }}" class="btn btn-sm btn-primary">Add Pizza</a>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($pizza as $pizz)
                        <div class="col-lg-4">
                            <div class="card m-b-30">
                                <img class="card-img-top img-fluid" src="{{ $pizz->image }}" style="width:394px;height:263px;" alt="{{ $pizz->name }}">
                                <div class="card-body">
                                    <h4 class="card-title font-20 mt-0">{{ $pizz->name }}</h4>
                                    <p class="card-text">Rp. {{ $pizz->price }}<br>
                                    <div class="row">
                                        <div class="col-md-6 text-center">
                                            <a href="{{ route('edit_pizza', ['id' => $pizz->id]) }}" class="btn btn-info">Update Pizza</a>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <a href="{{ route('delete_pizza', ['id' => $pizz->id]) }}" class="btn btn-primary">Delete Pizza</a>
                                        </div>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-lg-12 text-center">
                            {!! $pizza->links() !!}
                        </div>
                    </div>
                </div>
@endsection
