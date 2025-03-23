<div class="container mx-auto mt-8">
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
        <div class="mb-4">
            <h2>Order Summary</h2>
            <ul>
                @foreach ($cartItems as $cartItem)
                    <li>{{$cartItem->post->name}} x {{$cartItem->quantiy}} -
                        ${{$cartItem->post->price * $cartItem->quantiy}}</li>

                @endforeach
            </ul>
            <p>Total: ${{$cartItems->sum(function ($item) {
    return $item->post->price * $item->quantiy; })}}</p>
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
<script src="https://js.stripe.com/v3/"></script>