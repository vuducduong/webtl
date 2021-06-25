<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('login');
    }

    public function loginSuccess(Request $request) {
        $cri = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if(Auth::attempt($cri)){
            return redirect()->route('index');
        }
        return redirect()->route('login');
    }
}
