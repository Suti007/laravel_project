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

    <div id="teams" class="py-3">

        <div class="hero-section bg-cover-bg-center h-screen flex items-center justify-center text-white"
            style="height: 200px;background-image: url('{{asset('images/banner.jpg')}}');">

            <div class="bg-red bg-opacity-50 p-8 rounded text-center">
                <h1 class="text-5xl font-bold mb-4">Welcome to our Ecommerce store</h1>
                <p class="text-2xl mb-6">We have great design</p>
                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 roounded"
                    href={{route('post.welcome')}}>Show Now</a>


            </div>
        </div>
        <div class="container py-3">
            <div class="row row-cols-4 gap-0">

                <div class="col">
                    <div class="card pr-3" style="width: 10rem;">
                        <img class="card-img-top" src="{{asset('uploads/images/1739543684.jpg')}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">White T-shrit</h5>
                            {{-- <a href="/product/{{$product->id}}"> --}}


                                <p class="card-text mb-1">500 pieces</p>
                                <p class="card-text mb-1">250 baht</p>
                                <p class="card-text">White T-shrit beautiful and soft</p>
                                {{-- <a href="{{route('product.detail')}}">
                                    View Product
                                </a> --}}
                        </div>
                    </div>

                </div>
                <div class="col">
                    <div class="card" style="width: 10rem;">
                        <img class="card-img-top" src="{{asset('uploads/images/1739543684.jpg')}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">White T-shrit</h5>
                            {{-- <a href="/product/{{$product->id}}"> --}}


                                <p class="card-text mb-1">500 pieces</p>
                                <p class="card-text mb-1">250 baht</p>
                                <p class="card-text">White T-shrit beautiful and soft</p>
                                {{-- <a href="{{route('product.detail')}}">
                                    View Product
                                </a> --}}
                        </div>
                    </div>

                </div>
                <div class="col">
                    <div class="card" style="width: 10rem;">
                        <img class="card-img-top" src="{{asset('uploads/images/1739543684.jpg')}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">White T-shrit</h5>
                            {{-- <a href="/product/{{$product->id}}"> --}}


                                <p class="card-text mb-1">500 pieces</p>
                                <p class="card-text mb-1">250 baht</p>
                                <p class="card-text">White T-shrit beautiful and soft</p>
                                {{-- <a href="{{route('product.detail')}}">
                                    View Product
                                </a> --}}
                        </div>
                    </div>

                </div>
                <div class="col">
                    <div class="card" style="width: 10rem;">
                        <img class="card-img-top" src="{{asset('uploads/images/1739543684.jpg')}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">White T-shrit</h5>
                            {{-- <a href="/product/{{$product->id}}"> --}}


                                <p class="card-text mb-1">500 pieces</p>
                                <p class="card-text mb-1">250 baht</p>
                                <p class="card-text">White T-shrit beautiful and soft</p>
                                {{-- <a href="{{route('product.detail')}}">
                                    View Product
                                </a> --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>