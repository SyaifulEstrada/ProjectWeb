<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KitchenStaffController;
use App\Http\Controllers\Admin\RestaurantStaffController;
use App\Http\Controllers\Login\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FoodItemControllerr;

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
    return view('welcome', [
      'title' => 'Home'
    ]);
});

// Login Routes

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Dashboard Routes
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');


// Routes grouping for CRUD
Route::group((['middleware' => 'auth', 'prefix' => 'admin', 'name' => 'admin.']), function () {
  Route::resource('/kitchenstaff', KitchenStaffController::class, ['parameters' => ['kitchenstaff' => 'kitchen_staffs']]);
  Route::resource('/restaurantstaff', RestaurantStaffController::class,  ['parameters' => ['restaurantstaff' => 'staffrestaurant']]);
  Route::resource('/menu', FoodItemControllerr::class);
});

// Route::middleware('auth')->group(function () {
//   Route::resource('/kitchenstaff', KitchenStaffController::class);
// })->prefix('admin')->name('admin.');

