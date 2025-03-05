<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;


Route::view('/', 'home');

Route::resource('jobs', JobController::class);

Route::view('/about','about');
Route::view('/contact','contact');

Route::get('/register', [RegisteredUserController::class,'create']);
Route::post('/register', [RegisteredUserController::class,'store']);

Route::get('/login', [SessionController::class,'create']);
Route::post('/login', [SessionController::class,'store']);
