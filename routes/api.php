<?php

use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(\App\Http\Controllers\ApiController::class)
        ->prefix('car')
        ->group(function () {
            Route::get('/list', 'get'); // This route seems to be a duplicate or placeholder, will keep for now.
            Route::post('/search', 'search'); // Renamed from /get to /search for clarity
            Route::get('/get/{vehicle}', 'get'); // Using Route Model Binding
        });
});
