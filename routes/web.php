<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Voyager\OrderController;

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

    Route::get('/orders/create-pdf', [OrderController::class, 'getAllOrders']);
    Route::get('/order/create-pdf', [OrderController::class, 'getOrder']);

    Route::group(['prefix' => 'admin'], function () {
        Route::get('items/approve','App\Http\Controllers\Voyager\ItemController@approveItem')->name('items.approve');
        Voyager::routes();
    });
