@extends('layouts.conquer2')

@section('content')
    <div id="container-fluid">
        <h2 style="margin-bottom: 3%">Daftar Supplier</h2>

        <ul class="breadcrumb">
            <li class="breadcrumb-item mb-4">
                <i class="fa fa-home"></i>
                <a href="/">Dashboard</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('supplier.index') }}">Supplier</a></li>
        </ul>

		<table class="table">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Nama Supplier</th>
					<th scope="col">Alamat Supplier</th>
				</tr>
			</thead>

			<tbody>
				@foreach($supplier as $s)
				<tr>
					<th scope="row">{{ $s->id }}</th>
					<td>{{ $s->name }}</td>
					<td>{{ $s->address }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

    <script>
        let element = document.querySelector('.supplier');
        element.classList.add('active');
    </script>
@endsection