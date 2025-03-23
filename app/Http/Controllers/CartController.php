<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\IsEmpty;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $cartItems = Cart::where('user_id',Auth::id())->get();
      $count = Cart::where('user_id',Auth::id())->count();
      return view('cart.index',compact('cartItems','count'));

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
        // $request->validate([
        //     'post_id'=> 'required|exists:posts,id',
        //     'quantiy'=> 'required|integer|min:1',
        //     'image'=> 'nullable'
        // ]);
        // $pst=Post::findOrFail($request->post_id);
        // // $cartItems = Cart::updateOrCreate(
        // Cart::updateOrCreate(    
        //     ['user_id'=> Auth::id(),'post_id'=> $request->post_id],
        //     ['quantiy'=> $request->quantiy,'image'=> $request->post_id],
        //     //['image'=> $request->post_id],
            
        // );
        $data=$request->validate([
            'post_id'=> 'required|exists:posts,id',
            'quantiy'=> 'required|integer|min:1',
            // 'post_image'=> 'nullable|mimes:png,jpg,jpeg|max:1024',
        ]);
        
        // $cartItems = Cart::updateOrCreate(
        $pst=Post::findOrFail($request->post_id);
        $data['image']=$pst->image;
        $data['user_id']=Auth::id();
        
        // if($pst->isEmpty)
        // {
        //     $data['image']=Auth::id();
        // }
        
        Cart::create($data);
        return redirect()->route('post.welcome')->with('success','Product added to cart successfully');
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
    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'quantiy'=> 'required|integer|min:1',
        ]);
        $cart->update(['quantiy'=> $request->quantiy]);
        return redirect()->route('cart.index')->with('success','Cart Updated successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('cart.index')->with('success','product removed from cart.');
    }
}
