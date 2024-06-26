<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        $user = User::findOrFail(auth()->id());
        return view('index', compact('packages', 'user'));
    }

    public function show($id)
    {
        $package = Package::findOrFail($id);
        return view('package.show', compact('package'));
    }

    public function create(Request $request) 
    {
        $request->validate(['type_en'=> 'required', 'name_en' => 'required', 'type_es'=> 'required', 'name_es' => 'required', 'price' => 'required']);

        $newP = new Package;
        $newP-> type_en = $request->type_en;
        $newP-> name_en = $request->name_en;
        $newP-> type_es = $request->type_es;
        $newP-> name_es = $request->name_es;
        $newP-> price = $request->price;

        $newP -> save();

        return back() -> with('message', 'Package created successfully');
    }

    public function edit($id) {
        $package = Package::findOrFail($id);
        return view('packages.edit', compact('package'));
    }

    public function update(Request $request, $id) {
        $request->validate(['type_en'=> 'required', 'name_en' => 'required', 'type_es'=> 'required', 'name_es' => 'required', 'price' => 'required']);
        $package = Package::findOrFail($id);
        $package-> type_en = $request->type_en;
        $package-> name_en = $request->name_en;
        $package-> type_es = $request->type_es;
        $package-> name_es = $request->name_es;
        $package-> price = $request->price;
        $package->save();
        return back()->with('message','Package edited successfully!');
    }

    public function delete($id) {
        $package = Package::findOrFail($id);
        $package->delete();
        return back()->with('message','Package deleted successfully!');
    }
}
