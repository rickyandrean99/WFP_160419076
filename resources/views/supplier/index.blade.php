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
            <a href="supplier/create" class="btn btn-primary" style="position: absolute; right: 0; top: 0">Tambah Supplier</a>
        </ul>

        <!-- <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Informasi Rinci Untuk Anda
                    <a class="btn btn-default" href="#" onclick="showInfo()">
                        Lihat Rincian Pesan
                    </a>
                </h3>
            </div>
            <div class="panel-body">
                
            </div>
        </div> -->

        @if (session('status'))
            <div class="alert alert-success my-2">{{ session('status') }}</div>
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
				<tr>
					<th scope="row">{{ $s->id }}</th>
					<td>{{ $s->name }}</td>
					<td>{{ $s->address }}</td>
					<td>
                        <a href="{{ route('supplier.show', $s->id) }}" class="btn btn-default" data-target="#mymodal" data-toggle="modal">Show</a>
                        <a class="btn btn-default" data-toggle="modal" href="#basic" onclick="getDetailData({{ $s->id }})">Show w/ Ajax</a>
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