<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\EcommerceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;

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

Route::get('/',[EcommerceController::class,'index'])->name('home');
Route::get('/shop/{id}',[EcommerceController::class,'shop'])->name('shop');
Route::get('/product-details/{id}',[EcommerceController::class,'productDetails'])->name('product-details');
Route::post('/cart/add/{id}',[CartController::class,'index'])->name('cart.add');
Route::get('/cart/show',[CartController::class,'show'])->name('cart.show');
Route::get('/cart/remove/{id}',[CartController::class,'remove'])->name('cart.remove');
Route::post('/cart/update/{id}',[CartController::class,'update'])->name('cart.update');
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('category');
        Route::post('/category', 'saveCategory')->name('new-category');
        Route::get('/edit-category/{id}', 'editCategory')->name('edit-category');
        Route::get('/publication-status/{id}', 'status')->name('publication-status');
        Route::post('/delete', 'categoryDelete')->name('delete-category');
    });
    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/sub-category', 'index')->name('sub-category');
        Route::post('/sub-category', 'saveSubCategory')->name('sub-category');
        Route::get('/edit-subcategory/{id}', 'editSubCategory')->name('edit-subcategory');
        Route::get('/publication-status-sub/{id}', 'subStatus')->name('publication-status-sub');
        Route::post('/delete-subcategory', 'deleteSubCategory')->name('delete-subcategory');
    });
    Route::controller(BrandController::class)->group(function () {
        Route::get('/brand', 'index')->name('brand');
        Route::post('/brand', 'saveBrand')->name('save-brand');
        Route::get('/edit-brand/{id}', 'editBrand')->name('edit-brand');
        Route::get('/publication-status-brand/{id}', 'brandStatus')->name('publication-status-brand');
        Route::post('/delete-brand', 'deleteBrand')->name('delete-brand');

    });
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product', 'index')->name('product');
        Route::post('/product', 'saveProduct')->name('save-product');
        Route::get('/edit-product/{id}', 'editProduct')->name('edit-product');
        Route::get('/manage-product', 'manageProduct')->name('manage-product');
        Route::get('admin-product-details/{id}', 'detailsProduct')->name('product-details-admin');
        Route::post('/update-product/{id}', 'updateProduct')->name('update-product');
        Route::get('/publication-status-product/{id}', 'status')->name('publication-status-product');
        Route::get('/delete-product/{id}', 'deleteProduct')->name('delete-product');
    });
});
