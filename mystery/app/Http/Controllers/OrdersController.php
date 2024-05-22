<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function unsentOrders()
    {
        $unsentOrders = Order::where('sent', false)->get();
        return view('orders.unsent', compact('unsentOrders'));
    }

    public function sendOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->sent = true;
        $order->save();
        return redirect()->back()->with('success', 'Order sent.');
    }
}
