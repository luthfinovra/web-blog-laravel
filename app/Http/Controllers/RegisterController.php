<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth/register');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users|regex:/^\S*$/u',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:255',
        ];

        $validatedData =  $request->validate($rules);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Successfully Registered Your Account!');
    }
}
