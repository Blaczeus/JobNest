<?php

namespace App\Http\Controllers;

use App\Jobs\TranslateJob;
use App\Mail\JobPosted;
use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index() {
        $jobs = Job::with('employer')->latest()->simplePaginate(10);
        return view('jobs.index', compact('jobs'));
    }

    public function create() {
        return view('jobs.create');
    }

    public function store(Request $request) {
        $cleanSalary = preg_replace('/[^0-9]/', '', $request->salary);
        $request->merge(['salary' => $cleanSalary]);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'company' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        $employer = Employer::firstOrCreate(
            ['user_id' => $user->id],
            ['name' => $user->first_name ?? 'Admin'],
        );

        $validated['employer_id'] = $employer->id;
        $validated['salary'] = '$' . number_format($validated['salary'], 0, '.', ',') . ' USD';

        $job = Job::create($validated);

        TranslateJob::dispatch($job);

        return redirect('/jobs')->with('success', 'Job created successfully!');
    }


    public function show(Job $job) {

        return view('jobs.show', compact('job'));
    }

    public function edit(Job $job) {
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job) {

        $cleanSalary = preg_replace('/[^0-9]/', '', $request->salary);

        $request->merge(['salary' => $cleanSalary]);

        $validated = $request->validate([
            'title' => 'required|string|max:255|min:3',
            'salary' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'company' => 'required|string|max:255',
        ]);

        $validated['salary'] = '$' . number_format($validated['salary'], 0, '.', ',') . ' USD';

        $job->update($validated);

        return redirect('/jobs')->with('success', 'Job updated successfully!');
    }

    public function destroy(Job $job) {
        $job->delete();

        return redirect('/jobs')->with('success', 'Job deleted successfully!');
    }
}
