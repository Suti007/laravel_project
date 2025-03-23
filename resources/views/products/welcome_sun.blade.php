<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    {{-- <h1>Sutthichart Ecommerce</h1> --}}
    <main class="mt-6">
        <div class="container mx-auto">
            <div class="hero-section bg-cover-bg-center h-screen flex items-center justify-center text-white"
                style="height: 200px;background-image: url('{{asset('images/banner.jpg')}}');">

                <div class="bg-red bg-opacity-50 p-8 rounded text-center">
                    <h1 class="text-5xl font-bold mb-4">Welcome to our Ecommerce store</h1>
                    <p class="text-2xl mb-6">We have great design</p>
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 roounded"
                        href={{route('post.welcome')}}>Show Now</a>


                </div>
            </div>
            <div class="mt-8">

                <div class="grid grid-cols-4 sm:grid-cols-2 lg:grid-cols-3 gap-2">
                    @foreach ($posts as $post)
                        <div class="bg-white border rounded-lg p-4 flex flex-col items-center">
                            <img style="width:150px" src="{{asset('uploads/images/' . $post->image)}}"
                                alt="{{$post->name}}">
                            <h5>{{$post->name}}</h5>
                            {{-- <a href="/product/{{$product->id}}"> --}}


                                <p class="text-gray-700">{{$post->qty}}</p>
                                <p class="text-gray-900">{{$post->price}}</p>
                                <p class="text-red">{{$post->description}}</p>
                                <a href="{{route('product.detail', ['id' => $post->id])}}">
                                    View Product
                                </a>

                    @endforeach
                    </div>
                </div>
                <h2>Featured Categories</h2>
                <div class="grid grid-cols-1 gap-6">
                    @foreach ($categories as $category)
                        <h5>{{$category->name}}</h5>
                        {{-- <a href="/product/{{$product->id}}"> --}}



                            <p>{{$category->description}}</p>
                            {{-- <a href="{{route('product.detail', ['id' => $product->id])}}">
                                View Product
                            </a> --}}
                    @endforeach

                </div>
            </div>
        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>