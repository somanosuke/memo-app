<?php

use App\Http\Controllers\MemoController;
use App\Http\Controllers\LoginController;
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
Route::get('/login', [LoginController::class, 'index'])->name('login');
