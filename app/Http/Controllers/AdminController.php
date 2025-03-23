<?php

namespace App\Http\Controllers;

use App\Models\Categoly;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function welcome()
    {
        $recentOrders=Order::latest()->take(5)->get();
        $recentUsers=User::latest()->take(5)->get();
        $categories=Categoly::all();
        return view('admin.index',compact('recentOrders','categories'));
    }
    public function index()
    {
        $recentOrders=Order::latest()->take(5)->get();
        $recentUsers=User::latest()->take(5)->get();
        $categories=Categoly::all();
        return view('admin.index1')->with([
            'recentOrders'=>$recentOrders,
            'recentUsers'=>$recentUsers,
            'categories'=>$categories,
        ]);
        // return view('admin.index1',compact('recentOrders','recentUsers'));
    }
    
    public function view_category()
    {
        
        return view('admin.category');
    }
}
