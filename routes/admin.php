<?php

use App\Http\Controllers\AdminController;
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

Route::get('/admin', [AdminController::class, 'index'])->name('Admin');
Route::get('/admin/addlisting', [AdminController::class, 'addListing'])->name('addListing');
Route::get('/admin/listings', [AdminController::class, 'listings'])->name('Listings');
Route::get('/admins/stats', [AdminController::class, 'stats'])->name('Stats');

