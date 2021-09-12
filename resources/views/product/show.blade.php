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
		<h2>Product Detail</h2>
        <table class="table" border="1">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Hasil</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>ID</td>
                    <td>{{ $data->id }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>{{ $data->nama }}</td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>{{ $data->harga_jual }}</td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>{{ $data->category->nama }}</td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $data->created_at }}</td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $data->updated_at }}</td>
                </tr>
            </tbody>
        </table>
	</div>
</body>
</html>