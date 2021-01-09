<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Profile\BusinessProfile;

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
Route::group(['middleware' => ['verified', 'checkBusinessProfile']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/business-profile', [BusinessProfile::class, 'index']);

});
 Route::get('/complete-business-profile', [BusinessProfile::class, 'completeBusinessProfile'])->name('completeBusinessProfile');
 Route::post('/completeProfile', [BusinessProfile::class, 'completeProfile'])->name('completeProfile');
