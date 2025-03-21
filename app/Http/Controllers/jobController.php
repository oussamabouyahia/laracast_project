<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\JobListed;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class jobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->paginate(3);
        return view('jobs.index', ["jobs" => $jobs]);
    }
    public function show(Job $job)
    {


        if (!$job) {
            abort(404);
        }

        return view('jobs.show', ["job" => $job]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|min:3',
            'salary' => 'required|string|max:255|min:3',
        ]);

        $job = Job::create([
            "title" => request('title'),
            "salary" => request('salary'),
            "employer_id" => '1',
            // "employer_id" => Auth::user()->employer->id,
        ]);
        Mail::to($job->employer->user)->send(new JobListed($job));
        return redirect('/jobs');
    }
    public function edit(Job $job)
    {

        if (Gate::denies('update-job', $job)) {
            abort(403, "only the employer can update the job");
        }
        if (!$job) {
            abort(404);
        }

        return view('jobs.edit', ["job" => $job]);
    }
    public function update(Job $job)
    {
        request()->validate([
            'title' => 'required|string|max :255|min:3',
            'salary' => 'required|string|max:255|min:3',
        ]);

        $job->update([
            "title" => request('title'),
            "salary" => request('salary'),
        ]);
        return redirect('/jobs/' . $job->id);
    }
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs');
    }
    public function create()
    {
        return view('jobs.create');
    }
}
