<?php

use App\Http\Controllers\Api\CountryController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/all-countries',[CountryController::class,'index'])->name('api.country.index');
Route::post('/store-countries',[CountryController::class,'store'])->name('api.country.store');
Route::get('/country/{countryCode}',[CountryController::class,'show'])->name('api.country.show');

