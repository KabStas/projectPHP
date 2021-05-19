<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/info', [App\Http\Controllers\WebController::class, 'outputtingPHPInfo']);
Route::get('/ip', [App\Http\Controllers\WebController::class, 'checkingForIP']);
Route::get('/gif', [App\Http\Controllers\GifController::class, 'gif']);
Route::get('/user', [App\Http\Controllers\WebController::class, 'searchingData']);

// Route::middleware('phraseMiddleware')->group(function () {
//     Route::get('/user', [App\Http\Controllers\WebController::class, 'searchingData']);
// });

Route::middleware('phraseMiddleware')->group(function () {
    Route::get('/check', [App\Http\Controllers\WebController::class, 'checkingForPalindrome']);
});