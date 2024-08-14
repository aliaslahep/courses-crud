<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\UserController;


    


Route::get('/', [UserController::class, 'register_page']);
Route::post('/add_user', [UserController::class, 'add_user']);

Route::get('/login', [UserController::class, 'login']);
Route::post('/users_login', [UserController::class, 'users_login']);


Route::get('/courses_create', [UserController::class, 'courses_create']);
Route::post('/add_course', [UserController::class, 'add_course']);

Route::get('/home', [UserController::class,'home']);

Route::get("/courses_update/{id}",[UserController::class,'courses_update']);

Route::post("/update_course/{id}",[UserController::class,'update_course']);

Route::get("/courses_delete/{id}",[UserController::class,'courses_delete']);


Route::get('/courses_display',[UserController::class,'courses_display']);


Route::get('/access_login',[UserController::class,'access_login']);

Route::post('/filter_log',[UserController::class,'filter_log']);




Route::get('/logout', function () {

    Session::forget('user');  

    return redirect('/login');

})->name('logout');