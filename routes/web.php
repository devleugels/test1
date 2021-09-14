<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PersoonController;

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

Route::get('persoon/{id}/delete', [App\Http\Controllers\PersoonController::class, 'verwijder']);
Route::resource('persoon',  App\Http\Controllers\PersoonController::class);

