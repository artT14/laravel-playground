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
Route::get('/', [ListingController::class, 'index'])->name('home');

// Store Listing Form Data 
Route::post('/listings' , [ListingController::class,'store'])->middleware('auth');

// Show Create Form
Route::get('/listings/create' , [ListingController::class,'create'])->middleware('auth');


// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Single listings
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Edit listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Update listing
Route::put('/listings/{listing}', [ListingController::class,'update'])->middleware('auth');

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

// Log Out
Route::post('/logout', [UserController::class,'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log in user
Route::post('/users/authenticate', [UserController::class,'authenticate'])->middleware('guest');
