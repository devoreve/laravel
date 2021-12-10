<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }
    
    public function signin(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        
        // On essaie de se connecter avec les identifiants du formulaire
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirection vers la page demandée
            return redirect()->intended('/');
        }
        
        return back()->withErrors([
            'name' => 'Les identifiants ne correspondent pas',
        ]);
    }
    
    public function register()
    {
        return view('register');
    }
    
    public function signup(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,name',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8|confirmed'
        ]);
        
        $user = new User();
        $user->name = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        
        $user->save();
        
        return redirect()->route('login');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('homepage');
    }
}