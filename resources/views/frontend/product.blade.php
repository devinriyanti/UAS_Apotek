@extends('layouts.frontend')

@section('title', 'Products')

@section('content')

    <div class="container products">
        <div class="row">
        @foreach($obat as $o)
            <div class="col-xs-18 col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="{{asset('images/'.$o->gambar)}}" width="500" height="300">
                    <div class="caption">
                        <h4>{{$o->nama_obat}}</h4>
                        <p>{{Str::limit(strtolower($o->deskripsi), 50)}}</p>
                        <p><strong>Price: </strong> {{$o->harga}}</p>
                        <p class="btn-holder"><a href="/add-to-cart/{{ $o->id }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>

@endsection