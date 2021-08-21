<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pudding Store</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0
        }
        
        .container {
            padding: 30px;
            max-width: 70vw;
            margin: auto
        }

        .title {
            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-size: 2rem;
            font-weight: bold
        }

        .pudding-list {
            padding: 30px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .pudding-item-wrapper {
            padding: 30px 20px;
            flex: 0 0 25% !important;
            max-width: 25% !important;
        }

        @media screen and (max-width: 1300px) {
            .container {
                max-width: 100vw;
            }
        }

        .pudding-item {
            transition: 0.4s;
            position: relative;
        }

        .pudding-item:hover {
            transform: scale(1.03);
            cursor: pointer;
        }

        .pudding-item:hover .text-image {
            opacity: 1;
        }

        .pudding-item:hover .overlay {
            opacity: 0.3;
        }

        .pudding-image {
            transition: 0.5s;
        }

        .text-image {
            opacity: 0;
            transition: 0.5s;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            line-height: 100%;
            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-size: 1.2rem;
            font-weight: bold;
            color: white;
            z-index: 999;
            line-height: 1.8rem;
        }

        .overlay {
            width: 100%;
            height: 98%;
            position: absolute;
            background-color: #000;
            opacity: 0;
            top: 0;
            border-radius: 5px;
            transition: 0.5s;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="title">Pudding List</div>
        <div class="pudding-list">
            @foreach ($pudding as $p)
                <div class="pudding-item-wrapper">
                    <div class="pudding-item">
                        <a style="color: white; text-decoration: none; font-size: 18px;" href="/menu/pudding/{{ str_replace(' ', '-', strtolower($p)) }}">
                            <img src="{{ asset('img/'.str_replace(' ', '_', strtolower($p)).'.jpg') }}" alt="{{ $p }}" style="width: 100%; border-radius: 5px;" class="pudding-image">
                            <div class="text-image">{{ $p }} Pudding</div>
                            <div class="overlay"></div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>