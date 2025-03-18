<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
            'password' => 'required|string|max:255|min:3',
        ]);

        User::create($validated);
        return redirect('/login');
    }


}
