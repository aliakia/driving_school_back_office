<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    // public function store(Request $request) {
    //     $request->validate([
    //         'user_id' => 'required',
    //         'password' => 'required'
    //     ]);

    //     $credentials = $request->only('user_id', 'password');

    //     if(Auth::attempt($credentials)){
    //         return redirect()->intended(url('/'));
    //     };
    // }
}
