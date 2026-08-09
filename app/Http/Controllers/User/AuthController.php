<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function storeRegister(Request $request){
        try{
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
            ]);

            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'user',
                'status' => true,
            ]);

            return redirect()->route('login')->with('success', 'Register successfully, please login');
        }catch(\Exception $e){
            echo ''.$e->getMessage();
        }
    }
    public function login(){
        return view('auth.login');
    }
    public function storeLogin(Request $request){
        try{
            $validated = $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            
            $remember = $request->boolean('remember');
            
            if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password'], 'status' => true], $remember)) {
                return redirect()->route('dashboard')->with('success', 'Login successful');
            }

            return back()->withErrors(['email' => 'These credentials do not match our records.'])->onlyInput('email');
        }catch(\Exception $e){
            echo ''.$e->getMessage();
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    public function profile(){}
}
