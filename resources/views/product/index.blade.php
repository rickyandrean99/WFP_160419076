@extends('layouts.conquer2')

<style>
    * {
        box-sizing: border-box !important;
    }

    .pudding-wrapper {
        width: 24.5%;
        display: inline-block;
        text-align: center;
        padding: 15px
    }

    .pudding-image {
        max-width: 70%;
    }

    .pudding-text {
        margin-top: 12px;
        font-size: 14px;

    }
</style>

@section('content')
    <div class="container-fluid">
        <h2 style="margin-bottom: 3%">Daftar Produk</h2>

        <ul class="breadcrumb">
            <li class="breadcrumb-item mb-4">
                <i class="fa fa-home"></i>
                <a href="/">Dashboard</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
        </ul>

		<div class="row">
            @foreach($products as $p)
				<div class="pudding-wrapper">
                    <a href="/product/{{ $p->id }}" style="text-decoration: none">
                        <img class="pudding-image" src="{{ asset('img/'.$p->image) }}">
                        <div class="pudding-text">{{ $p->nama }}&nbsp;&nbsp;Rp. {{ $p->harga_jual }}</div>
                    </a>
				</div>
            @endforeach
        </div>
	</div>

    <script>
        let element = document.querySelector('.product');
        element.classList.add('active');
    </script>
@endsection