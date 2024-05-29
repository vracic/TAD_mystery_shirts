<?php

namespace App\Http\Controllers;

use App\Models\FavoriteView;
use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::where('sent', 0)->get();
        $users = User::with('address')->get();
        $favorites = FavoriteView::all();
        $packages = Package::all();
        return view('admin.index', compact('orders', 'users', 'favorites', 'packages'));
    }

    public function allOrders()
    {
        $orders = Order::all();
        $users = User::all();
        $favorites = FavoriteView::all();
        return view('admin.index', compact('orders', 'users', 'favorites'));
    }
}
