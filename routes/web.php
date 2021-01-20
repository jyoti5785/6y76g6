<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Business\BlogController;
use App\Http\Controllers\Business\ConnectionController;
use App\Http\Controllers\Business\OrderController;
use App\Http\Controllers\Business\StoreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Profile\BusinessProfile;
use Illuminate\Support\Facades\Auth;
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
Auth::routes(['verify' => true]);
// $domain = 'admin';
Route::group(['middleware' => ['verified']], function () {
    Route::group(['middleware' => ['checkAccount']], function () {
        Route::group(['middleware' => ['checkBusinessProfile']], function () {
            Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
            Route::get('/business-profile', [BusinessProfile::class, 'index'])->name('business-profile');
            Route::get('/business-catalogue', [BlogController::class, 'index'])->name('business-catalogue');
            Route::get('/business-store', [StoreController::class, 'index'])->name('business-store');
            Route::get('/business-connection', [ConnectionController::class, 'index'])->name('business-connection');
            Route::get('/business-order', [OrderController::class, 'index'])->name('business-order');
        });
    });
    Route::get('/complete-business-profile', [BusinessProfile::class, 'completeBusinessProfile'])->name('completeBusinessProfile');
    Route::post('/completeProfile', [BusinessProfile::class, 'completeProfile'])->name('completeProfile');
    Route::post('/ajax-workspace', [AjaxController::class, 'workspace']);
    Route::get('/404', [AjaxController::class, 'notFound'])->name('404');
});


