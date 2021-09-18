@extends('layouts.conquer2')

@section('content')
    <div class="container-fluid">
        <h2 style="margin-bottom: 3%">Daftar Kategori</h2>

        <ul class="breadcrumb">
            <li class="breadcrumb-item mb-4">
                <i class="fa fa-home"></i>
                <a href="/">Dashboard</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
        </ul>

		<table class="table">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Nama Kategori</th>
				</tr>
			</thead>

			<tbody>
				@foreach($category as $c)
				<tr>
					<th scope="row">{{ $c->id }}</th>
					<td>{{ $c->nama }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

    <script>
        let element = document.querySelector('.category');
        element.classList.add('active');
    </script>
@endsection