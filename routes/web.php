<?php

use App\Http\Controllers\AdminController;
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


Route::group(['middleware' => ['auth']], function () {
    Route::get('/book_appointment', [MainController::class, 'book_appointment'])->name('book_appointment');
    Route::get('/logout', [MainController::class, 'logout'])->name('logout');
    Route::get('/all_appoints', [MainController::class, 'all_appoints'])->name('all_appoints');
    Route::post('/book_now', [MainController::class, 'book_now'])->name('book_now');
});

// AdminController routes
Route::group(['middleware' => ['is_admin']], function () {
    Route::get('admin.dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin.user_details', [AdminController::class, 'user_details'])->name('user_details');
    Route::get('admin.appoint_details', [AdminController::class, 'appoint_details'])->name('appoint_details');
    Route::post('edit_user', [AdminController::class, 'edit_user'])->name('edit_user');
    Route::get('delete_user', [AdminController::class, 'delete_user'])->name('delete_user');
    Route::get('admin.all_appointments', [AdminController::class, 'all_appointments'])->name('all_appointments');
    Route::get('approve', [AdminController::class, 'approve'])->name('approve');
    Route::get('cancel', [AdminController::class, 'cancel'])->name('cancel');
    Route::get('delete', [AdminController::class, 'delete'])->name('delete');
});
