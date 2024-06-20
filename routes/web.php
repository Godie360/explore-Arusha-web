<?php

use App\Http\Controllers\Admin\DashboardContrller;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\GalleriesController;
use App\Http\Controllers\Admin\NewsCategoryController as AdminNewsCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\VendorController as AdminVendorController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Users\DashboardController;
use App\Http\Controllers\Users\ServicesController;
use App\Http\Controllers\ListController; 
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\Users\StaffsController;
use App\Http\Controllers\Users\StaffTypeController;
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
    Route::resource('listing', ListController::class);
    Route::get('/list-detail', [ListController::class, 'detail'])->name('listing.detail');
    Route::get('/listing-list', [ListController::class, 'listing_list'])->name('listing.listing_list');
    Route::resource('explore', ExploreController::class);
    Route::get('/explore-detail', [ExploreController::class, 'explore_detail'])->name('explore.explore-details');




    Route::group(['as' => 'vendor.', 'prefix' => 'vendor'], function () {
        Route::get('/registration', [VendorController::class, 'registration'])->name('registration.index');
        Route::post('/registration', [VendorController::class, 'registration_store'])->name('registration.store');
        Route::get('/fetch_districts', [VendorController::class, 'fetch_districts'])->name('registration.fetch_districts');
    });

    Route::group(['as' => 'users.', 'prefix' => 'users', 'middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified']], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/profile', [DashboardController::class, 'profile'])->name('profile.index');
        Route::post('/profile', [DashboardController::class, 'profile_store'])->name('profile.store');
        Route::post('/change-password', [DashboardController::class, 'change_password'])->name('change.password');
        Route::resource('staff-type', StaffTypeController::class);
        Route::resource('staffs', StaffsController::class);
        Route::resource('services', ServicesController::class);
    });
});


Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified']], function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');

    Route::group(['prefix' => 'news-updates'], function () {
        Route::get('/news/status/{id}', [AdminNewsController::class, 'status'])->name('news.status');
        Route::resource('news-categories', AdminNewsCategoryController::class);
        Route::resource('news', AdminNewsController::class);
    });
    Route::delete('/galleries/file-delete', [GalleriesController::class, 'file_delete'])->name('galleries.file_delete');
    Route::resource('galleries', GalleriesController::class);
    Route::resource('vendors', AdminVendorController::class);
});
