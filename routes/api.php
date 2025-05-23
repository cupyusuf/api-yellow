<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LabelController;

Route::apiResource('categories', CategoryController::class);
Route::apiResource('labels', LabelController::class);
