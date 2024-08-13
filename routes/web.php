<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


    


Route::get('/', [UserController::class, 'register_page']);
Route::post('/add_user', [UserController::class, 'add_user']);

Route::get('/login', [UserController::class, 'login']);
Route::post('/users_login', [UserController::class, 'users_login']);


    Route::get('/courses-create', [UserController::class, 'courses_create']);
    Route::post('/add_course', [UserController::class, 'add_course']);

    Route::get('/home', [UserController::class,'home']);

Route::get("/courses_update/{id}",[UserController::class,'courses_update']);

Route::get('/courses_display',[UserController::class,'courses_display']);

Route::get('/access_login',[UserController::class,'access_login']);

