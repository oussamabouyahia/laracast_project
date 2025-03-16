<?php

use App\Models\Job;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;
// $jobs= [
//     ["id"=>1,"title"=>"director","salary"=>50000],
//     ["id"=>2,"title"=>"programmer","salary"=>30000],
//     ["id"=>3,"title"=>"accountant","salary"=>70000],
//     ["id"=>4,"title"=>"CEO","salary"=>100000]];
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
Route::post('/jobs', function () {
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
