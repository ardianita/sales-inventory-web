<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemSaleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
    return view('landing-page');
})->name('landing-page');

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Route::middleware(['auth'])->group(function () {
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('customers')->controller(CustomerController::class)->name('customer.')->group(function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id_customer}/edit', 'edit')->name('edit');
    Route::patch('/{id_customer}', 'update')->name('update');
    Route::get('/', 'index')->name('index');
    Route::get('/{id_customer}', 'show')->name('show');
    Route::delete('/{id_customer}', 'destroy')->name('destroy');
});

Route::prefix('sales')->controller(SaleController::class)->name('sale.')->group(function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id_sale}/edit', 'edit')->name('edit');
    Route::patch('/{id_sale}', 'update')->name('update');
    Route::get('/', 'index')->name('index');
    Route::get('/{id_sale}', 'show')->name('show');
    Route::delete('/{id_sale}', 'destroy')->name('destroy');
});

Route::prefix('items')->controller(ItemController::class)->name('item.')->group(function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id_item}/edit', 'edit')->name('edit');
    Route::patch('/{id_item}', 'update')->name('update');
    Route::get('/', 'index')->name('index');
    Route::get('/{id_item}', 'show')->name('show');
    Route::delete('/{id_item}', 'destroy')->name('destroy');
});

Route::prefix('sales/{id_sale}/item-sales')->controller(ItemSaleController::class)->name('item-sale.')->group(function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::patch('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
});
// });

// require __DIR__ . '/auth.php';
