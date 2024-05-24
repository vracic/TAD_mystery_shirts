<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('packages.index', compact('packages'));
    }

    public function show($id)
    {
        $package = Package::findOrFail($id);
        return view('package.show', compact('package'));
    }

    public function create(Request $request) 
    {
        $request->validate(['type'=> 'required', 'name' => 'required', 'price' => 'required']);

        $newP = new Package;
        $newP-> type = $request->type;
        $newP-> name = $request->name;
        $newP-> price = $request->price;

        $newP -> save();

        return back() -> with('message', 'Package created successfully');
    }

    public function edit($id) {
        $package = Package::findOrFail($id);
        return view('packages.edit', compact('package'));
    }

    public function update(Request $request, $id) {
        $request->validate(['type'=> 'required', 'name' => 'required', 'price' => 'required']);
        $package = Package::findOrFail($id);
        $package-> type = $request->type;
        $package-> name = $request->name;
        $package-> price = $request->price;
        return redirect()->to('/packages')->with('message','Package edited successfully!');
    }

    public function delete($id) {
        $package = Package::findOrFail($id);
        $package->delete();
        return back()->with('message','Package deleted successfully!');
    }


}
