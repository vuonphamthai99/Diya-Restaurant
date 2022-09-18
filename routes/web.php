<?php
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;


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

Route::get('/login',[LoginController::class,'showLogin']);