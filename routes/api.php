<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;

Route::apiResource('tasks', TaskController::class);

// опционально
Route::fallback(fn () => response()->json(['message' => 'Not Found.'], 404));
