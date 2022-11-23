<?php
use App\Http\Controllers\GuestController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MyLoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TableController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[MyLoginController::class,'showLogin']);
Route::get('/login',[MyLoginController::class,'showLogin'])->name('showLogin');
Route::post('/authLogin', [MyLoginController::class,'authCheck'])->name('authLogin');

// Guest routes
Route::get('/customer',[GuestController::class,'index']);
Route::post('/bookTable',[GuestController::class,'bookTable'])->name('bookTable');
// Staff routes



Route::group(['prefix'=>'user','middleware'=>['isLoggedIn']],function(){
    Route::get('/Dashboard',[MyLoginController::class,'showDashboard'])->name('showDashboard');
    Route::get('/logout',[MyLoginController::class,'logout'])->name('logout');
    Route::get('/user-list',[UserController::class,'showListUser'])->name('showListUser');
    Route::get('/showAddUser',[UserController::class,'showAddUser'])->name('showAddUser');
    Route::get('/showListUserRole',[UserController::class,'showListUserRole'])->name('showListUserRole');
    Route::get('/actionOnUser/{id}/{action}', [UserController::class,'actionHandler'])->name('actionOnUser');
    Route::get('/userProfile',[UserController::class,'showUserProfile'])->name('showUserProfile');
    Route::get('/showChangePassword',[UserController::class,'showChangePassword'])->name('showChangePassword');
    // Route::post('/authLogin', [MyLoginController::class,'authCheck'])->name('authLogin');
    Route::post('/addNewUser', [UserController::class,'addNewUser'])->name('addNewUser');
    Route::post('/editUserProfile',[UserController::class,'editUserProfile'])->name('editUserProfile');
    Route::post('/storeChangePassword',[UserController::class,'storeChangePassword'])->name('storeChangePassword');

    // Quản lý Menu
    Route::group(['prefix' => 'menu-manage'],function(){
        Route::get('/showListType',[MenuController::class,'showListType'])->name('showListType');
        Route::get('/showDetailMenuType',[MenuController::class,'showDetailMenuType'])->name('showDetailMenuType');
        Route::get('/showEditMenuType/{idType}',[MenuController::class,'showEditMenuType'])->name('showEditMenuType');
        Route::post('/storeType',[MenuController::class,'storeType'])->name('storeType');
        Route::get('/showListMenu',[MenuController::class,'showListMenu'])->name('showListMenu');
        Route::get('/showDetailMenu',[MenuController::class,'showDetailMenu'])->name('showDetailMenu');
        Route::get('/showEditMenu/{idMenu}',[MenuController::class,'showEditMenu'])->name('showEditMenu');
        Route::post('/storeMenu',[MenuController::class,'storeMenu'])->name('storeMenu');
    });

    // Quản lý bàn
    Route::group(['prefix'=> 'table-manage'],function(){
        Route::get('showListTable',[TableController::class,'showListTable'])->name('showListTable');
        Route::get('showDetailTable',[TableController::class,'showDetailTable'])->name('showDetailTable');
        Route::get('showEditTable/{idTable}',[TableController::class,'showEditTable'])->name('showEditTable');
        Route::post('/storeTable',[TableController::class,'storeTable'])->name('storeTable');
    });

    //Quản lý order
    Route::group(['prefix'=> 'order-manage'],function(){
        Route::get('showOrderPage',[OrderController::class,'showOrderPage'])->name('showOrderPage');
        Route::post('fetchMenuData',[OrderController::class,'fetchMenuData']);
        Route::post('addOrder',[OrderController::class,'addOrder']);
        Route::post('getOrderDetails',[OrderController::class,'getOrderDetailsByTable']);
        Route::post('checkout',[OrderController::class,'checkout']);


        Route::get('showOrderHistory',[OrderController::class,'showOrderHistory'])->name('showOrderHistory');
        Route::post('getOrderDetailsById',[OrderController::class,'getOrderDetails']);
    });

    //Đặt bàn
    Route::group(['prefix' => 'reservation-manage'],function(){
        Route::get('showReservationList',[ReservationController::class,'showReservationList'])->name('showReservationList');
    });



});
