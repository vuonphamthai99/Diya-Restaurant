<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MyLoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsLoggedIn;
use App\Models\Order;
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


// Staff routes
Route::get('test/{idOrder}',[OrderController::class,'printOrder']);


Route::group(['prefix'=>'user','middleware'=>['isLoggedIn','isBackendUser','checkLocked']],function(){

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
        Route::get('deleteMenu/{idMenu}',[MenuController::class,'deleteMenu'])->name('deleteMenu');
        Route::get('deleteType/{idType}',[MenuController::class,'deleteType'])->name('deleteType');
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
        Route::get('getOrderDetailsById/{idOrder}',[OrderController::class,'getOrderDetailsById'])->name('getOrderDetailsById');
        // online
        Route::get('showOrderOnlineList',[OrderController::class,'showOrderOnlineList'])->name('showOrderOnlineList');
        Route::get('confirmOrder/{idOrder}',[OrderController::class,'confirmOrder'])->name('confirmOrder');
        Route::get('deleteOrder/{idOrder}',[OrderController::class,'deleteOrder'])->name('deleteOrder');


    });

    //Đặt bàn
    Route::group(['prefix' => 'reservation-manage'],function(){
        Route::get('showReservationList',[ReservationController::class,'showReservationList'])->name('showReservationList');
        Route::get('confirmReservation/{idRes}',[ReservationController::class,'confirmReservation'])->name('confirmReservation');
        Route::get('cancelReservation/{idRes}',[ReservationController::class,'cancelReservation'])->name('cancelReservation');

    });

});

Route::group(['prefix' => 'guest-page','middleware' =>['isGuest','checkLockedGuest']],function(){
    Route::post('register-guest',[GuestController::class,'registerGuest'])->name('registerGuest');
    Route::get('logout-guest',[GuestController::class,'logoutGuest'])->name('logoutGuest');
    Route::get('main-page',[GuestController::class,'index'])->name('guest-page');
    Route::post('login-guest',[GuestController::class,'loginGuest'])->name('loginGuest');
    Route::post('/bookTable',[ReservationController::class,'bookTable'])->name('bookTable');
    Route::get('address',[AddressController::class,'showAddress'])->name('showAddress')->middleware('isGuestLoggedIn');
    // Order Online
    Route::get('guestCheckout',[OrderController::class,'guestCheckout'])->name('guestCheckout')->middleware('isGuestLoggedIn');
    Route::post('fetchCartData',[OrderController::class,'fetchCartData']);
    Route::post('storeCartData',[OrderController::class,'storeCartData']);
    Route::post('storeAddress',[AddressController::class,'storeAddress'])->name('storeAddress');
    Route::post('GuestCheckoutPayment',[OrderController::class,'GuestCheckoutPayment'])->name('GuestCheckoutPayment');
    Route::get('paypalPayment',[PaymentController::class,'PayPalPayment'])->name('paypalPayment');
    Route::get('success',[PaymentController::class, 'success'])->name('success');
    Route::get('error',[PaymentController::class, 'error'])->name('error');
    Route::get('order-list',[OrderController::class,'showOrderList'])->name('showOrderList');
    Route::get('orderDetails/{idOrder}',[OrderController::class,'showOrderDetails'])->name('showOrderDetails');
    Route::get('cancelOrder/{idOrder}',[OrderController::class,'cancelOrder'])->name('cancelOrder');
    Route::get('confirmCancelOrder/{idOrder}',[OrderController::class,'confirmCancelOrder'])->name('confirmCancelOrder');
    Route::get('confirmReceiveOrder/{idOrder}',[OrderController::class,'confirmReceiveOrder'])->name('confirmReceiveOrder');

    // Account Information
    Route::get('account',[GuestController::class,'showAccountInfo'] )->name('showAccountInfo');
    Route::post('editAccount',[GuestController::class,'editAccount'] )->name('editAccount');
    Route::get('changePassword',[GuestController::class,'changePassword'] )->name('changePassword');
    Route::post('saveChangePassword',[GuestController::class,'saveChangePassword'] )->name('saveChangePassword');

    // reservation management
    Route::get('reservation',[ReservationController::class,'GuestReservation'])->name('GuestReservation');
});



