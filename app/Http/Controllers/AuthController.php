<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('login');
    }

    public function loginSuccess(Request $request) {
        $user = [
            'email' => $request->email,
            'password' => $request->password
        ];
        // dd($user);
        if(Auth::attempt($user)){
            return redirect()->route('index');
        }
        return redirect()->route('login');
    }
}
