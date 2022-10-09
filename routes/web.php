<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::prefix('customers')->controller(CustomerController::class)->name('customer.')->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id_customer}/edit', 'edit')->name('edit');
        Route::patch('/{id_customer}', 'update')->name('update');
        Route::get('/', 'index')->name('index');
        Route::get('/{id_customer}', 'show')->name('show');
        Route::delete('/{id_customer}', 'destroy')->name('destroy');
    });
});