<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function index()
    {
        return view('auth.signup');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'username' => 'required|unique:users|min:4|max:60',
            'password' => 'required|min:5|max:10'
        ], [
            'username.required' => 'Username please fill in!',
            'username.unique' => 'Username has been used!',
            'username.min' => 'Username min 4 character!',
            'username.max' => 'Username max 60 character!',
            'password.required' => 'Password please fill in!',
            'password.min' => 'Password min 5 character!',
            'password.max' => 'Password max 10 character!',
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (User::create($data)) {
            return redirect()->route('pages.game.index')->with('success', 'User Has Been Add!');
        } else {
            return redirect()->back()->withInput();
        }
    }

    //
}
