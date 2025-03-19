<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }
    public function store(Request $request){
        $validated=  $request->validate([
            'email' => 'required|email|max:255|min:3',
            'password' => 'required|string|max:255|min:3',
        ]);
        if(Auth::attempt($validated)){
            $request->session()->regenerate();
            return redirect('/jobs');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function destroy(){
        Auth::logout();
        return redirect('/login');
    }
}
