<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SearchController;

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
Route::get('/',[HomeController::class, 'home']);

Route::get('/home',[HomeController::class, 'home']);

Route::get('/dashboard', [AdminController::class, 'show_dashboard']);

Route::get('/show-login',[LoginController::class, 'loginPage']);

Route::post('/login',[LoginController::class, 'loginAction']);

Route::get('/logout',[LoginController::class, 'logoutAction'])->name('home');

Route::get('/add-type', [TypeController::class, 'showPageAdd']);

Route::post('/add-type-action', [TypeController::class, 'addTypeAction']);

Route::get('/list-type', [TypeController::class, 'listType']);

Route::get('/delete-type/{id}', [TypeController::class, 'deleteType']);

Route::get('/inactive-type/{id}', [TypeController::class, 'inactiveType']);

Route::get('/active-type/{id}', [TypeController::class, 'activeType']);

Route::get('/edit-type/{id}', [TypeController::class, 'showPageEdit']);

Route::post('/update-type/{id}', [TypeController::class, 'update']);

Route::get('/list-users', [UsersController::class, 'listUsers']);

Route::get('/delete-user/{id}', [UsersController::class, 'deleteUser']);

Route::get('/show-register', [RegisterController::class, 'showRegister']);

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/add-room', [RoomController::class, 'showPageAdd']);

Route::post('/add-room-action', [RoomController::class, 'addRoomAction']);

Route::get('/list-room', [RoomController::class, 'listRoom']);

Route::get('/inactive-room/{id}', [RoomController::class, 'inactiveRoom']);

Route::get('/active-room/{id}', [RoomController::class, 'activeRoom']);

Route::get('/edit-room/{id}', [RoomController::class, 'showPageEdit']);

Route::post('/update-room/{id}', [RoomController::class, 'update']);

Route::post('/save-cart', [CartController::class, 'showCart']);

Route::get('/cart', [CartController::class, 'cart']);

Route::get('/delete-cart/{id}', [CartController::class, 'deleteCart']);

Route::post('/update-cart', [CartController::class, 'updateCart']);

Route::get('/checkout',[CheckOutController::class, 'checkout']);

Route::get('/manage-order',[OrderController::class, 'manager']);

Route::get('/delete-orders/{id}', [OrderController::class, 'delete_order']);

Route::post('/search', [SearchController::class, 'search']);
