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
            'pageConfigs' => $pageConfigs
          ]);
        // return view('auth.login');
    }

    public function login(Request $request) {
        // Validate the request
        $request->validate([
            'user_id' => 'required',
            'password' => 'required',
        ]);
    
        // Fetch the user using a direct database query
        $user = DB::table('tb_users')
            ->where('user_id', $request->user_id)
            ->first();
    
        // Hash the provided password
        $_password = $request->password;
        $_enc_password = hash("sha512", $_password);
    
        // Check if the user exists
        if (!$user) {
            return back()->withErrors([
                'login_error' => 'No User Found.',
            ]);            
        }
    
        // Check if the password is correct
        if (strtoupper($_enc_password) !== $user->password) {
            return back()->withErrors([
                'login_error' => 'Password is wrong.',
            ]); 
        }
    
        // Check if the user is active
        if ($user->is_active === 0) {
            return back()->withErrors([
                'login_error' => 'User is not Active.',
            ]); 
        }
    
        $request->session()->put('logged_in', $user);
        return redirect()->intended(route('dashboard'));
    }

    public function logout(Request $request)
    {
        // Clear the session data related to the user
        $request->session()->forget('logged_in');
        
        // Optionally, you might want to invalidate the session
        $request->session()->invalidate();
        
        // Regenerate the session token to prevent session fixation attacks
        $request->session()->regenerateToken();
        
        // Redirect to the login page or any other page
        return redirect()->route('login');
        // return dd($request);
    }
    
}