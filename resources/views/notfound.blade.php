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
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }
        
        .container {
            display: flex;
            flex-direction: column;
            width: 100vw;
            height: 100vh;
            align-items: center;
            justify-content: center;
        }

        .text{
            font-size: 24px;
        }

        .link {
            margin-top: 50px;
            transition: 0.4s;
        }

        .link > a {
            text-decoration: none;
            background: #EEEEEE;
            padding: 16px 24px;
            border-radius: 5px;
            color: #444444;
            font-weight: bold;
        }

        .link:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text">Oops, puding ini tidak tersedia di Pudding Store</div>
        <div class="link"><a href="{{ route('menu') }}">Back to menu</a></div>
    </div>
</body>
</html>