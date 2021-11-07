<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Edit Produk</h4>
</div>

<div class="modal-body">
    <div class="form-body">
        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" class="form-control" id="enama" name="nama" value="{{ $data->nama }}">
        </div>
        <div class="form-group">
            <label>Stok Produk</label>
            <input type="text" class="form-control" id="estok" name="stok" value="{{ $data->stok }}">
        </div>
        <div class="form-group">
            <label>Harga Jual</label>
            <input type="text" class="form-control" id="eharga_jual" name="harga_jual" value="{{ $data->harga_jual }}">
        </div>
        <div class="form-group">
            <label>Harga Produksi</label>
            <input type="text" class="form-control" id="eharga_produksi" name="harga_produksi" value="{{ $data->harga_produksi }}">
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <select class="form-control" name="kategori" id="ekategori">
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
            <select class="form-control" name="supplier" id="esupplier">
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
            <input type="text" class="form-control" id="eimage" name="image" value="{{ $data->image }}">
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-info" data-dismiss="modal" onclick="saveDataUpdateTD({{ $data->id }})">Submit</button>
    <a class="btn btn-default" data-dismiss="modal">Cancel</a>
</div>