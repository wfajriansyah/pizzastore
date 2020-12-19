@extends('template.app')

@section('content')
                <div class="col-md-8 mt-5 offset-md-2">
                    <div class="card m-b-30 card-body">
                        <h3 class="card-title text-center font-20 mt-0">Register<hr></h3>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </div>
                                @endif


                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="username" value="{{ old('username') }}" placeholder="Masukkan username anda.">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Email Address</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="email" value="{{ old('email') }}" placeholder="Masukkan email anda.">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" name="password" placeholder="Masukkan password anda.">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Passowrd</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" name="password_confirmation" placeholder="Masukkan password sekali lagi.">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="address" placeholder="Masukkan alamat anda.">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Phone Number</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="phone_number" placeholder="Masukkan nomor telepon anda.">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Gender</label>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Laki Laki" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Laki Laki
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="Perempuan">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Perempuan
                                            </label>
                                        </div>
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
