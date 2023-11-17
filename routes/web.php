<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/login', 'getLogin');
    Route::get('/register', 'getRegister');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'create');
    Route::post('/register', 'store');
    Route::get('/login', 'createLogin');
    Route::post('/login', 'storelogin');
});

Route::controller(AdminController::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', 'index');

        Route::controller(CategoryController::class)->prefix('category')->group(function () {
            Route::get('/create', 'create');
            Route::post('/create', 'store');
            Route::get('/', 'index');
            Route::get('/{id}', 'detail');
            Route::put('/edit/{id}', 'update');
            Route::get('/edit/{id}', 'edit');
            Route::delete('/admin/category/{id}', 'destroy')->name('admin.categories.destroy');
        });
    });
});
