<?php

use App\Http\Controllers\Admin\DashboardContrller;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\NewsCategoryController as AdminNewsCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Users\DashboardController;
use App\Http\Controllers\Users\StaffsController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\WebController;
use App\View\Components\VendorLayout;
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

Route::group(['as' => 'web.'], function () {
    Route::get('/', [WebController::class, 'index'])->name('index');
    Route::get('/about-us', [WebController::class, 'about_us'])->name('about_us');
    Route::get('/contact-us', [WebController::class, 'contact_us'])->name('contact_us');
    Route::post('/contact-us', [WebController::class, 'contact_us_store'])->name('contact_us_store');
    Route::get('/complaints', [WebController::class, 'complaints'])->name('complaints.index');
    Route::post('/complaints', [WebController::class, 'complaints_store'])->name('complaints.store');
    Route::resource('news', NewsController::class);
    Route::group(['as' => 'vendor.', 'prefix' => 'vendor'], function () {
        Route::get('/registration', [VendorController::class, 'registration'])->name('registration.index');
        Route::post('/registration', [VendorController::class, 'registration_store'])->name('registration.store');
        Route::get('/fetch_districts', [VendorController::class, 'fetch_districts'])->name('registration.fetch_districts');
    });

    Route::group(['as' => 'users.', 'prefix' => 'users', 'middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified']], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::resource('staff', StaffsController::class);
    });
});


Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified']], function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');

    Route::group(['prefix' => 'news-updates'], function () {
        Route::resource('news-categories', AdminNewsCategoryController::class);
        Route::resource('news', AdminNewsController::class);
    });
});
