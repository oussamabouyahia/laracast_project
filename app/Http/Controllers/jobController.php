<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class jobController extends Controller
{
    public function index(){
        $jobs= Job::with('employer')->latest()->paginate(3);
        return view('jobs.index',["jobs"=>$jobs]);
    }
    public function show( Job $job) {


        if (!$job){abort(404);}

        return view('jobs.show',["job"=>$job]);
    }
    public function store(Request $request){
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
    }
    public function edit(Job $job) {


        if (!$job){abort(404);}

        return view('jobs.edit',["job"=>$job]);
    }
    public function update (Job $job) {
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
    }
    public function destroy (Job $job) {
        $job->delete();
        return redirect('/jobs');
    }
}

