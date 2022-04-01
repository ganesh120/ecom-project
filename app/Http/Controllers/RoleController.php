<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function create()
    {
        return view('roles/create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
           
        ]);
        $role=new Role();
        $role->name=$request->name;
        $role->slug=$request->slug;
        $role->save();
        if($role)
        request()->session()->flash('rolesuccess', 'successfully Saved role detail!!');
        return redirect()->route('roles.index');
    }

    public function index()
    {
        $role=Role::all();
        return view ('roles.index',compact('role'));
    }

    public function edit($id,Request $request)
    {
        $role=Role::find($id);
        return view('roles.edit',compact('role'));
    }

    public function update($id, Request $request)
    {
        $role=Role::find($id);
        $role->name=$request->name;
        $role->slug=$request->slug;
        $role->update();
        if($role)
        request()->session()->flash('secretsuccess', 'successfully update role detail!!');
        return redirect()->route('roles.index');


    }

    public function delete($id ,Request $request )
    {
        $role= Role::find($id);
        $role->delete();
        if($role)
        request()->session()->flash('rolesuccess', 'successfully delete role detail!!');
        return redirect()->route('roles.index');
    }
}
