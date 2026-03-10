<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NoticeController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TeacherAcademicController;
use App\Http\Controllers\Api\TeacherEmploymentController;
use App\Http\Controllers\Api\Admin\NoticeAdminController;
use App\Http\Controllers\Api\Admin\NewsAdminController;
use App\Http\Controllers\Api\Admin\EventAdminController;
use App\Http\Controllers\Api\Admin\GalleryAdminController;

/*
|--------------------------------------------------------------------------
| Public API
|--------------------------------------------------------------------------
*/

Route::get('/notices', [NoticeController::class, 'index']);
Route::get('/notices/{slug}', [NoticeController::class, 'show']);

Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{slug}', [NewsController::class, 'show']);

Route::get('/events', [EventController::class, 'index']);
Route::get('/events/{slug}', [EventController::class, 'show']);

Route::get('/teachers', [TeacherController::class, 'index']);
Route::get('/teachers/{id}', [TeacherController::class, 'show']);

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

/*
|--------------------------------------------------------------------------
| Protected routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/profile', [AuthController::class, 'profile']);

    Route::get('/teacher/profile', [TeacherController::class, 'profile']);
    Route::put('/teacher/profile', [TeacherController::class, 'updateProfile']);

    Route::post('/teacher/academics', [TeacherAcademicController::class, 'store']);
    Route::delete('/teacher/academics/{id}', [TeacherAcademicController::class, 'destroy']);

    Route::post('/teacher/employments', [TeacherEmploymentController::class, 'store']);
    Route::delete('/teacher/employments/{id}', [TeacherEmploymentController::class, 'destroy']);

});

/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:sanctum','admin'])->prefix('admin')->group(function () {

    Route::post('/notices',[NoticeAdminController::class,'store']);
    Route::put('/notices/{id}',[NoticeAdminController::class,'update']);
    Route::delete('/notices/{id}',[NoticeAdminController::class,'destroy']);

    Route::post('/news',[NewsAdminController::class,'store']);
    Route::delete('/news/{id}',[NewsAdminController::class,'destroy']);

    Route::post('/events',[EventAdminController::class,'store']);
    Route::delete('/events/{id}',[EventAdminController::class,'destroy']);

    Route::post('/gallery',[GalleryAdminController::class,'store']);

});
