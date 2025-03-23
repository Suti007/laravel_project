<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>

    <div class="contaner mx-auto mt-8">
        <h1 class="text-3xl font-bont mb-4">Shopping Cart</h1>
        @if ($message = Session::get('success'))
            <div class="bg-green-500 text-red-500 p4 mb-4">
                {{$message}}
            </div>
        @endif
        @if ($cartItems->isEmpty())
            <p class="text-gray-700">
                Your cart is empty
            </p>
        @else
            <table class="table table-hover table-condensed">
                <thead>
                    <th style="width:30%">Product</th>
                    <th style="width:20%">Quantity</th>
                    <th style="width:10%">Price</th>
                    <th style="width:10%">Total</th>
                    <th style="width:10%">Actiions</th>
                </thead>
                <tbody>
                    @foreach ($cartItems as $cartItem)
                        <tr data-id="">
                            <td data-th="Products">
                                <div class="row">
                                    <div class="col-sm-1 hidden-xs">
                                        <img height="150" width="150" class="img-responsive"
                                            src="{{asset('uploads/images/' . $cartItem->post->image)}}"
                                            alt="{{$cartItem->post->name}}">
                                    </div>
                                    <div class="col-sm-0">
                                        <h4 class="nomargin">{{$cartItem->post->name}}</h4>
                                    </div>
                                </div>
                            </td>

                            <td data-th="Quantity">
                                <form action="{{route('cart.update', $cartItem)}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" style="width: 50px" name="quantiy" value="{{$cartItem->quantiy}}">
                                    <button type="submit">Update</button>

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
            </table>
            <div class="mt-4">
                <a href="{{route('checkout.show')}}">Proceed to Checkout</a>
            </div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>