@extends('template.app')

@section('content')
                <div class="col-md-8 mt-4 offset-md-2">
                    <h4 class="text-center">Our freshly made pizza !</h4><hr>
                    @auth
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="GET" action="{{ route('searchPizza') }}">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="form-group row">
                                    <div class="col-lg-4 text-right">
                                        <label>Search Pizza :</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="search" value="@if(Session::has('search')){{ Session::get('search') }}@endif" class="form-control">
                                    </div>
                                    <div class="col-lg-2">
                                        <button class="btn btn-info" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endauth
                    <div class="row">
                        @foreach ($pizza as $pizz)
                        <div class="col-lg-4">
                            <div class="card m-b-30">
                                <a href="{{ route('getpizza', ['id' => $pizz->id]) }}"><img class="card-img-top img-fluid" src="{{ asset($pizz->image) }}" style="width:394px;height:263px;" alt="{{ $pizz->name }}"></a>
                                <div class="card-body">
                                    <h4 class="card-title font-20 mt-0">{{ $pizz->name }}</h4>
                                    <p class="card-text">Rp. {{ $pizz->price }}</p>
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
