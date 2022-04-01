<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\Country;
use App\Models\Role;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function create()
    {
        $countries = Country::all();
        $roles = Role::all();
        return view('users.create', compact('countries', 'roles'));
    }
    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id", $request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id", $request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function index()
    {
        $user = user::with('country')->get();
        return view('users.index', compact('user'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pin_code' => 'required',
            'role' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->country_id = $request->country_id;
        $user->state_id = $request->state_id;
        $user->city_id = $request->city_id;
        $user->pin_code = $request->pin_code;
        $user->role_id = $request->role_id;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('user_images/', $filename);
            $user->image = $filename;
        }
        $user->save();
        if ($user) {
            request()->session()->flash('usersuccess', 'successfully Saved user detail!!');
        }

        return redirect()->route('users.index');
    }

    public function edit($id, Request $request)
    {
        $user = User::find($id);
        $data['countries']=Country::get(["name","id"]);
        $data['states']=state::get(["name","id"]);
        $data['cities']=city::get(["name","id"]);
        $roles = Role::all();
        return view('Users.edit',$data ,compact('user','roles'));

    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->country_id = $request->country_id;
        $user->state_id = $request->state_id;
        $user->city_id = $request->city_id;
        $user->pin_code = $request->pin_code;
        $user->role_id = $request->role_id;
        if ($request->hasFile('image')) {
            $destination = 'user_images/' . $user->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('user_images/', $filename);
            $user->image = $filename;
        }
        $user->update();
        if($user)
        request()->session()->flash('usersuccess', 'successfully update user detail!!');
         return redirect()->route('users.index');

    }

    public function delete($id, Request $request)
    {
        $user = user::find($id);
        $destination = 'user_images/' . $user->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $user->delete();
        if($user)
        request()->session()->flash('usersuccess', 'successfully delete user detail!!');
        return redirect()->route('users.index');
    }

}
