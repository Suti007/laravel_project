<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Number;
use Stripe\Stripe;
use Stripe\Charge;


class CheckoutController extends Controller
{
    public function show()
    {
        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupom')['discount']??0;
        $cartItems = Cart::where('user_id',Auth::id())->get();
        $subtotal = $cartItems->sum(function($item){
            return $item->post->price * $item->quantiy;
            });
         
        $newSubtotal = $subtotal - $discount;
        $newTax = $newSubtotal * $tax;
        
        $newTotal = $newSubtotal + $newTax;

        $count = Cart::where('user_id',Auth::id())->count();

        // return view('checkout.index',compact('cartItems','total'));
        return view('checkout.index')->with([
            'cartItems' => $cartItems,
            'newTax' => $newTax,
            'newSubtotal' => $newSubtotal,
            'newTotal' => $newTotal,
            'count' => $count,
            'discount' => $discount,
            
        ]);

    }
    public function process(Request $request)
    {
        // $request->validate([
        //     'shipping_address'=> 'required|string|max:255',
        //     'city'=> 'required|string|max:255',
        //     'state'=> 'required|string|max:255',
        //     'postal_code'=> 'required|string|max:20',
        //     'country'=> 'required|string|max:255',
        //     'stripeToken'=> 'required'

        // ]);
        Stripe::setApiKey(env('STRIPE_SECRET'));
        //Calculate total amount
        $cartItems = Cart::where('user_id',Auth::id())->get();
        $totalAmount = $cartItems->sum(function($item){
            return $item->post->price * $item->quantiy;
        });
        $charge=Charge::create([
            'amount'=>$totalAmount * 100,
            'currency'=>'usd',
            'description'=>'Order description',
            'source'=>$request->stripeToken,
            'metadata'=>['order_id'=>uniqid()],
        ]);
        $order=Order::create([
            'user_id'=>Auth::id(),
            'shipping_address'=>$request->shipping_address,
            // 'city'=>$request->city,
            // 'state'=>$request->state,
            // 'postal_code'=>$request->postal_code,
            // 'country'=>$request->country,
            'total_amount'=>$totalAmount,
            'status'=>'pending',
            'payment_method'=>'stripe',
            'stripe_payment_id'=>$charge->id,
        ]);
        foreach($cartItems as $cartItem){
            OrderItem::create([
                'order_id'=>$order->id,
                'post_id'=>$cartItem->post_id,
                'quantiy'=>$cartItem->quantiy,
                'price'=>$cartItem->post->price,
            ]);
        }
        Cart::where('user_id',Auth::id())->delete();
        return redirect()->route('post.welcome')->with('success','Payment Successful Your order has been placed.');
    }
    public function store(Request $request,$value)
    {
        $request->validate([
            'shipping_address'=> 'required|string|max:255',
            'city'=> 'required|string|max:255',
            'state'=> 'required|string|max:255',
            'postal_code'=> 'required|string|max:20',
            'country'=> 'required|string|max:255',
            //'stripeToken'=> 'required'

        ]);
        $cartItems = Cart::where('user_id',Auth::id())->get();
        $totalAmount = $cartItems->sum(function($item){
            return $item->post->price * $item->quantiy;
        });
        $stripe = new \Stripe\StripeClient(env("STRIPE_SECRET"));
        $charge = $stripe->charges->create([
            'amount' => round($value * 100),
            'currency' => 'usd',
            'source' => $request->stripeToken,
            'description' => "payment from descovery2009.com",
        ]);
        $order=Order::create([
            'user_id'=>Auth::id(),
            'shipping_address'=>$request->shipping_address . ', '.$request->city. ','.$request->state. ', '.$request->postal_code. ', '.$request->country,
            // 'city'=>$request->city,
            // 'state'=>$request->state,
            // 'postal_code'=>$request->postal_code,
            // 'country'=>$request->country,
            'total_amouont'=>$value,
            'status'=>'pending',
            'payment_method'=>'stripe',
            'stripe_payment_id'=>$charge->id,
        ]);
        foreach($cartItems as $cartItem){
            OrderItem::create([
                'order_id'=>$order->id,
                'post_id'=>$cartItem->post_id,
                'quantiy'=>$cartItem->quantiy,
                'price'=>$cartItem->post->price,
            ]);
        }
        Cart::where('user_id',Auth::id())->delete();
        // dd($charge);
        session()->forget('coupom');
        return back()->with("success_messge", "Payment successfully.");
    }
}
