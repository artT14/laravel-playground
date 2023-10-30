<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

// All listings
Route::get('/', [ListingController::class, 'index']);

// Store Listing Form Data 
Route::post('/listings' , [ListingController::class,'store']);

// Show Create Form
Route::get('/listings/create' , [ListingController::class,'create']);

// Single listings
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Edit listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

// Update listing
Route::put('/listings/{listing}', [ListingController::class,'update']);

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create']);

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log Out
Route::post('/logout', [UserController::class,'logout']);

// Show Login Form
Route::get('/login', [UserController::class, 'login']);

// Log in user
Route::post('/users/authenticate', [UserController::class,'authenticate']);