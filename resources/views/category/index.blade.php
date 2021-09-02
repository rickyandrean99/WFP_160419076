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

		.pudding-image {
			max-width: 70%;
		}
	</style>
</head>
<body>
	<div id="container">
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
</body>
</html>