<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

     
    public function login()
    {
        return view('login');
    }
   


  

        // Other methods of the controller...
    
        public function loginpost(Request $request)
        {
            $credentials = $request->only('email', 'password');
    
            if (Auth::attempt($credentials)) {
                // Authentication successful
                return redirect()->intended(route('home'));
            } else {
                // Authentication failed
                return redirect()->route('login')->with('error', 'Invalid credentials');
            }
        }
    
        // Other methods...
    }
    
    
    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }

    // Other methods of the controller...

   


