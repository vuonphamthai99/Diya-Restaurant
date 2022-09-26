<?php
use App\Http\Controllers\GuestController;
use App\Http\Controllers\MyLoginController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsLoggedIn;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Guest routes
Route::get('/customer',[GuestController::class,'index']);

// Staff routes

Route::get('/login',[MyLoginController::class,'showLogin'])->name('showLogin');
Route::post('/authLogin', [MyLoginController::class,'authCheck'])->name('authLogin');
Route::get('/Dashboard',[MyLoginController::class,'showDashboard'])->name('showDashboard');
Route::get('/logout',[MyLoginController::class,'logout'])->name('logout');

Route::group(['prefix'=>'user','middleware'=>['isLoggedIn']],function(){
    Route::get('/user-list',[UserController::class,'showListUser'])->name('showListUser');
    Route::post('/addNewUser', [UserController::class,'addNewUser'])->name('addNewUser');
    Route::get('/showListUserRole',[UserController::class,'showListUserRole'])->name('showListUserRole');
    Route::get('/actionOnUser/{id}/{action}', [UserController::class,'actionHandler'])->name('actionOnUser');
});
