<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $favorites = $user->favorites;
        return view('user.detail', compact('user', 'favorites'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $favorites = $user->favorites;
        return view('user.edit', compact('user', 'favorites'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'required|string|min:8',
        ]);

        $user = User::findOrFail($id);

        if ($request->has('name')) {
            $user->name = $request->name;
        }
        if ($request->has('email')) {
            $user->email = $request->email;
        }
        if ($request->has('password')) {
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

    public function changeFavorite($user_id, $package_id) {
        $user = User::findOrFail($user_id);

        // if user already has this package as favorite then remove it, if not add it.
        if ($user->favorites()->where('package_id', $package_id)->exists())
        {
            $user->favorites()->detach($package_id);
            return response()->json(['is_favorite' => false]);
        }

        $user->favorites()->attach($package_id);
        return response()->json(['is_favorite' => true]);
    }
}
