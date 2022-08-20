<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Test Route
    Route::get('/test', [ApiController::class, 'importCSV']);

//{GET} Listing API Routes For App
    Route::get('/listings/{long}/{lat}/{radius}', [ApiController::class, 'listings']);

    Route::get('/listings', [ApiController::class, 'AllListings'])->name('AllListings');
    
    Route::get('/listing/{id}', [ApiController::class, 'GetListing'])->name('GetListing');

// {GET} Event API Routes 
// This will show events happening near the user and will show until the date of the event
