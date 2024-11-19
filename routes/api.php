<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BatchProcessController;
use App\Http\Controllers\IndividualProcessController;
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index']);
Route::middleware(['throttle:individual'])->group(function () {
    Route::post('/individual', [IndividualProcessController::class, 'index']);
});
Route::middleware(['throttle:batch'])->group(function () {
    Route::post('/batch', [BatchProcessController::class, 'index']);
});
