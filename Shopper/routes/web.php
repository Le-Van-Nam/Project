<?php

use Illuminate\Support\Facades\Route;

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
//frontend
Route::get('/',[\App\Http\Controllers\HomeController::class,'index']);
Route::get('trang-chu',[\App\Http\Controllers\HomeController::class,'index']);

//danh mục sản phẩm trang chủ
Route::get('danh-muc-san-pham/{category_id}',[\App\Http\Controllers\CategoryController::class,'show_category_home']);
Route::get('brand-san-pham/{brand_id}',[\App\Http\Controllers\BrandController::class,'show_brand_home']);
//chi tiết sản phẩm
Route::get('chi-tiet-san-pham/{product_id}',[\App\Http\Controllers\ProductController::class,'detail_product']);

//cart
//Route::post('save-cart',[\App\Http\Controllers\CartController::class,'save_cart']);
Route::post('save-cart-ajax',[\App\Http\Controllers\CartController::class,'save_cart_ajax']);
Route::get('gio-hang',[\App\Http\Controllers\CartController::class,'gio_hang']);
Route::get('dele-product/{session_id}',[\App\Http\Controllers\CartController::class,'dele_product']);
Route::post('update-cart',[\App\Http\Controllers\CartController::class,'update_cart']);
Route::get('dele-all-cart',[\App\Http\Controllers\CartController::class,'dele_all_cart']);

//backend:
//admin
Route::get('login-admin',[\App\Http\Controllers\AdminController::class,'index']);
Route::post('login-admin',[\App\Http\Controllers\AdminController::class,'postindex']);
//tạo mã hóa mật khẩu
Route::get('conv',[\App\Http\Controllers\AdminController::class,'conv']);
//logout
Route::get('logout',[\App\Http\Controllers\AdminController::class,'logout']);

Route::get('admin',[\App\Http\Controllers\AdminController::class,'dashboard']);

// Category Product
Route::get('add-category',[\App\Http\Controllers\CategoryController::class,'add_category']);
//update
Route::get('update-category={category_id}',[\App\Http\Controllers\CategoryController::class,'update_category']);
//delete
Route::get('delete-category={category_id}',[\App\Http\Controllers\CategoryController::class,'delete_category']);

Route::get('all-category',[\App\Http\Controllers\CategoryController::class,'all_category']);

Route::get('unactive-category={category_id}',[\App\Http\Controllers\CategoryController::class,'unactive_category']);
Route::get('active-category={category_id}',[\App\Http\Controllers\CategoryController::class,'active_category']);

Route::post('save_category',[\App\Http\Controllers\CategoryController::class,'save_category']);
Route::post('update_category={product_id}',[\App\Http\Controllers\CategoryController::class,'edit_category']);


// Brand Product
Route::get('add-brand',[\App\Http\Controllers\BrandController::class,'add_brand']);
//update
Route::get('update-brand={brand_id}',[\App\Http\Controllers\BrandController::class,'update_brand']);
//delete
Route::get('delete-brand={brand_id}',[\App\Http\Controllers\BrandController::class,'delete_brand']);

Route::get('all-brand',[\App\Http\Controllers\BrandController::class,'all_brand']);

Route::get('unactive-brand={brand_id}',[\App\Http\Controllers\BrandController::class,'unactive_brand']);
Route::get('active-brand={brand_id}',[\App\Http\Controllers\BrandController::class,'active_brand']);

Route::post('save_brand',[\App\Http\Controllers\BrandController::class,'save_brand']);
Route::post('update_brand={brand_id}',[\App\Http\Controllers\BrandController::class,'edit_brand']);

//Product
Route::get('add-product',[\App\Http\Controllers\ProductController::class,'add_product']);
//update
Route::get('update-product={product_id}',[\App\Http\Controllers\ProductController::class,'update_product']);
//delete
Route::get('delete-product={product_id}',[\App\Http\Controllers\ProductController::class,'delete_product']);

Route::get('all-product',[\App\Http\Controllers\ProductController::class,'all_product']);

Route::get('unactive-product={product_id}',[\App\Http\Controllers\ProductController::class,'unactive_product']);
Route::get('active-product={product_id}',[\App\Http\Controllers\ProductController::class,'active_product']);

Route::post('save_product',[\App\Http\Controllers\ProductController::class,'save_product']);
Route::post('update_product={product_id}',[\App\Http\Controllers\ProductController::class,'edit_product']);