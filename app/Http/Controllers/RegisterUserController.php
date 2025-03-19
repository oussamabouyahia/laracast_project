<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }
    public function store(Request $request){
      $validated=  $request->validate([
            'first_name' => 'required|string|max:255|min:3',
            'last_name' => 'required|string|max:255|min:3',
            'email' => 'required|email|max:255|min:3',
            'password' => 'required|string|max:255|min:5|confirmed',
        ]);

       $user= User::create($validated);
        Auth::login($user);
       return redirect('/jobs');
    }


}
