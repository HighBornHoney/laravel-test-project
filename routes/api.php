<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WorkerController;

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/logout', [LogoutController::class, 'logout']);

    Route::get('/sessions', [SessionController::class, 'index']);
    Route::delete('/sessions/{id}', [SessionController::class, 'destroy']);

    Route::post('/orders', [OrderController::class, 'store']);
    Route::post('/orders/{orderId}/assign-worker', [OrderController::class, 'assignWorkerToOrder']);

    Route::get('/workers/filter-by-order-types', [WorkerController::class, 'filterByExcludedOrderTypes']);
});
