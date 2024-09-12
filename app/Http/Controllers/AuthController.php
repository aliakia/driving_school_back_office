<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function fetchData() {
        $dsData = DB::table('tb_users')->select('user_id', 'password', 'is_active')->get();
        return response()->json([
            'data' => $dsData
        ]);
    }
    public function index() {
        $pageConfigs = [
            'myLayout' => 'blank'
          ];

          return view('auth.login', [
            'pageConfigs' => $pageConfigs,
          ]);
    }
     
    public function login(Request $request) {
        
        $request->validate([
            'user_id' => 'required',
            'password' => 'required',
        ]);
    
        $user = DB::table('tb_users')
        ->select(
            'user_id',
            'employee_id',
            'first_name',
            'last_name',
            'ds_code',
            'is_active', 
            'user_type',
            'password',
            DB::raw("encode(pic_id1, 'escape') as pic_id1"),
        )
        ->where('user_id', $request->user_id)
        ->first();
            
        // dd($user);
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',
            ], 422);
        }
    
        $_enc_password = hash("sha512", $request->password);
        if (strtoupper($_enc_password) !== strtoupper($user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Incorrect password',
            ], 422);
        }
    
        if (!$user->is_active) {
            return response()->json([
                'status' => 'error',
                'message' => 'User is not active',
            ], 403);
        }
    
        $request->session()->put('logged_in', $user);
        // dd(session('logged_in'));  
        return response()->json([
            'status' => 'success',
            'message' => 'Login successful',
        ]);

        
    }
    

    public function logout(Request $request)
    {
        $request->session()->forget('logged_in');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flush();
        
        return redirect()->route('login');
    }
    
}