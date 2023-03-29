<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\Api\ProjectController;

Route::name('api.')->group(function () {
    Route::resource('projects', ProjectController::class);
});