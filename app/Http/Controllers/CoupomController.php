<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupom;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoupomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $coupom = Coupom::where('code',$request->coupom_code)->first();
        if(!$coupom) {
            return redirect()->route('checkout.show')->withErrors('Invalid coupon code. Please try again.');
        }
        // $totalqty = Cart::where('user_id',Auth::id())->sum('quantiy');
        $cartItems = Cart::where('user_id',Auth::id())->get();
        $totalAmount = $cartItems->sum(function($item){
        return $item->post->price * $item->quantiy;
        });
        
        session()->put('coupom',[
            'name' => $coupom->code,
            'discount' => $coupom->discount($totalAmount),
        ]);
        return redirect()->route('checkout.show')->with('success_messge','Coupon has been applied!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        session()->forget('coupom');
        return redirect()->route('checkout.show')->with('success_messge','Coupon has been removed');
    }
}
