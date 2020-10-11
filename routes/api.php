<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LogController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout']);

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::prefix('user')->group(function () {
        Route::get('/auth', [UserController::class, 'getAuthenticatedUser']);
        Route::get('/', [UserController::class, 'getAll']);
        Route::get('/{id}', [UserController::class, 'get']);
        Route::post('/', [UserController::class, 'store']);
        Route::match(['put', 'patch'], '/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
    });

    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'getAll']);
        Route::get('/{id}', [CategoryController::class, 'get']);
        Route::post('/', [CategoryController::class, 'store']);
        Route::match(['put', 'patch'], '/{id}', [CategoryController::class, 'update']);
        Route::delete('/{id}', [CategoryController::class, 'destroy']);
    });

    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'getAll']);
        Route::get('/{id}', [ProductController::class, 'get']);
        Route::post('/', [ProductController::class, 'store']);
        Route::match(['put', 'patch'], '/{id}', [ProductController::class, 'update']);
        Route::delete('/{id}', [ProductController::class, 'destroy']);
    });

    Route::prefix('order')->group(function () {
        Route::get('/', [OrderController::class, 'getAll']);
        Route::get('/{id}', [OrderController::class, 'get']);
        Route::post('/', [OrderController::class, 'store']);
        Route::match(['put', 'patch'], '/{id}', [OrderController::class, 'update']);
        Route::delete('/{id}', [OrderController::class, 'destroy']);
    });

    Route::prefix('log')->group(function () {
        Route::get('/', [LogController::class, 'getAll']);
    });
});
