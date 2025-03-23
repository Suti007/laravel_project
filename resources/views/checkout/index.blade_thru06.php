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
                    <h2>Sixteen <em>Clothing</em></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Home
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
    {{-- <div class="container mx-auto mt-8"> --}}
        <div class="container col-md-4">
            <h1>Check out</h1>
            <form action="{{route('checkout.process')}}" method="POST" id="check_form">
                @csrf
                <div class="mb-4">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address">
                </div>
                <div class="mb-4">
                    <label for="city">City</label>
                    <input type="text" name="city" id="city">
                </div>
                <div class="mb-4">
                    <label for="state">State</label>
                    <input type="text" name="state" id="state">
                </div>
                <div class="mb-4">
                    <label for="postal_code">Postal Code</label>
                    <input type="text" name="postal_code" id="postal_code">
                </div>
                <div class="mb-4">
                    <label for="country">Country</label>
                    <input type="text" name="country" id="country">
                </div>

                <div class="card-header">
                    <h2>Order Summary</h2>
                    <ul>
                        @foreach ($cartItems as $cartItem)

                            <li class="card-title mb-2">{{$cartItem->post->name}} x {{$cartItem->quantiy}} -
                                ${{$cartItem->post->price * $cartItem->quantiy}}</li>

                        @endforeach
                    </ul>
                    <div class="d-flex justify-content-between mb-1 small">
                        <span><strong>Subtotal: ${{$cartItems->sum(function ($item) {
    return $item->post->price * $item->quantiy; })}}</strong></span>
                    </div>
                    <div class="d-flex justify-content_between mb-1 small">
                        <span>Shipping: $</span><span>20.00</span>
                    </div>
                    <div class="d-flex justify-content_between mb-1 small">
                        <span>Coupon(Code: NEWYEAR): $</span><span class="text-danger ml-20">10.00</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content_between mb-4 small">
                        <span>TOTAL: $</span><strong class="text-dark">1000.00</strong>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="card-element">Credit or Debit Card:</label>
                    <div id="card-element">

                    </div>
                    <button type="submit">
                        Submit Payment
                    </button>
                </div>
            </form>
        </div>
</body>
<script src="https://js.stripe.com/v3/"></script>

</html>