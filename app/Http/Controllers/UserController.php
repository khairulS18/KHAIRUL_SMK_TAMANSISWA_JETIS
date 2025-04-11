<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function create() {
        return view('administrator-portal.users-form');
    }

    public function store(Request $request) {
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
            return redirect()->route('admin.user')->with('success', 'User Has Been Add!');
        } else {
            return redirect()->route('admin.user')->with('error', 'User Failed To Add!');
        }
    }

    public function edit($id) {
        $data['user'] = User::where('id', $id)->first();

        return view('administrator-portal.users-form', $data);
    }

    public function update(Request $request, $id) {
        $user = User::where('id', $id)->first();

        $request->validate([
            'username' => 'required|min:4|max:60',
            'password' => 'required'
        ], [
            'username.required' => 'Username please fill in!',
            'username.min' => 'Username min 4 character!',
            'username.max' => 'Username max 60 character!',
            'password.required' => 'Password please fill in!',
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if ($user->update($data)) {
            return redirect()->route('admin.user')->with('success', 'User Has Been Add!');
        } else {
            return redirect()->route('admin.user')->with('error', 'User Failed To Add!');
        }
    }

    public function destroy($id) {
        $user = User::where('id', $id)->first();

        $user->delete();

        return view('administrator-portal.users');
    }
}
