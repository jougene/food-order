<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Food order</title>

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container-fluid ">
            <ul>
                @foreach ($orders as $order)
                    <li>{{ $order->username }} - {{ $order->address }} - {{ $order->phone }}</li>
                @endforeach
            </ul>
            {{-- TO DO SHOW ORDERS --}}
        </div>
    </body>
</html>
