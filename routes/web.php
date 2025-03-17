<?php

use App\Jobs\TranslateJob;
use App\Models\Job;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;

Route::view('/', 'home');

Route::resource('jobs', JobController::class);

Route::middleware(['auth'])->group(function () {
  Route::get('/jobs/create', [JobController::class, 'create']);

  Route::post('/jobs', [JobController::class,'store']);

  Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
      ->can('edit', 'job');

  Route::patch('/jobs/{job}', [JobController::class, 'update'])
      ->can('edit', 'job');

  Route::delete('/jobs/{job}', [JobController::class, 'destroy'])
      ->can('delete', 'job');
});



Route::view('/about','about');
Route::view('/contact','contact');

Route::get('/register', [RegisteredUserController::class,'create']);
Route::post('/register', [RegisteredUserController::class,'store']);

Route::get('/login', [SessionController::class,'create'])->name('login');
Route::post('/login', [SessionController::class,'store']);
Route::post('/logout', [SessionController::class,'destroy']);


// Route::get('/jobs', [JobController::class,'index']);
// Route::get('/jobs/create', [JobController::class,'create'])->middleware('auth');
// Route::post('/jobs', [JobController::class,'store'])->middleware('auth');
// Route::get('/jobs/{job}', [JobController::class,'show'])->middleware('auth');
// Route::get('/jobs/{job}/edit', [JobController::class,'edit'])->middleware('auth')->can('edit', 'job');
// Route::patch('/jobs/{job}', [JobController::class,'update'])->middleware('auth');
// Route::delete('/jobs/{job}', [JobController::class,'destroy'])->middleware('auth')->can('delete', 'job');
