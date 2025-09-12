<?php

use App\Http\Controllers\MemoController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/app/store', [MemoController::class, 'store']);
Route::get('/app/getMemos', [MemoController::class, 'getMemos']);
Route::post('/app/delete', [MemoController::class, 'delete']);
