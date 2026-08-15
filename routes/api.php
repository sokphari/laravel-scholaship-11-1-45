<?php

use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->controller(UserController::class)
->group(function(){

    // index
    Route::get('/users','index');

    // store data user
    Route::post('/users/store','store');

    // show data
    Route::get('/users/{user}','show');

    //delete data
    Route::delete('/users/{user}','destroy');
});
