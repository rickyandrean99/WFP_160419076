@extends('layouts.conquer2')

@section('ajaxquery')
    <script>
        const getDetailData = (id) => {
            $.ajax({
                type: 'POST',
                url: '{{ route("suppliers.showAjax") }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id
                },
                success: (data) => {
                    $('#msg').html(data.message)
                }
            })
        }

        const getEditForm = id => {
            $.ajax({
                type: 'POST',
                url: '{{ route("supplier.getEditForm") }}',
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
                url: '{{ route("supplier.getEditForm2") }}',
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
            let eName = $('#eNama').val()
            let eAddress = $('#eAlamat').val()

            $.ajax({
                type: 'POST',
                url: '{{ route("supplier.saveData") }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id,
                    'name': eName,
                    'address': eAddress
                },
                success: data => {
                    if (data.status == 'ok') {
                        alert(data.msg)

                        $(`#td_name_${id}`).html(eName)
                        $(`#td_address_${id}`).html(eAddress)
                    }
                }
            })
        }

        const deleteDataRemoveTR = id => {
            $.ajax({
                type: 'POST',
                url: '{{ route("supplier.deleteData") }}',
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
    <div id="container-fluid">
        <h2 style="margin-bottom: 3%">Daftar Supplier</h2>

        <ul class="breadcrumb mb-4" style="position: relative">
            <li class="breadcrumb-item">
                <i class="fa fa-home"></i>
                <a href="/">Dashboard</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('supplier.index') }}">Supplier</a></li>
            <a href="supplier/create" class="btn btn-primary" style="position: absolute; right: 210px; top: 0">+ Tambah Supplier</a>
            <a class="btn btn-primary" data-toggle="modal" href="#modalCreate" style="position: absolute; right: 0; top: 0">+ Tambah Supplier (Modal)</a>
        </ul>

        @if (session('status'))
            <div class="alert alert-success my-2">{{ session('status') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger my-2">{{ session('error') }}</div>
        @endif
        
		<table class="table">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Nama Supplier</th>
					<th scope="col">Alamat Supplier</th>
					<th scope="col">Action</th>
				</tr>
			</thead>

			<tbody>
				@foreach($supplier as $s)
				<tr id="tr_{{ $s->id }}">
					<th scope="row">{{ $s->id }}</th>
					<td id="td_name_{{ $s->id }}">{{ $s->name }}</td>
					<td id="td_address_{{ $s->id }}">{{ $s->address }}</td>
					<td>
                        <a href="{{ route('supplier.show', $s->id) }}" class="btn btn-default" data-target="#mymodal" data-toggle="modal">Show</a>
                        <a class="btn btn-default" data-toggle="modal" href="#basic" onclick="getDetailData({{ $s->id }})">Show w/ Ajax</a>
                        <a class="btn btn-default" href="{{ route('supplier.edit', $s->id) }}">Edit</a>
                        <a class="btn btn-warning" data-toggle="modal" href="#modalEdit" onclick="getEditForm({{ $s->id }})">Edit with Ajax</a>
                        <a class="btn btn-warning" data-toggle="modal" href="#modalEdit" onclick="getEditForm2({{ $s->id }})">Edit with Ajax 2</a>
                        <form action="{{ route('supplier.destroy', $s->id) }}" method="post" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Delete" onclick="if(!confirm('Apakah mau dihapus?')) { return false; }">
                        </form>
                        <a href="#" class="btn btn-danger" onclick="if(confirm('are you sure to delete this record?')) deleteDataRemoveTR({{ $s->id }})">Delete 2</a>
                    </td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

    <!-- Modal -->
    <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog" style="width: 60%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Detail Supplier</h4>
                </div>

                <div class="modal-body" id="msg">
                    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-info">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add Supplier -->
    <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" >
                <form action="{{ route('supplier.store') }}" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add New Supplier</h4>
                    </div>
                    <div class="modal-body">
                        <!-- Content -->
                        
                            @csrf
                            <div class="form-body">
                                <div class="form-group">
                                    <label>Nama Supplier</label>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>
                                <div class="form-group">
                                    <label>Alamat Supplier</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <div class="form-actions"> -->
                            <button type="submit" class="btn btn-info">Submit</button>
                            <a href="{{ url('suppliers') }}" class="btn btn-default" data-dismiss="modal">Cancel</a>
                        <!-- </div> -->
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
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
        let element = document.querySelector('.supplier')
        element.classList.add('active')

        const showInfo = () => {
            $.ajax({
                type: 'POST',
                url: '{{ route("suppliers.showinfo") }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>'
                },
                success: (data) => {
                    alert(data.status)
                }
            })
        }
    </script>
@endsection