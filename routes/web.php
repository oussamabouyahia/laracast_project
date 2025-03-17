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

//index jobs list
Route::get('/jobs', function  () {
$jobs= Job::with('employer')->latest()->paginate(3);
    return view('jobs.index',["jobs"=>$jobs]);
});

//store job
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

//create job form
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

//show job
Route::get('/jobs/{job}', function ( Job $job) {


    if (!$job){abort(404);}

    return view('jobs.show',["job"=>$job]);
});

//eidt job form
Route::get('/jobs/{job}/edit', function (Job $job) {


    if (!$job){abort(404);}

    return view('jobs.edit',["job"=>$job]);
});
//update job
Route::patch('/jobs/{job}', function (Job $job) {
request()->validate([
    'title' => 'required|string|max
    :255|min:3',
    'salary' => 'required|string|max:255|min:3',
]);

    $job->update([
        "title"=>request('title'),
        "salary"=>request('salary'),
    ]);
    return redirect('/jobs/' . $job->id);
});
//destroy job
Route::delete('/jobs/{job}', function (Job $job) {


    $job->delete();
    return redirect('/jobs');
});
