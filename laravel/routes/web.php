<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MemoController;
use Illuminate\Support\Facades\Route;

/**********************************************************************
 * API
 **********************************************************************/


/**********************************************************************
 * ルーティング
 ***********************************************************************/
Route::get('/', function () {
    return view('index');
});
Route::get('/app', function () {
    return view('index');
})->name('memo');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/tryLogin', [AuthController::class, 'login']);
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/app/store', [MemoController::class, 'store']);
Route::get('/getCurrentUser', [AuthController::class, 'getCurrentUser']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/app/getMemos', [MemoController::class, 'getMemos']);
Route::post('/app/delete', [MemoController::class, 'delete']);
Route::put('/app/{id}', [MemoController::class, 'edit']);
