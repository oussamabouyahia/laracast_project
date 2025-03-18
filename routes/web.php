<?php

use App\Http\Controllers\jobController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::resource('jobs', jobController::class);

Route::get('/register',[RegisterUserController::class, 'create']);
Route::post('/register',[RegisterUserController::class, 'store']);
Route::get('/login',[LoginUserController::class, 'create']);
Route::post('/login',[LoginUserController::class, 'store']);
Route::post('/logout',[LoginUserController::class, 'destroy']);
