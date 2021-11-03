<form action="{{ route('supplier.update', $data->id) }}" method="post">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Edit Supplier</h4>
    </div>
    <div class="modal-body">
            @csrf
            @method('PUT')
            <div class="form-body">
                <div class="form-group">
                    <label>Nama Supplier</label>
                    <input type="text" class="form-control" id="eNama" name="nama" value="{{ $data->name }}">
                </div>
                <div class="form-group">
                    <label>Alamat Supplier</label>
                    <input type="text" class="form-control" id="eAlamat" name="alamat" value="{{ $data->address }}">
                </div>
            </div>
    </div>
    <div class="modal-footer">
        <!-- <div class="form-actions"> -->
            <button type="button" class="btn btn-info" data-dismiss="modal" onclick="saveDataUpdateTD({{ $data->id }})">Submit</button>
            <a href="{{ url('suppliers') }}" class="btn btn-default" data-dismiss="modal">Cancel</a>
        <!-- </div> -->
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
    </div>
</form>