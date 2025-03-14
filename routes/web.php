<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
$jobs= [
    ["id"=>1,"title"=>"director","salary"=>50000],
    ["id"=>2,"title"=>"programmer","salary"=>30000],
    ["id"=>3,"title"=>"accountant","salary"=>70000],
    ["id"=>4,"title"=>"CEO","salary"=>100000]];
Route::get('/', function () {
    return view('home');
});
Route::get('/jobs', function  () use($jobs) {

    return view('jobs',["jobs"=>$jobs]);
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/jobs/{id}', function ($id) use($jobs){

    $job = Arr::first($jobs,function($element)use($id){
         return $element['id']==$id;
    });
    if(!$job){abort(404);}

    return view('job',["job"=>$job]);
});
