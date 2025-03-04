<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

// Homepage
Route::get('/', function () {
    return view('home');
});

// Jobs
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

// Create View
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Create Job
Route::post('/jobs', function () {
    // Validation
    request()->validate([
        'title' => 'required|string|max:255|min:3',
        'salary' => 'required|numeric|min:0',
        'location' => 'required|string|m ax:255',
        'company' => 'required|string|max:255',
    ]);


    Job::create([
        'title'=> request('title'),
        'salary' => '$' . number_format(request('salary'), 0, '.', ',') . ' USD',
        'location'=> request('location'),
        'company'=> request('company'),
        'employer_id'=> 2,
    ]);

    return redirect('/jobs');
});

// Show Job
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find((int) $id );

    if (!$job) {
        abort(404);
    }

    return view('jobs.show', ['job'=> $job]);
});

// Edit Job
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find((int) $id );

    if (!$job) {
        abort(404);
    }

    return view('jobs.edit', ['job'=> $job]);
});

// Update Job
Route::patch('/jobs/{id}', function ($id) {

    $cleanSalary = preg_replace('/[^0-9]/', '', request('salary'));

    request()->merge(['salary' => $cleanSalary]);
    
    request()->validate([
        'title' => 'required|string|max:255|min:3',
        'salary' => 'required|numeric|min:0',
        'location' => 'required|string|max:255',
        'company' => 'required|string|max:255',
    ]);

    // Authorize(Pending)

    Job::findOrFail((int) $id)->update([
        'title'=> request('title'),
        'salary' => '$' . number_format(request('salary'), 0, '.', ',') . ' USD',
        'location'=> request('location'),
        'company'=> request('company'),
    ]);

    return redirect("/jobs/$id")->with("success","Job updated successfully");
});

// Delete Job
Route::delete('/jobs/{id}', function ($id) {
    // Authorize(Pending)

    Job::findOrFail((int) $id)->delete();
    return redirect('/jobs')->with('success','Job deleted successfully');
});

// About Page
Route::get('/about', function () {
    return view('about');
});

// Contact Page
Route::get('/contact', function () {
    return view('contact');
});
