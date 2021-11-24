@extends('layouts.frontend')

@section('title', 'Products')

@section('content')

    <div class="container products">

        <div class="row">
            @foreach($products as $p)
                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ asset('img/'.$p->image) }}" alt="">
                        <div class="captipon">
                            <h5 class="mt-3">{{ $p->nama }}</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, soluta, eligendi doloribus sunt minus amet sit debitis repellat. Consectetur, culpa itaque odio similique suscipit</p>
                            <p><strong>Price: </strong>Rp. {{ $p->harga_jual }}</p>
                            <p class="btn-holder"><a href="{{ url('add-to-cart/'.$p->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!-- End row -->

    </div>

@endsection