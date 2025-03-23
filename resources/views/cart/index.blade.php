<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

    <title>Sixteen Clothing HTML Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
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
                            <a class="nav-link" href="about.html">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cart.index')}}">
                                <i class="fas fa-shopping-cart"></i>
                                Cart[{{$count}}]</a>
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
    <div style="padding: 100px;" align="center">
        <table class="table table-hover">
            <thead>
                <th style="width:20%">Product</th>
                <th style="width:10%">Quantity</th>
                <th style="width:10%">Price</th>
                <th style="width:10%">Total</th>
                <th style="width:10%">Actiions</th>
            </thead>
            <tbody>
                {{-- <tr style="background-color:gray">
                    <td style="padding: 10px; font-size: 20px;">Product Name</td>
                    <td style="padding: 10px; font-size: 20px;">Quantity</td>
                    <td style="padding: 10px; font-size: 20px;">Price</td>
                </tr> --}}
                @foreach ($cartItems as $cartItem)
                    <tr data-id="">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs">
                                    <img height="100" width="100" class="img-responsive"
                                        src="{{asset('uploads/images/' . $cartItem->post->image)}}"
                                        alt="{{$cartItem->post->name}}">
                                </div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{$cartItem->post->name}}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Quantity">
                            <form action="{{route('cart.update', $cartItem)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="number" style="width: 50px" name="quantiy" value="{{$cartItem->quantiy}}">
                                <button class="btn btn-primary type=" submit">Update</button>

                            </form>
                        </td>
                        <td data-th="Price">{{$cartItem->post->price}}</td>
                        <td data-th="Total">{{$cartItem->post->price * $cartItem->quantiy}}</td>
                        <td data-th="Action">
                            <form action="{{route('cart.destroy', $cartItem)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm remove-from-cart" type="submit">Remove</button>

                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-left">
                        <h3><strong>Total: ${{$cartItems->sum(function ($item) {
    return $item->post->price * $item->quantiy; })}}</strong></h3>

                    </td>
                </tr>
                <tr>
                    <td colspan="5" class="text-left">
                        <a href="{{route('post.welcome')}}" class="btn btn-warning"><i
                                class="fa fa-angle-left"></i>Continue Shopping</a>
                        <a href="{{route('checkout.show')}}"><button class="btn btn-success">Checkout</button></a>

                    </td>
                </tr>
            </tfoot>
            {{-- <p>Total: ${{$cartItems->sum(function ($item) {
                return $item->post->price * $item->quantiy; })}}</p> --}}
            {{-- <div class="mt-4">
                <a href="{{route('checkout.show')}}">Proceed to Checkout</a>
            </div> --}}
        </table>
    </div>



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language="text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t) {                   //declaring the array outside of the
            if (!cleared[t.id]) {                      // function makes it static and global
                cleared[t.id] = 1;  // you could use true and false, but that's more typing
                t.value = '';         // with more chance of typos
                t.style.color = '#fff';
            }
        }
    </script>


</body>

</html>