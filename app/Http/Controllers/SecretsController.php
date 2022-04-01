<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Secret;

class SecretsController extends Controller
{
    public function index()
    {
        $secret=Secret::all();
        return view('secrets.index', compact('secret'));
    }


    public function edit($id)
    {
        $secret=Secret::find($id);
        return view('secrets.edit', compact('secret'));
    }


    public function update($id, Request $request)
    {
        $secret=Secret::find($id);
        $secret->name=$request->name;
        $secret->slug=$request->slug;
        $secret->update();
        if($secret)
        request()->session()->flash('secretsuccess', 'successfully update secret detail!!');
        return redirect()->route('secrets.index');

    }
    public function delete($id, Request $request)
    {
        $secret=Secret::find($id);
        $secret->delete();
        if($secret)
        request()->session()->flash('secretsuccess', 'successfully delete secret detail!!');
        return redirect()->route('product.index');
    }
}
