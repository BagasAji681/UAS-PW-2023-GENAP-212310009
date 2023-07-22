<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AmelController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Authentication;
use App\Http\Middleware\Authenticate;


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



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AmelController::class, 'menust']);
Route::get('/about', [AmelController::class, 'about']);
Route::get('/contact', [AmelController::class, 'contact']);
Route::get('/menu-tidak-tetap', [AmelController::class, 'menutdk']);

Route::controller(Authentication::class)->group(function () {
    Route::get('/login','index')->name('login')->middleware('guest');
    Route::post('/login',  'authenticate')->middleware('guest'); 
});

Route::get('/logout', [Authentication::class, 'logout'])->middleware('auth');

Route::controller(ProductsController::class)->group(function (){
    Route::get('/admin', 'index')->name('m_menu')->middleware('auth');
    Route::post('/admin', 'store')->middleware('auth');
    Route::get('/admin/edit/{id}', 'edit')->name('m_menu_edit')->middleware('auth');
    Route::get('/admin/remove/{id}', 'destroy')->name('m_menu_remove')->middleware('auth');
});

