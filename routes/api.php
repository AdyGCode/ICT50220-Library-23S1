<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\GenreApiController;
use App\Http\Controllers\API\LanguageApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/* Resourceful Route for Languages, and other Models */
Route::resource('languages', LanguageApiController::class);
//Route::resource('formats', FormatApiController::class);
Route::resource('genres', GenreApiController::class);
//Route::resource('countries', CountryApiController::class);
//Route::resource('authors', AuthorApiController::class);
//Route::resource('publishers', PublisherApiController::class);
//Route::resource('item-statuses', ItemStatusApiController::class);
