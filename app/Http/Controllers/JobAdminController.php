<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;

class JobAdminController extends Controller
{
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

        $validated['employer_id'] = 4;

        $validated['salary'] = '$' . number_format($validated['salary'], 0, '.', ',') . ' USD';

        Job::create($validated);

        return redirect('/jobs')->with('success', 'Job created successfully!');
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
