<?php
use App\Http\Controllers\GuestController;
use App\Http\Controllers\MenuController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[MyLoginController::class,'showLogin']);
Route::get('/login',[MyLoginController::class,'showLogin'])->name('showLogin');
Route::post('/authLogin', [MyLoginController::class,'authCheck'])->name('authLogin');

// Guest routes
Route::get('/customer',[GuestController::class,'index']);

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

    // Quản lý menu
    Route::group(['prefix' => 'menu-manage'],function(){
        Route::get('/showListType',[MenuController::class,'showListType'])->name('showListType');
        Route::get('/showDetailMenuType',[MenuController::class,'showDetailMenuType'])->name('showDetailMenuType');
        Route::get('/showEditMenuType/{idType}',[MenuController::class,'showEditMenuType'])->name('showEditMenuType');

        Route::get('showListMenu',[MenuController::class,'showListMenu'])->name('showListMenu');

        Route::post('/storeType',[MenuController::class,'storeType'])->name('storeType');
    });



});
