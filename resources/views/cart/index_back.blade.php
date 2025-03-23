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
        <table class="min-w-full bg-white">
            <thead>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Actiions</th>
            </thead>
            <tbody>
                @foreach ($cartItems as $cartItem)
                    <tr>
                        <td>{{$cartItem->post->name}}</td>
                        <td>
                            <form action="{{route('cart.update', $cartItem)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantiy" value="{{$cartItem->quantiy}}">
                                <button type="submit">Update</button>

                            </form>
                        </td>
                        <td>{{$cartItem->post->price}}</td>
                        <td>{{$cartItem->post->price * $cartItem->quantiy}}</td>
                        <td>
                            <form action="{{route('cart.destroy', $cartItem)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Remove</button>

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