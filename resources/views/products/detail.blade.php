<html lang="{{ str_replace('_', '-', app()->getLocale())}}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    {{-- @vite('resources/css/app.css') --}}
</head>
{{-- <h1>Sutthichart Ecommerce</h1>
<p>Click the button below to view them</p>
<a href="/ninjas" class="btn">
    Sutthichart Ecommerce
</a> --}}

<body>
    <h1>Sutthichart Ecommerce</h1>
    <div class="mt-8">
        <h2>Product Details</h2>
        <div class="grid grid-cols-1 gap-6">


            <h5>{{$product->name}}</h5>


            <p>{{$product->qty}}</p>
            <p>{{$product->price}}</p>
            <p>{{$product->description}}</p>


        </div>
    </div>
</body>

</html>