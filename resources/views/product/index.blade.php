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

@section('ajaxquery')
    <script>
        const getEditForm = id => {
            $.ajax({
                type: 'POST',
                url: '{{ route("product.getEditForm") }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id
                },
                success: data => {
                    $('#modalContent').html(data.msg)
                }
            })
        }

        const getEditForm2 = id => {
            $.ajax({
                type: 'POST',
                url: '{{ route("product.getEditForm2") }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id
                },
                success: data => {
                    $('#modalContent').html(data.msg)
                }
            })
        }

        const saveDataUpdateTD = id => {
            let enama = $('#enama').val()
            let estok = $('#estok').val()
            let eharga_jual = $('#eharga_jual').val()
            let eharga_produksi = $('#eharga_produksi').val()
            let ekategori = $('#ekategori').val()
            let esupplier = $('#esupplier').val()
            let eimage = $('#eimage').val()

            let kategoriText = $('#ekategori :selected').text()
            let supplierText = $('#esupplier :selected').text()

            $.ajax({
                type: 'POST',
                url: '{{ route("product.saveData") }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id,
                    'nama': enama,
                    'stok': estok,
                    'harga_jual': eharga_jual,
                    'harga_produksi': eharga_produksi,
                    'category_id': ekategori,
                    'supplier_id': esupplier,
                    'image': eimage
                },
                success: data => {
                    if (data.status == 'ok') {
                        alert(data.msg)

                        $(`#td_nama_${id}`).html(enama)
                        $(`#td_stok_${id}`).html(estok)
                        $(`#td_hjual_${id}`).html(eharga_jual)
                        $(`#td_hproduksi_${id}`).html(eharga_produksi)
                        $(`#td_kategori_${id}`).html(kategoriText)
                        $(`#td_supplier_${id}`).html(supplierText)
                        $(`#td_image_${id}`).html(eimage)
                    }
                }
            })
        }

        const deleteDataRemoveTR = id => {
            $.ajax({
                type: 'POST',
                url: '{{ route("product.deleteData") }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id
                },
                success: data => {
                    alert(data.msg)
                    
                    if (data.status == 'ok')
                        $(`#tr_${id}`).remove()
                }
            })
        }
    </script>
@endsection

@section('content')
    <div class="container-fluid">
        <h2 style="margin-bottom: 3%">Daftar Produk</h2>

        <ul class="breadcrumb" style="position: relative">
            <li class="breadcrumb-item mb-4">
                <i class="fa fa-home"></i>
                <a href="/">Dashboard</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
            <a href="product/create" class="btn btn-primary" style="position: absolute; right: 210px; top: 0">Tambah Produk</a>
            <a class="btn btn-primary" data-toggle="modal" href="#modalCreate" style="position: absolute; right: 0; top: 0">+ Tambah Produk (Modal)</a>
        </ul>

        @if (session('status'))
            <div class="alert alert-success my-2">{{ session('status') }}</div>
        @endif

		<!-- <div class="row">
            @foreach($products as $p)
				<div class="pudding-wrapper">
                    <a href="/product/{{ $p->id }}" style="text-decoration: none">
                        <img class="pudding-image" src="{{ asset('img/'.$p->image) }}">
                        <div class="pudding-text">{{ $p->nama }}&nbsp;&nbsp;Rp. {{ $p->harga_jual }}</div>
                    </a>
				</div>
            @endforeach
        </div> -->

        <table class="table">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Nama Produk</th>
					<th scope="col">Stok Produk</th>
					<th scope="col">Harga Jual</th>
					<th scope="col">Harga Produksi</th>
					<th scope="col">Kategori</th>
					<th scope="col">Supplier</th>
					<th scope="col">Gambar Produk</th>
					<th scope="col">Action</th>
				</tr>
			</thead>

			<tbody>
                @foreach($products as $p)
                    <tr id="tr_{{ $p->id }}">
                        <td id="td_id_{{ $p->id }}">{{ $p->id }}</td>
                        <td id="td_nama_{{ $p->id }}">{{ $p->nama }}</td>
                        <td id="td_stok_{{ $p->id }}">{{ $p->stok }}</td>
                        <td id="td_hjual_{{ $p->id }}">{{ $p->harga_jual }}</td>
                        <td id="td_hproduksi_{{ $p->id }}">{{ $p->harga_produksi }}</td>
                        <td id="td_kategori_{{ $p->id }}">{{ $p->category->nama }}</td>
                        <td id="td_supplier_{{ $p->id }}">{{ $p->supplier->name }}</td>
                        <td id="td_image_{{ $p->id }}">{{ $p->image }}</td>
                        <td>
                            <a class="btn btn-warning" data-toggle="modal" href="#modalEdit" onclick="getEditForm({{ $p->id }})">Edit with Ajax</a>
                            <a class="btn btn-warning" data-toggle="modal" href="#modalEdit" onclick="getEditForm2({{ $p->id }})">Edit with Ajax 2</a>
                            <a href="#" class="btn btn-danger" onclick="if(confirm('are you sure to delete this record?')) deleteDataRemoveTR({{ $p->id }})">Delete 2</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
	</div>

    <!-- Modal Add Product -->
    <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" >
                <form action="{{ route('product.store') }}" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add New Product</h4>
                    </div>

                    <div class="modal-body">
                        @csrf
                        <div class="form-body">
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="form-group">
                                <label>Stok Produk</label>
                                <input type="number" class="form-control" id="stok" name="stok">
                            </div>
                            <div class="form-group">
                                <label>Harga Jual Produk</label>
                                <input type="number" class="form-control" id="harga-jual" name="harga_jual">
                            </div>
                            <div class="form-group">
                                <label>Harga Produksi Produk</label>
                                <input type="number" class="form-control" id="harga-produksi" name="harga_produksi">
                            </div>
                            <div class="form-group">
                                <label>Kategori Produk</label>
                                <select class="form-control" name="kategori" id="kategori">
                                    <option disabled selected>-- Pilih Kategori --</option>
                                    @foreach ($categories as $c)
                                        <option value="{{ $c->id }}">{{ $c->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Supplier Produk</label>
                                <select class="form-control" name="supplier" id="supplier">
                                    <option disabled selected>-- Pilih Supplier --</option>
                                    @foreach ($suppliers as $s)
                                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Gambar Produk</label>
                                <input type="text" class="form-control" id="image" name="image">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <a class="btn btn-default" data-dismiss="modal">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Supplier -->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modalContent">

            </div>
        </div>
    </div>

    <script>
        let element = document.querySelector('.product');
        element.classList.add('active');
    </script>
@endsection