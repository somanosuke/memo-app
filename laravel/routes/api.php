<?php

use App\Http\Controllers\MemoController;
use Illuminate\Support\Facades\Route;

Route::post('/app/store', [MemoController::class, 'store']);
Route::get('/app/getMemos', [MemoController::class, 'getMemos']);
