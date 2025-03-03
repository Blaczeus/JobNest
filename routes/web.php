<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

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

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find((int) $id );

    if (!$job) {
        abort(404);
    }

    return view('jobs.show', ['job'=> $job]);
});

Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find((int) $id );

    if (!$job) {
        abort(404);
    }

    return view('jobs.edit', ['job'=> $job]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
