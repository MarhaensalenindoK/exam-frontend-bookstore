<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers;
use App\Http\Controllers\AdminStoreController;
use App\Http\Controllers\KasirStoreController;
use App\Http\Controllers\ManagerStoreController;

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

Route::get('/login', [Controllers\AuthController::class, 'index']);
Route::post('/login', [Controllers\AuthController::class, 'login']);
Route::get('/logout', [Controllers\AuthController::class, 'logout']);

Route::group(['middleware' => ['auth']],function(){
    Route::group(['middleware' => ['check_login:admin']],function(){
        Route::prefix('admin')->group(function () {
            Route::resource('/', AdminStoreController::class);
            Route::get('/pasok-buku', [Controllers\AdminPasokBukuController::class, 'index']);
            Route::get('/filter-pasok-buku', [Controllers\AdminFilterPasokBukuController::class, 'index']);
            Route::post('/filter-pasok-buku', [Controllers\AdminFilterPasokBukuController::class, 'filterByDistributor']);
            Route::get('/get-pasok', [Controllers\AdminPasokBukuController::class, 'getPasok']);
            Route::get('/filter-pasok-by-year', [Controllers\AdminPasokBukuController::class, 'pasokByYear']);
        });
    });
    Route::group(['middleware' => ['check_login:kasir']],function(){
        Route::resource('kasir', KasirStoreController::class);
    });
    Route::group(['middleware' => ['check_login:manager']],function(){
        Route::resource('manager', ManagerStoreController::class);
    });
});
