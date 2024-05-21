<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Shirt;
use Illuminate\Http\Request;

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

        // Select a random shirt of the specified type and size
        $shirt = Shirt::where('type', $package->type)
                      ->where('size', $request->size)
                      ->inRandomOrder()
                      ->first();

        if (!$shirt) {
            return redirect()->back()->with('error', 'No shirts available in the selected size.');
        }

        // Create the cart session if not exists
        $cart = session()->get('cart', []);

        // Add or update the package in the cart
        if (isset($cart[$package->id])) {
            $cart[$package->id]['quantity']++;
        } else {
            $cart[$package->id] = [
                "name" => $package->name,
                "quantity" => 1,
                "shirt_id" => $shirt->id,
                "size" => $request->size
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function destroy($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }
}
