<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
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
                    'password', 
                    'first_name', 
                    'middle_name', 
                    'last_name', 
                    'gender',
                    'ds_code', 
                    'certificate_tesda', 
                    'certificate_tesda_expiration',
                    'is_active',
                    'description',
                    'user_type', 
                    'user_name', 
                    'user_group', 
                    DB::raw("encode(pic_id1, 'escape') as pic_id1"),
                )
                ->where('user_id', $request->user_id)
                ->first();
   
        $_password = $request->password;
        $_enc_password = hash("sha512", $_password);
              
        if (!$user) {
            return back()->withErrors([
                'user_id' => 'No user id found.',
            ]);            
        }
        // dd($_enc_password);
        
        if (strtoupper($_enc_password) !== $user->password) {
            return back()->withErrors([
                'password' => 'Password is wrong.',
            ]); 
        }

        if (!$user->is_active) {
            return back()->withErrors([
                'user_id' => 'User is not active.',
            ]);    
        }
    
        $request->session()->put('logged_in', $user);
      
        return redirect()->intended(route('drivingSchool'));
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