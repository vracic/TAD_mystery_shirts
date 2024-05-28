<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show()
    {
        $user = User::findOrFail(auth()->id());
        $favorites = $user->favorites;
        $packages = [];
        foreach($favorites as $fav) {
            $packages[] = Package::findOrFail($fav->pivot->package_id);
        }
        $orders = Order::where('user_id', auth()->id())->get();
        // return response()->json($orders);
        return view('users.details', compact('user', 'packages', 'orders'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
        ]);

        $user = User::findOrFail(auth()->id());

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('password') && strlen($request->password) > 0) {
            if (strlen($request->password) < 8) {
                return back()->with('message', 'New password needs to have at least 8 characters.');
            }
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return back()->with('message', 'User details updated successfuly.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->favorites()->detach();
        $user->delete();
        return back()->with('message', 'User deleted successfuly.');
    }

    public function changeFavorite($package_id) {
        $user = User::findOrFail(auth()->id());

        // if user already has this package as favorite then remove it, if not add it.
        if ($user->favorites()->where('package_id', $package_id)->exists())
        {
            $user->favorites()->detach($package_id);
            return response()->json(['isFavorite' => false]);
        }

        $user->favorites()->attach($package_id);
        return response()->json(['isFavorite' => true]);
    }
}
