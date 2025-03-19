<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
      if ( Auth::guest()){redirect('/login');}
    //   if ( $job->employer->user->isNot(Auth::user())){abort(403);}

        if (!$job){abort(404);}

        return view('jobs.edit',["job"=>$job,"user"=>Auth::user(),"user1"=>$job->employer->user]);
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
    public function create(){
        return view('jobs.create');
    }
}

