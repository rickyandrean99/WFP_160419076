@extends('layouts.conquer2')

<!-- Bootstrap Resource -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@section('content')
    <div id="container-fluid">
        <h2 style="margin-bottom: 2%">Tambah Produk</h2>

        <ul class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <i class="fa fa-home"></i>
                <a href="/">Dashboard</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
            <li class="breadcrumb-item"><a href="{{ route('product.create') }}">Create</a></li>
        </ul>

        <form action="{{ route('product.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok Produk</label>
                <input type="number" class="form-control" id="stok" name="stok">
            </div>
            <div class="mb-3">
                <label for="harga-jual" class="form-label">Harga Jual</label>
                <input type="number" class="form-control" id="harga-jual" name="harga_jual">
            </div>
            <div class="mb-3">
                <label for="harga-produksi" class="form-label">Harga Produksi</label>
                <input type="number" class="form-control" id="harga-produksi" name="harga_produksi">
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori Produk</label>
                <select class="form-select h5 p-3" id="kategori" name="kategori">
                    <option selected disabled>-- Pilih Kategori --</option>
                    @foreach ($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="supplier" class="form-label">Supplier Produk</label>
                <select class="form-select h5 p-3" id="supplier" name="supplier">
                    <option selected disabled>-- Pilih Supplier --</option>
                    @foreach ($suppliers as $s)
                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image Link</label>
                <input type="text" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection