<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\admin\CrudUserController;
use App\Http\Controllers\API\admin\CrudCourseController;
use App\Http\Controllers\API\admin\DashboardController;

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

// List Course
Route::get('course', [CourseController::class, 'index']);
// Search by name
Route::get('/search/course', [CourseController::class, 'search']);
// Sort by price lowest
Route::get('/sort/lowestprice/course', [CourseController::class, 'sortLowestPrice']);
// Sort by price highest
Route::get('/sort/highestprice/course', [CourseController::class, 'sortHighestPrice']);
// Sort by price free
Route::get('/sort/free/course', [CourseController::class, 'sortFree']);

// Routing User and Admin
Route::middleware('auth:sanctum')->group(
    function () {
        Route::get('account', [UserController::class, 'fetch']);
        Route::post('account', [UserController::class, 'updateProfile']);
        Route::post('account/avatar', [UserController::class, 'updateAvatar']);

        Route::post('logout', [UserController::class, 'logout']);
    }
);

// Routing Admin
Route::prefix('admin')
    ->middleware(['auth:sanctum', 'admin'])
    ->group(
        function () {
            // Dashboard Statistic
            Route::get('dashboard', [DashboardController::class, 'index']);

            // user
            Route::get('user', [CrudUserController::class, 'index']);
            Route::delete('user/{id}', [CrudUserController::class, 'destroy']);

            // course
            Route::get('course', [CrudCourseController::class, 'index']);
            Route::post('course', [CrudCourseController::class, 'store']);
            Route::get('course/{id}', [CrudCourseController::class, 'edit']);
            Route::put('course/{id}', [CrudCourseController::class, 'update']);
            Route::delete('course/{id}', [CrudCourseController::class, 'destroy']);
        }
    );
