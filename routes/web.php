<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('', [HomeController::class, 'index'])->name('home');
Route::post('save-task', [HomeController::class, 'savetask'])->name('savetask');
Route::get('login', [HomeController::class, 'login'])->name('login');
Route::get('register', [HomeController::class, 'register'])->name('register');  
Route::get('edit/{id}', [HomeController::class, 'edit'])->name('edit');  
Route::get('logout', [HomeController::class, 'logout'])->name('logout');
Route::post('dologin', [HomeController::class, 'dologin'])->name('dologin');
Route::post('doregister', [HomeController::class, 'doregister'])->name('doregister');
Route::put('update/{id}', [HomeController::class, 'update'])->name('update');
Route::get('/delete/{id}', [HomeController::class, 'delete'])->name('delete');

