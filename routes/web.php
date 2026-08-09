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

Route::get('/test', function () {
    return 'test1';
});
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'storeLogin'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'storeRegister'])->name('register');

// ================== Guest (not logged in) ==================
Route::middleware(['guest'])->group(function () {
});

// ================== Authenticated (any role) ==================
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// ================== Cashier + Admin ==================
// dashboard, listproduct, order, category, supplier, logout
Route::middleware(['auth', 'role:cashier,admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('cashier.dashboard');
    })->name('dashboard');

    Route::get('/listproduct', function () {
        return view('cashier.listproduct');
    })->name('listproduct');

    Route::get('/order', function () {
        return view('cashier.order');
    })->name('order');

    Route::get('/category', function () {
        return view('cashier.category');
    })->name('category');

    Route::get('/supplier', function () {
        return view('cashier.supplier');
    })->name('supplier');
});

// ================== Admin only (full access extras) ==================
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/users', function () {
        return view('admin.dashboard');
    })->name('admin.users');
});

// ================== User only ==================
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('users.dashboard');
    })->name('user.dashboard');
});
