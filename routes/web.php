<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;



Route::get('/', [HomeController::class, 'index']);
Route::post('/add_user', [HomeController::class, 'add_user']);

