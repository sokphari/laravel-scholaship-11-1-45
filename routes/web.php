<?php

use App\Http\Controllers\Customer\CustomerController;
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

//$_get,post
//get , post , put , delete , patch

Route::get('/', function () {
    return view('welcome');
});
//single route and public route
Route::get('/user',function(){
    return 'Welcome to User Page';
});
// route with parameter
Route::get('/customer/{id}',function(int $id){
    return 'customer : '.$id;
});
// protected route :: /admin/dashboard
Route::prefix('admin')->group(function(){
    Route::get('/dashboard',function(){
        return 'admin dashboard';
    });
    Route::get('/Home',function(){
        return 'admin home page';
    });
});

//Route::middleware(['auth','role:admin,customer,staff'])->group(function(){
//
//});

Route::middleware(['throttle:5,1'])->group(function(){
    Route::get('/test',function(){
        return 'bad request';
    });
});


#Route::get('/index',function(){
#    return view('index');
#});

#Route::prefix('admin')->group(function(){
#    route::get('/dashboard',function(){
#        return view('admin.dashboard');
#    });
#});

Route::get('/index',[CustomerController::class,'index']);
Route::prefix('admin')->group(function(){
    Route::get('/dashboard',[CustomerController::class,'dashboard']);
});
