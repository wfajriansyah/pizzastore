@extends('template.app')

@section('content')
                <div class="col-md-8 mt-5 offset-md-2">
                    <div class="card m-b-30 card-body">
                        <h3 class="card-title text-center font-20 mt-0">Add - Pizza<hr></h3>
                        <div class="card-body">
                            <form method="POST" action="{{ route('do_addPizza') }}" enctype="multipart/form-data">
                                @csrf

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Pizza Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama pizza.">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Pizza Price</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" name="price" placeholder="Masukkan harga pizza.">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Pizza Description</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="name" name="description" placeholder="Masukkan deskripsi pizza.">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Pizza Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">

                                    </div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-info">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
@endsection
