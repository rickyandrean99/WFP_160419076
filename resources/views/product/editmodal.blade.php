<form action="{{ route('product.update', $data->id) }}" method="post">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Edit Produk</h4>
    </div>
    <div class="modal-body">
            @csrf
            @method('PUT')
            <div class="form-body">
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}">
                </div>
                <div class="form-group">
                    <label>Stok Produk</label>
                    <input type="text" class="form-control" id="stok" name="stok" value="{{ $data->stok }}">
                </div>
                <div class="form-group">
                    <label>Harga Jual</label>
                    <input type="text" class="form-control" id="harga_jual" name="harga_jual" value="{{ $data->harga_jual }}">
                </div>
                <div class="form-group">
                    <label>Harga Produksi</label>
                    <input type="text" class="form-control" id="harga_produksi" name="harga_produksi" value="{{ $data->harga_produksi }}">
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="kategori" id="kategori">
                        @foreach ($categories as $c)
                            @php $status = ""; @endphp
                            @if ($c->id == $data->category_id)
                                @php $status = "selected"; @endphp
                            @endif

                            <option value="{{ $c->id }}" {{ $status }}>{{ $c->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Supplier</label>
                    <select class="form-control" name="supplier" id="supplier">
                        @foreach ($suppliers as $s)
                            @php $status = ""; @endphp
                            @if ($s->id == $data->supplier_id)
                                @php $status = "selected"; @endphp
                            @endif

                            <option value="{{ $s->id }}" {{ $status }}>{{ $s->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Gambar Produk</label>
                    <input type="text" class="form-control" id="image" name="image" value="{{ $data->image }}">
                </div>
            </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-info">Submit</button>
        <a class="btn btn-default" data-dismiss="modal">Cancel</a>
    </div>
</form>