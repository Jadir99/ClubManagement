<?php

use App\Http\Controllers\adehrantController;
use App\Http\Controllers\feedbackController;
use App\Http\Controllers\ReclamationController;
use App\Models\Reclamation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('/reclamation', ReclamationController::class);
Route::resource('/feedback', feedbackController::class);
Route::resource('/profile',adehrantController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
