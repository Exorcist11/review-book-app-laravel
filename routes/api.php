<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublisherController;
use App\Http\Resources\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteUri;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/v1/categories', 'index');
    Route::get('/v1/caegories/{id}', 'show');
    Route::post('/v1/categories', 'store');
    Route::put('/v1/categoryUpdate/{id}', 'update');
    Route::delete('/v1/categoryDel/{id}', 'destroy');
});

Route::controller(PublisherController::class)->group(function () {
    Route::get('/v1/publisher', 'index');
    Route::get('/v1/publisher/{id}', 'show');
    Route::post('/v1/publisher', 'store');
    Route::put('/v1/publisherUpdate/{id}', 'update');
    Route::delete('/v1/publisherDel/{id}', 'destroy');
});

Route::controller(AuthorController::class)->group(function () {
    Route::get('/v1/author', 'index');
    Route::get('/v1/author/{id}', 'show');
    Route::post('/v1/author', 'store');
    Route::put('/v1/authorUpdate/{id}', 'update');
    Route::delete('/v1/authorDel/{id}', 'destroy');
});

Route::controller(BookController::class)->group(function () {
    Route::get('/v1/book', 'index');
    Route::get('/v1/book/{id}', 'show');
    Route::post('/v1/book', 'store');
    Route::put('/v1/bookUpdate/{id}', 'update');
    Route::delete('/v1/bookDelete/{id}', 'destroy');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/v1/register', 'register');
});
