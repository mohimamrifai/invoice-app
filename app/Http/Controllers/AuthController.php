<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function formLogin(Request $request)
    {
        $title = "Halaman Login";
        return view('auth.login', compact('title'));
    }
    
    public function formRegister(Request $request)
    {
        $title = "Halaman Register";
        return view('auth.register', compact('title'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register (Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ]);

        // hash password
        $HashPassword = Hash::make($validatedData['password']);

        $newUser = new User();
        $newUser->name = $validatedData['name'];
        $newUser->email = $validatedData['email'];
        $newUser->password = $HashPassword;

        $newUser->save();
        
        return redirect('login')->with('success', 'User Created, Login Now');       
    }
}
