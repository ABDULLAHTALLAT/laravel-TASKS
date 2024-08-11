<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\StudentController;

Route::resource('students', StudentController::class);
use App\Http\Controllers\TrackController;

Route::resource('tracks', TrackController::class);
use App\Http\Controllers\CourseController;

Route::resource('courses', CourseController::class);