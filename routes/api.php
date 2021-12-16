<?php

use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\OrderController;
use App\Http\Controllers\V1\OrderItemController;
use App\Http\Controllers\V1\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->prefix('/v1')->group(function () {
    Route::prefix('/products')->group(function () {
        Route::get('', [ProductController::class, 'index']);
        Route::get('/{id}', [ProductController::class, 'show']);
        Route::put('/{id}', [ProductController::class, 'update']);
    });

    Route::prefix('/orders')->group(function () {
        Route::prefix('/items')->group(function () {
            Route::post('/', [OrderItemController::class, 'store']);
            Route::delete('/{id}', [OrderItemController::class, 'destroy']);
        });
        Route::get('', [OrderController::class, 'index']);
        Route::get('/{id}', [OrderController::class, 'show']);
        Route::put('/{id}', [OrderController::class, 'update']);
    });

    Route::prefix('/reports')->group(function () {
        Route::get('/orders', [OrderController::class, 'report']);
    });
});

Route::post('/login', [AuthController::class, 'login']);
