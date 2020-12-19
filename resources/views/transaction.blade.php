@extends('template.app')

@section('content')
                <div class="col-md-8 mt-4 offset-md-2">
                    <div class="row">
                        <div class="col-lg-12">
                            @foreach ($trx as $keyTransaksi => $valueTransaksi)
                            @if (($keyTransaksi % 2) == 0)
                            <div class="card m-b-30 bg-primary">
                                <h4 class="card-body"><a href="{{ route('viewTransaction', ['id' => $keyTransaksi+1]) }}">Transaction at {{ $valueTransaksi->created_at }}</a></h4>
                            </div>
                            @else
                            <div class="card m-b-30">
                                <h4 class="card-body"><a href="{{ route('viewTransaction', ['id' => $keyTransaksi+1]) }}">Transaction at {{ $valueTransaksi->created_at }}</a></h4>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
@endsection
