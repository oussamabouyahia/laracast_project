<?php

use App\Http\Controllers\jobController;

use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');

// Route::controller(jobController::class)->group(function () {
//     Route::get('/jobs', 'index');
//     Route::post('/jobs', 'store');
//     Route::get('/jobs/create', 'create');
//     Route::get('/jobs/{job}', 'show');
//     Route::get('/jobs/{job}/edit', 'edit');
//     Route::patch('/jobs/{job}', 'update');
//     Route::delete('/jobs/{job}', 'destroy');
// });
Route::resource('jobs', jobController::class);

