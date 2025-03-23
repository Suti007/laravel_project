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
        @if ($message = Session::get('success_messge'))
            {{-- <div class="bg-green-500 text-red-500 p4 mb-4">
                {{$message}}
            </div> --}}
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert"></button>
                {{$message}}
            </div>
        @endif
        @if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </header>
    {{-- <div class="container mx-auto mt-8"> --}}
        <div style="padding: 100px;">
            <div class="container col-md-4">
                {{-- <div class="container col-sm-5"> --}}

                    <h1>Check out</h1>
                    <form action="#" method="POST" id="checkout_form">
                        @csrf
                        <div class="mb-4">
                            <label for="shipping_address">Shipping Address</label>
                            <input type="text" name="shipping_address" id="shipping_address">
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
                    </form>

                    <div class="card mt-5">
                        <div class="card-header">
                            <h4>Make Payment</h4>
                        </div>
                        <div class="card-body">
                            <div class="p-3 bg-light bg-opacity-10">
                                <h6 class="card-title mb-3">Order Summary</h6>
                                {{-- <ul> --}}
                                    @foreach ($cartItems as $cartItem)

                                        <div class="d-flex justify-content-between mb-1 small">
                                            <span><img height="50" width="50" class="img-responsive"
                                                    src="{{asset('uploads/images/' . $cartItem->post->image)}}"
                                                    alt="{{$cartItem->post->name}}">
                                                {{$cartItem->post->name}} x
                                                {{$cartItem->quantiy}}</span><span
                                                class="mt-3">${{$cartItem->post->price * $cartItem->quantiy}}</span>
                                        </div>

                                        {{-- <li class="card-title mb-2">{{$cartItem->post->name}} x
                                            {{$cartItem->quantiy}}
                                            -
                                            ${{$cartItem->post->price * $cartItem->quantiy}}</li> --}}

                                    @endforeach
                                    {{--
                                </ul> --}}
                                <div class="d-flex justify-content-between mb-1 small">
                                    <span><strong>Subtotal: </strong></span><span><strong> ${{$cartItems->sum(function ($item) {
    return $item->post->price * $item->quantiy; })}}</strong></span>
                                </div>
                                <div class="d-flex justify-content-between mb-1 small">
                                    <span>Shipping:</span><span>$20.00</span>
                                </div>
                                @if (session()->has('coupom'))
                                    <div class="d-flex justify-content-between mb-1 small">
                                        <span>Coupon(Code: NEWYEAR):({{session()->get('coupom')['name']}});
                                            <form action="{{route('coupom.destroy')}}" method="POST" style="display:inline">
                                                {{csrf_field()}}
                                                {{method_field('delete')}}
                                                <button type="sumit" style="font-size: 14px">Remove</button>
                                            </form>
                                        </span>

                                        <span class="text-danger ml-20">-${{$discount}}</span>
                                    </div>
                                @endif

                                <hr>
                                <div class="d-flex justify-content-between mb-1 small">
                                    <span><strong>New Subtotal: </strong></span><span><strong>
                                            ${{$newSubtotal}}</strong></span>
                                </div>
                                <div class="d-flex justify-content-between mb-1 small">
                                    <span>Tax(13%): </span><span>{{$newTax}}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-4 small">
                                    <span>
                                        <strong>Total:</strong>
                                    </span><strong class="text-dark">${{$newTotal}}</strong>
                                </div>
                            </div>
                            @if (!session()->has('coupom'))
                                {{-- <a href="#" class="have-code">Have a Code?</a> --}}
                                <div class="have-code-container">
                                    <form action="{{route('coupom.store')}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="text" name="coupom_code" id="coupom_code">
                                        <button type="submit" class="button button-plain">Apply</button>
                                    </form>
                                </div> <!-- end have-code-container -->
                            @endif

                            <div class="mb-4">
                                <label for="card-element">Credit or Debit Card:</label>
                                {{-- <div id="card-element">

                                </div> --}}
                                <form method="POST" action="{{route('checkout.payment', $newTotal)}}" id="stripe-form">
                                    @csrf
                                    <input type="hidden" name="price" value="200">
                                    <input type="hidden" name="stripeToken" id="stripe-token">
                                    <div id="card-element" class="form-control"></div>
                                    <button class="btn btn-primary w-100 mt-2" type="button" onclick="createToken()">
                                        Submit Payment
                                    </button>
                                </form>

                            </div>

                        </div>
                    </div>

                    {{--
                </div> --}}
            </div>
</body>
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
    var stripe = Stripe('{{env("STRIPE_KEY")}}');

    var elements = stripe.elements();
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');

    function createToken() {
        stripe.createToken(cardElement).then(function (result) {
            console.log(result);
            if (result.token) {
                document.getElementById("stripe-token").value = result.token.id;
                document.getElementById("stripe-form").submit();
            }
        })
    }
</script>

</html>