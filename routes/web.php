<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DivisasController as Divisas;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('Divisas')->group(function () {
    Route::get('/symbols', [Divisas::class, 'Symbols']);
    Route::get('/convert/{to?}/{from?}/{amount?}', [Divisas::class, 'Convert']);
});
