<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

    // route public
    Route::post('/register',[AuthController::class,'register']);
    Route::post('/login',[AuthController::class,'login']);

    Route::middleware(['auth:sanctum'])
    ->controller(AuthController::class)->group(function(){
        Route::get('/profile','me');
        Route::get('/dashboard',function(){
            return "test";
        });
    });


?>