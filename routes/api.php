<?php

use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\ApiController::class)
    ->prefix('car')
    ->group(function () {
        Route::get('/list', 'get');
        Route::get('/get', 'search');
});

Route::controller(\App\Http\Controllers\ApiController::class)
    ->prefix('car')
    ->group(function () {
        Route::get('/list', 'get');
        Route::post('/get', 'search');
    });
