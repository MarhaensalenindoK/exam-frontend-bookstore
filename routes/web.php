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
            Route::get('/pasok-buku', [Controllers\AdminLaporanController::class, 'indexPasokBuku']);
            Route::get('/filter-pasok-buku', [Controllers\AdminLaporanController::class, 'indexFilterPasokBuku']);
            Route::post('/filter-pasok-buku', [Controllers\AdminLaporanController::class, 'filterByDistributor']);
            Route::get('/get-pasok', [Controllers\AdminLaporanController::class, 'getPasok']);
            Route::get('/filter-pasok-by-year', [Controllers\AdminLaporanController::class, 'pasokByYear']);

            Route::get('/input-buku', [Controllers\AdminInputController::class, 'indexInputBuku']);
            Route::post('/input-buku', [Controllers\AdminInputController::class, 'addBook']);
            Route::patch('/edit-buku', [Controllers\AdminInputController::class, 'editBook']);
            Route::delete('/delete-book/{id_buku}', [Controllers\AdminInputController::class, 'deleteBook']);

            Route::get('/input-distributor', [Controllers\AdminInputController::class, 'indexInputDistributor']);
            Route::post('/input-distributor', [Controllers\AdminInputController::class, 'addDistributor']);
            Route::patch('/input-distributor', [Controllers\AdminInputController::class, 'editDistributor']);
            Route::delete('/input-distributor', [Controllers\AdminInputController::class, 'deleteDistributor']);
        });
    });
    Route::group(['middleware' => ['check_login:kasir']],function(){
        Route::resource('kasir', KasirStoreController::class);
    });
    Route::group(['middleware' => ['check_login:manager']],function(){
        Route::resource('manager', ManagerStoreController::class);
    });
});
