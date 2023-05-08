<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        
        $credentials=$request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('user.articles'));
        }
    
        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect',
        ])->onlyInput('email');
    }

    public function deconnect()
    {
        Auth::logout();
        return redirect()->route('articles.index');
    }
}
