<?php

use App\Http\Controllers\jobController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterUserController;
use App\Jobs\TranslateJob;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::resource('jobs', jobController::class);

Route::get('/test', function () {
    $job = App\Models\Job::find(1);
    TranslateJob::dispatch($job);
    return "done";
});
Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);
Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
