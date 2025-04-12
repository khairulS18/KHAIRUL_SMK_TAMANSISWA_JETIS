<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SigninController extends Controller
{
    public function index() {
        return view('auth.signin');
    }

    public function store(Request $request)
    {
        $request->validate([            
            'username'=>'required|email:users',
            'password'=>'required|min:8|max:12'
        ]);

        $user = User::where('username','=',$request->username)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect()->route('pages.game.index');
            } else {
                return back()->with('fail','Password not match!');
            }
        } else {
            return back()->with('fail','This username is not register.');
        }        
    }

    //
}
