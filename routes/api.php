<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\admin\CrudUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::middleware('auth:sanctum')->group(
    function () {
        Route::get('account', [UserController::class, 'fetch']);
        Route::post('account', [UserController::class, 'updateProfile']);
        Route::post('account/avatar', [UserController::class, 'updateAvatar']);

        Route::post('logout', [UserController::class, 'logout']);
    }
);

Route::prefix('admin')
    ->middleware(['auth:sanctum', 'admin'])
    ->group(
        function () {
            // user
            Route::get('user', [CrudUserController::class, 'index']);
            Route::delete('user/{id}', [CrudUserController::class, 'destroy']);
        }
    );
