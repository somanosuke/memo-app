<?php

use App\Http\Controllers\Auth\AuthController;
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
    return view('app');
})->name('memo');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/tryLogin', [AuthController::class, 'login']);
Route::get('/getCurrentUser', [AuthController::class, 'getCurrentUser']);
