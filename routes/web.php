<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KitchenStaffController;
use App\Http\Controllers\Admin\RestaurantStaffController;
use App\Http\Controllers\Login\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FoodItemControllerr;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\AfterPayController;
use App\Http\Controllers\FrontEnd\FROrderItemController;
use App\Http\Controllers\FrontEnd\FRPaymentController;
use App\Http\Controllers\FrontEnd\FRReservationController;
use App\Http\Controllers\WelcomeController;
use App\Models\Payment;

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

Route::get('/', [WelcomeController::class, 'index'])->name('home.welcome');

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
  Route::resource('/reservations', ReservationController::class, ['parameters' => ['reservation' => 'reservations']]);
  Route::resource('/payments', PaymentController::class);
  Route::resource('/order_items', OrderController::class);
  Route::resource('/customer', CustomerController::class,  ['parameters' => ['customer' => 'customers']]);
});

// Reservation route
Route::get('/reservation', [FRReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservation/store', [FRReservationController::class, 'store'])->name('reservation.store');

// Payments food
Route::get('/payments', [FRPaymentController::class, 'index'])->name('payment.index');
Route::get('/foodpayments', [FRPaymentController::class, 'foodpayments'])->name('payment.food');
Route::get('/foodpayments/bill', [FRPaymentController::class, 'bill'])->name('payment.bill');
Route::post('/payments/store', [FRPaymentController::class, 'store'])->name('payment.store');
Route::get('/payments/struk/{id_invoice}', [PaymentController::class, 'strukpembelian'])->name('print.struk');



// Order items
Route::get('/order_item', [FROrderItemController::class, 'index'])->name('orderi.index');
Route::post('/order_item/store', [FROrderItemController::class, 'store'])->name('orderi.store');



















// print
Route::get('/kitchenstaff/pdf', [KitchenStaffController::class, 'pdf'])->middleware('auth')->name('ks.print');
Route::get('/restaurantstaff/pdf', [RestaurantStaffController::class, 'pdf'])->middleware('auth')->name('rs.print');
Route::get('/menu/pdf', [FoodItemControllerr::class, 'pdf'])->middleware('auth')->name('menu.print');
Route::get('/reservations/pdf', [ReservationController::class, 'pdf'])->middleware('auth')->name('reservation.print');
Route::get('/payments/pdf', [PaymentController::class, 'pdf'])->middleware('auth')->name('payments.print');
Route::get('/order_items/pdf', [OrderController::class, 'pdf'])->middleware('auth')->name('orderitems.print');
Route::get('/customers/pdf', [CustomerController::class, 'pdf'])->middleware('auth')->name('customer.print');





