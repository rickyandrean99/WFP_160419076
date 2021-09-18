@extends('layouts.conquer2')

@section('content')
    <div class="container-fluid">
        <h2 style="margin-bottom: 3%">Daftar Produk</h2>

        <ul class="breadcrumb">
            <li class="breadcrumb-item mb-4">
                <i class="fa fa-home"></i>
                <a href="/">Dashboard</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
            <li class="breadcrumb-item"><a href="/product/{{ $data->id }}">{{ $data->nama }}</a></li>
        </ul>

        <table class="table" border="1">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Hasil</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>ID</td>
                    <td>{{ $data->id }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>{{ $data->nama }}</td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>{{ $data->harga_jual }}</td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>{{ $data->category->nama }}</td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $data->created_at }}</td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $data->updated_at }}</td>
                </tr>
            </tbody>
        </table>
	</div>

    <script>
        let element = document.querySelector('.product');
        element.classList.add('active');
    </script>
@endsection