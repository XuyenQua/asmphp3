<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PromotionController;


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

Route::prefix('/')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('index');
    Route::get('/cart', [ClientController::class, 'cart'])->name('cart');
    Route::get('/shop', [ClientController::class, 'shop'])->name('shop');
    Route::get('/{id}/client_category', [ClientController::class, 'client_category'])->name('client_category');
    Route::get('/checkout', [ClientController::class, 'checkout'])->name('checkout');
    Route::get('/{id}/pro_detail', [ClientController::class,'pro_detail'])->name('pro_detail');
    Route::get('/client/login', [ClientController::class,'client_login'])->name('client_login');


});

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'postRegister'])->name('postRegister');

Route::get('/admin/login', [UserController::class, 'login'])->name('login');
Route::post('/admin/login', [UserController::class, 'postLogin'])->name('postLogin');

Route::post('logout', [UserController::class, 'logout'])->name('logout');

Route::prefix('admin/')
    ->name('admin.')
    ->middleware('employee')
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
                Route::get('{id}/show', 'show')
                    ->name('show');
            });

        Route::controller(BillController::class)
            ->name('bill.')
            ->prefix('bill/')
            ->group(function () {
                Route::get('/', 'index')
                    ->name('index');
                Route::get('{id}/edit', 'edit')
                    ->name('edit');
                Route::put('{id}/update', 'update')
                    ->name('update');
                Route::get('{id}/show', 'show')
                    ->name('show');
            });

        Route::controller(EmployeeController::class)
            ->name('employee.')
            ->prefix('employee/')
            ->middleware('admin')
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
