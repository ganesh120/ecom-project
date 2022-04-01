<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Secret;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function create()
    {
        $secrets = Secret::all();
        return view('product.create', compact('secrets'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'secret_code' => 'required',
            'status' => 'required',
            'image' => 'required',


        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->secret_code = $request->secret_code;
        $product->status = $request->status;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('user_images/', $filename);
            $product->image = $filename;
        }
        $product->save();
        if($product)
        request()->session()->flash('productsuccess', 'successfully Saved product detail!!');
        return redirect()->route('product.index');

    }

    public function index()
    {
        $product = Product::all();
        return view('product.index', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', compact('product'));

    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->secret_code = $request->secret_code;
        $product->status = $request->status;
        if ($request->hasFile('image')) {
            $destination = 'user_images/' . $product->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('user_images/', $filename);
            $product->image = $filename;
        }
        $product->update();
        if($product)
        request()->session()->flash('productsuccess', 'successfully update product detail!!');
        return redirect()->route('product.index');
    }
    public function delete($id, Request $request)
    {
        $product = Product::find($id);
        $destination = 'user_images/' . $product->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $product->delete();
        if($product)
        request()->session()->flash('productsuccess', 'successfully delete product detail!!');
        return redirect()->route('product.index');
    }

}
