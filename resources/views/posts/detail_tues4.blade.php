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
    <div class="container mx-auto">
        <h2>Product Details</h2>
        <div class="h-screen flex items-center justify-center">
            <img style="width:350px" src="{{asset('uploads/images/' . $post->image)}}" alt="{{$post->name}}">

            <h5>{{$post->name}}</h5>


            <p>{{$post->qty}}</p>
            <p>{{$post->price}}</p>
            <p>{{$post->description}}</p>

            <form action="{{route('cart.store')}}" method="POST">
                @csrf
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <input type="number" name="quantiy" value="1" min="1">
                <button type="submit">Add to Cart</button>
            </form>

            <a href="{{route('post.welcome')}}">View All Products</a>
        </div>
    </div>
</body>

</html>