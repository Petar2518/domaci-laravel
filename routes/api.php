<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\CourseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/users',[UserController::class,'index']);
Route::get('/users/{id}',[UserController::class,'show']);
// Route::get('/courses',[CourseController::class,'index']);
// Route::get('/courses/{id}',[CourseController::class,'show']);
Route::resource('courses',CourseController::class);
// Route::get('/users/{id}/posts',[UserCourseController::class,'index'])->name('users.posts.index');
Route::resource('users.courses',UserCourseController::class)->only(['index']);