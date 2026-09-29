<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Sens PNG - Public Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [WebsiteController::class, 'home'])->name('home');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');

// Products & Brands
Route::get('/products', [WebsiteController::class, 'products'])->name('products');
Route::get('/products/category/{category}', [WebsiteController::class, 'products'])->name('products.category');
Route::get('/product/{slug}', [WebsiteController::class, 'productDetail'])->name('products.show');
Route::get('/brands/{slug}', [WebsiteController::class, 'brandDetail'])->name('brands.show');

// Logistics, Leadership & Resources
Route::get('/distribution', [WebsiteController::class, 'distribution'])->name('distribution');
Route::get('/leadership', [WebsiteController::class, 'leadership'])->name('leadership');
Route::get('/downloads', [WebsiteController::class, 'downloads'])->name('downloads');
Route::get('/download/{id}', [WebsiteController::class, 'downloadFile'])->name('download.file');

// B2B Wholesale Contact & Enquiry Funnel
Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
Route::post('/enquiry', [WebsiteController::class, 'submitEnquiry'])->name('enquiry.submit');
Route::get('/track-enquiry', [WebsiteController::class, 'trackEnquiry'])->name('enquiry.track');

/*
|--------------------------------------------------------------------------
| Sens PNG - Admin CMS Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/login', fn () => redirect()->route('admin.login'))->name('login');
Route::post('/admin/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/enquiries', [AdminController::class, 'enquiries'])->name('enquiries');
    Route::patch('/enquiries/{id}', [AdminController::class, 'updateEnquiry'])->name('enquiries.update');
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::get('/brands', [AdminController::class, 'brands'])->name('brands');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    Route::post('/settings', [AdminController::class, 'updateSetting'])->name('settings.update');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
});
