<?php

use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\UserController;


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

Route::get('/', function () {
    return view('client.home');
});



Route::prefix('admin/')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        Route::controller(CategoryController::class)
            ->name('category.')
            ->prefix('category/')
            ->group(function () {
                Route::get('/', 'index')
                    ->name('index');
                Route::get('create', 'create')
                    ->name('create');
                Route::post('store', 'store')
                    ->name('store');
                Route::get('{id}/show', 'show')
                    ->name('show');
                Route::get('{id}/edit', 'edit')
                    ->name('edit');
                Route::put('{id}/update', 'update')
                    ->name('update');
                Route::delete('{id}/destroy', 'destroy')
                    ->name('destroy');
            });

        Route::controller(ProductController::class)
            ->name('product.')
            ->prefix('product/')
            ->group(function () {
                Route::get('/', 'index')
                    ->name('index');
                Route::get('create', 'create')
                    ->name('create');
                Route::post('store', 'store')
                    ->name('store');
                Route::get('{id}/edit', 'edit')
                    ->name('edit');
                Route::put('{id}/update', 'update')
                    ->name('update');
                Route::delete('{id}/destroy', 'destroy')
                    ->name('destroy');
                Route::get('{id}/show', 'show')
                    ->name('show');
            });
        Route::controller(PromotionController::class)
            ->name('promotion.')
            ->prefix('promotion/')
            ->group(function () {
                Route::get('/', 'index')
                    ->name('index');
                Route::get('create', 'create')
                    ->name('create');
                Route::post('store', 'store')
                    ->name('store');
                Route::get('{id}/edit', 'edit')
                    ->name('edit');
                Route::put('{id}/update', 'update')
                    ->name('update');
                Route::delete('{id}/destroy', 'destroy')
                    ->name('destroy');
                Route::get('{id}/show', 'show')
                    ->name('show');
            });

        Route::controller(BannerController::class)
            ->name('banner.')
            ->prefix('banner/')
            ->group(function () {
                Route::get('/', 'index')
                    ->name('index');
                Route::get('create', 'create')
                    ->name('create');
                Route::post('store', 'store')
                    ->name('store');
                Route::get('{id}/edit', 'edit')
                    ->name('edit');
                Route::put('{id}/update', 'update')
                    ->name('update');
                Route::delete('{id}/destroy', 'destroy')
                    ->name('destroy');
                Route::get('{id}/show', 'show')
                    ->name('show');
            });
        Route::controller(UserController::class)
            ->name('user.')
            ->prefix('user/')
            ->group(function () {
                Route::get('/', 'index')
                    ->name('index');
                Route::get('create', 'create')
                    ->name('create');
                Route::post('store', 'store')
                    ->name('store');
                Route::get('{id}/edit', 'edit')
                    ->name('edit');
                Route::put('{id}/update', 'update')
                    ->name('update');
                Route::delete('{id}/destroy', 'destroy')
                    ->name('destroy');
                Route::get('{id}/show', 'show')
                    ->name('show');
            });
    });
