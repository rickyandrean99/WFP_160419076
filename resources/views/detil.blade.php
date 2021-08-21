<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin: 0;
            padding: 0
        }

        .container {
            padding: 30px;
            max-width: 70vw;
            margin: auto;
            height: 100vh;
        }

        .box {
            padding: 30px;
            box-shadow: 0px 0px 10px 2px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="box">
            <div style="font-size: 24px; font-weight: bold; color: #444444">{{ $jenis }} Pudding</div>
            <img src="{{ asset('img/'.str_replace(' ', '_', strtolower($jenis)).'.jpg') }}" alt="{{ $jenis }}" style="width: 35%; border-radius: 5px; margin: 30px 0">
            <div style="font-size: 18px; color: #444444">{{ $deskripsi }}</div>
        </div>
    </div>
</body>
</html>