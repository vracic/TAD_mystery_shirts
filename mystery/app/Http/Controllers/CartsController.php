<?php

namespace App\Http\Controllers;

use App\Mail\MyMail;
use App\Models\Order;
use App\Models\Package;
use App\Models\Shirt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CartsController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'package_id' => 'required',
            'size' => 'required'
        ]);

        // Fetch the package
        $package = Package::findOrFail($request->package_id);
        
        $item = [
            'type' => $package->type,
            'size' => $request->size
        ];
        
        // Create the cart session if not exists
        $cart = session()->get('cart', []);

        $cart[] = $item;

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function removeItem($index)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$index])) {
            unset($cart[$index]);
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
        }

        return redirect()->route('cart.index')->with('error', 'Item not found in cart.');
    }
    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);
        $userId = auth()->id();

        $user = User::findOrFail($userId);

        if (empty($cart)) {
            return back() -> with('message', 'Your cart is empty!');
        }

        $order = new Order();
        $order->user_id = $user->id; 
        $order->items = implode($cart);
        $order->address = $request->address;
        $order->save();
        
        Mail::to($user->email)->send(new MyMail($user->name));

        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Checkout complete!');
    }
}
