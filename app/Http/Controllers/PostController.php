<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Categoly;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function welcome(Request $request) {
        
        if ($request->filled('categoly')) {
            $search=$request->categoly;
            $posts=Post::where('category','Like','%'.$search.'%')->get();
            $categoryName=Categoly::where('slug','Like','%'.$search.'%')->first()->name;
            // $posts = Post::with('categolies')->whereHas('categolies', function ($query) {
            //     $query->where('slug', request()->categoly);
            // });
            $categories=Categoly::all();
        } else {
            $posts=Post::all();
            $categories=Categoly::all();
            $categoryName='Featured';
        }
        // if(request('categoly')){
        //     $posts=Post::with('categolies')->whereHas('categolies', function($query) {
        //     $query->where('category', request()->categoly);
        //     })->get();
        //     $categories=Categoly::all();
        // } else {
        //     $posts=Post::all();
        //     $categories=Categoly::all();
        // }
        // $posts=Post::all();
        // $categories=Categoly::all();
        $count = Cart::where('user_id',Auth::id())->count();
        // return view('posts.welcome',['posts'=>$posts,'categories'=>$categories,'count'=>$count,'categoryName'=>$categoryName]);
        return view('posts.welcome')->with([
            'posts'=>$posts,
            'categories'=>$categories,
            'count'=>$count,
            'categoryName'=>$categoryName,
        ]);
                
    }
    public function index()
    {
        $posts=Post::with('categolies')->whereHas('categolies', function($query) {
        $query->where('category', request()->categoly);
    })->get();
        
        $categories=Categoly::all();
        $count = Cart::where('user_id',Auth::id())->count();
        return view('posts.welcome',['posts'=>$posts,'categories'=>$categories,'count'=>$count]);  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts= Post::all();
        $categories=Categoly::all();
        return view('posts.create',compact('posts','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=> 'required|string',
            'image'=> 'nullable|mimes:png,jpg,jpeg|max:1024',
            'qty'=> 'required|numeric',
            
            'price'=> 'required|decimal:2',
            'category'=> 'required|string',
            'description'=> 'nullable'

        ]);
        if($request->has('image'))
        {
            $imageName= time().'.'.$request->image->getClientOriginalExtension();
            // Upload image to server
            $request->image->move(public_path('uploads/images/'),$imageName);
            $data['image']= $imageName;
        }
        Post::create($data);
        return back()->with('success','Product has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function detail($id) {
        $post=Post::findOrFail($id);
        $count = Cart::where('user_id',Auth::id())->count();
        return view('posts.descrip',['post'=>$post,'count'=>$count]);
    
    }
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return back()->with('success','Product has been delete!');
    }
    public function search(Request $request)
    {
        $search=$request->search;
        $data=Post::where('name','Like','%'.$search.'%')->get();
        return view('posts.welcome',['posts'=>$data]);  
    }
}
