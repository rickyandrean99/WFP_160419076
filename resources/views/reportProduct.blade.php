<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Produk</title>

	<!-- External Resource -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<!-- Internal Resource -->
	<style>
		#container {
			max-width: 70vw;
			margin:auto;
			padding-top: 50px;
		}
	</style>
</head>
<body>
	<div id="container">
        <h2>Product dengan kategori : {{ $category_name }}</h2>
        <p>Data ditemukan berjumlah {{ count($result) }} dari {{ $getTotalData }}</p>
		<table class="table">
			<thead>
				<tr>
                    <td>ID</td>
                    <td>Nama Produk</td>
                    <td>Harga Produk</td>
                    <td>Created At</td>
                    <td>Updated At</td>
                    <td>Category</td>
				</tr>
			</thead>

			<tbody>
				@foreach($result as $d)
				<tr>
					<td>{{ $d->id }}</td>
					<td>{{ $d->nama }}</td>
					<td>{{ $d->harga_jual }}</td>
					<td>{{ $d->created_at }}</td>
					<td>{{ $d->updated_at }}</td>
					<td>{{ $d->category->nama }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>