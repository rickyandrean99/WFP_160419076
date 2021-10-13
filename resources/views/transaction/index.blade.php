@extends('layouts.conquer2')

@section('ajaxquery')
    <script>
        const getDetailData = (id) => {
            $.ajax({
                type: 'POST',
                url: '{{ route("transaction.showAjax") }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id
                },
                success: (data) => {
                    $('#msg').html(data.msg)
                }
            })
        }
    </script>
@endsection

@section('content')
    <div id="container-fluid">
        <h2 style="margin-bottom: 3%">Daftar Transaction</h2>

        <ul class="breadcrumb">
            <li class="breadcrumb-item mb-4">
                <i class="fa fa-home"></i>
                <a href="/">Dashboard</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('transaction.index') }}">Transaction</a></li>
        </ul>

		<table class="table">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Pembeli</th>
					<th scope="col">Kasir</th>
					<th scope="col">Tanggal Transaction</th>
					<th scope="col">Action</th>
				</tr>
			</thead>

			<tbody>
				@foreach($transaction as $t)
				<tr>
					<th scope="row">{{ $t->id }}</th>
					<td>{{ $t->customer->nama }}</td>
					<td>{{ $t->user->name }}</td>
					<td>{{ $t->transaction_date }}</td>
					<td>
                        <a class="btn btn-default" data-toggle="modal" href="#basic" onclick="getDetailData({{ $t->id }})">Lihat Rincian Pembelian</a>
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
                    <h4 class="modal-title">Detail Transaction</h4>
                </div>

                <div class="modal-body" id="msg">
                    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let element = document.querySelector('.transaction')
        element.classList.add('active')
    </script>
@endsection