<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Show the registration form
     */
    public function showRegisterForm()
    {
        return view('register');
    }

    /**
     * Handle user registration
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users,name',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('web-home')->with('success', 'Registration successful!');
    }

    /**
     * Show the login form
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Handle user login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Try to login with username (name field) or email
        $user = User::where('name', $credentials['username'])
            ->orWhere('email', $credentials['username'])
            ->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user, $request->has('rememberMe'));
            
            $request->session()->regenerate();
            
            return redirect()->route('web-home')->with('success', 'Login successful!');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->withInput($request->except('password'));
    }

    /**
     * Handle user logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }
}




