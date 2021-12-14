<?php

use App\Http\Controllers\MainController;
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
})->name('/');

Route::get('/register', [MainController::class, 'register'])->name('register');
Route::post('/do_register', [MainController::class, 'do_register'])->name('do_register');
Route::post('/do_login', [MainController::class, 'do_login'])->name('do_login');
