<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function store(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'password' => 'required'
        ]);


        $credentials = [
            'user_id' => $request->input('user_id'),
            'password' => $request->input('password')
        ];

        

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended( Route('dashboard'));
        }
 
        return back()->withErrors([
            'user_id' => 'The provided credentials do not match our records.',
        ])->onlyInput('user_id');
    }
}
