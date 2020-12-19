@extends('template.app')

@section('content')
                <div class="col-md-8 mt-5 offset-md-2">
                    <div class="card m-b-30 card-body">
                        <h3 class="card-title text-center font-20 mt-0">Delete - Pizza<hr></h3>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img src="{{ asset($pizza->image) }}" style="width:290px;height:250px;" />
                                </div>
                                <div class="col-lg-8">
                                    <form method="POST" action="{{ route('do_deletePizza', ['id' => $pizza->id]) }}">
                                        @csrf

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </div>
                                        @endif

                                        <h1>{{ $pizza->name }}</h1><hr>
                                        {{ $pizza->description }}<br><br>
                                        <button type="submit" class="btn btn-primary">Delete Pizza</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
