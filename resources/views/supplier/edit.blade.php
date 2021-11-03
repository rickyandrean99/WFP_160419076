@extends('layouts.conquer2')

<!-- Bootstrap Resource -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@section('content')
    <div id="container-fluid">
        <h2 style="margin-bottom: 2%">Edit Supplier</h2>

        <ul class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <i class="fa fa-home"></i>
                <a href="/">Dashboard</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('supplier.index') }}">Supplier</a></li>
            <li class="breadcrumb-item">Edit</li>
        </ul>

        <form action="{{ route('supplier.update', $supplier->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Supplier</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $supplier->name }}">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Supplier</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $supplier->address }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection