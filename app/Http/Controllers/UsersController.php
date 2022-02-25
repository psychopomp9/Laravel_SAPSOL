<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {   
        return view('users.edit');
    }

    public function update()
    { 
        // validate data
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'password' => 'required|min:6'
        ]);

        $user = Auth::user(); //logged in user selected

        //get data from form
        $user->name = request('name');
        $user->email = request('email');
        $user->address = request('address');
        $user->password = bcrypt(request('password'));

        $user->save(); // update user

        return back()->with('message', 'update successful');
    }
}
