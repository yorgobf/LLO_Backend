<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ReservationController;

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

Route::post('/register', [UserAuthController::class,'register']);
Route::post('/login', [UserAuthController::class,'login']);

Route::post('/update/{id}', [UserAuthController::class,'update'])->middleware('auth:api');
Route::post('/updateprofilephoto/{id}', [UserAuthController::class,'updateProfile'])->middleware('auth:api');
Route::get('/profile/{id}', [UserAuthController::class,'getProfile'])->middleware('auth:api');
Route::get('/getUser/{username}', [UserAuthController::class,'getUser']);//->middleware('auth:api');

Route::post('/addbusiness', [BusinessController::class,'addbusiness'])->middleware('auth:api');
Route::get('/list', [BusinessController::class,'list']);
Route::get('/getBusinessByOwner/{id}', [BusinessController::class,'getBusinessByOwner']);
Route::delete('/delete/{id}', [BusinessController::class,'destroy']);

Route::post('/addreservation', [ReservationController::class,'addReservation']);
Route::get('/getReservationBybid/{id}', [ReservationController::class,'show']);


