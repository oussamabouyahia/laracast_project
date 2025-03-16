<?php

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/jobs', function  () {
$jobs= Job::with('employer')->latest()->paginate(3);
    return view('jobs.index',["jobs"=>$jobs]);
});
Route::post('/jobs', function (Request $request) {

   $request->validate([
        'title' => 'required|string|max:255|min:3',
        'salary' => 'required|string|max:255|min:3',
    ]);
   Job::create([
        "title"=>request('title'),
        "salary"=>request('salary'),
        "employer_id"=>1
    ]);
    return redirect('/jobs');
});
Route::get('/jobs/create', function () {
    return view('jobs.create');
});
Route::get('/jobs/{id}', function ($id) {

    $job =Job::find($id);
    if (!$job){abort(404);}

    return view('jobs.show',["job"=>$job]);
});
