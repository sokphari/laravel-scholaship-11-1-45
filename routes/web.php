<?php

use App\Http\Controllers\User\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test',function(){
    return 'test1';
});
Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard',function(){
        return 'dashboard';
    })->name('dashboard');
});

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'storeLogin'])->name('login');
Route::get('/register',[AuthController::class,'register']);
Route::post('/register',[AuthController::class,'storeRegister'])->name('register');