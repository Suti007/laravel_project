<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{--
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CSS Grid Example</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}"> --}}
    {{-- ข้างบนนี้ทำได้แล้ว --}}
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

    <title>Sixteen Clothing HTML Template</title>
    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-sixteen.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    {{--
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}"> --}}

</head>

<body>

    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <h2>Sutthichart <em>Fruits</em></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('post.welcome')}}">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="products.html">Our Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About Uss</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact Uss</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cart.index')}}">
                                <i class="fas fa-shopping-cart"></i>
                                Cart[{{$count}}]</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard')}}">Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @if ($message = Session::get('success'))
            {{-- <div class="bg-green-500 text-red-500 p4 mb-4">
                {{$message}}
            </div> --}}
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert"></button>
                {{$message}}
            </div>
        @endif

    </header>


    <!-- ***** Preloader Start ***** -->
    {{-- <div class="banner header-text">
        <div class="owl-banner owl-carousel">
            <div class="banner-item-01">
                <div class="text-content">
                    <h4>Best Offer</h4>
                    <h2>New Arrivals On Sale</h2>
                </div>
            </div>
            <div class="banner-item-02">
                <div class="text-content">
                    <h4>Flash Deals</h4>
                    <h2>Get your best products</h2>
                </div>
            </div>
            <div class="banner-item-03">
                <div class="text-content">
                    <h4>Last Minute</h4>
                    <h2>Grab last minute deals</h2>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Page Content -->
    <!-- Banner Starts Here -->

    <div style="padding: 100px;">
        {{-- <table class="table table-hover">
            <thead>
                <th style="width:20%">Product</th>
                <th style="width:10%">Quantity</th>
                <th style="width:10%">Price</th>
                <th style="width:10%">Total</th>
                <th style="width:10%">Actiions</th>
            </thead>

        </table> --}}
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <img class="detail_img" src="{{asset('uploads/images/' . $post->image)}}" alt="{{$post->name}}">
                </div>
                <div class="col-sm-6">
                    <a href="{{route('post.welcome')}}">Go Back</a>
                    <h2>{{$post->name}}</h2>
                    <br><br>
                    <h3>Price: {{$post->price}}</h3>
                    <br>
                    <h3>Products in Stock: {{$post->qty}}</h3>
                    <br>
                    <p><strong>Description:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque
                        corporis amet elite
                        author nulla.</p>
                    <br><br>
                    <div class="row">
                        <div class="col-sm-6">

                            <form action="{{route('cart.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                        {{-- <input type="hidden" name="post_image" value="{{$post->image}}"> --}}
                                        <input type="number" value="1" min="1" class="form-control" style="width:100px"
                                            name="quantiy">
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="btn btn-primary" type="submit" value="Add Cart">
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-sm-4">

                            <button class="btn btn-success">Buy Now</button>
                        </div>

                    </div>



                </div>
            </div>
        </div>

    </div>

</body>

</html>