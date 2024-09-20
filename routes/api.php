<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BatchProcessController;
use App\Http\Controllers\IndividualProcessController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/batch', [BatchProcessController::class, 'index']);
Route::post('/individual', [IndividualProcessController::class, 'index']);