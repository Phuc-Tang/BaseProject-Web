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
// frontend
Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/trang-chu','App\Http\Controllers\HomeController@index');
Route::post('/tim-kiem','App\Http\Controllers\HomeController@search');

//Login-Register
Route::get('/dang-nhap', 'App\Http\Controllers\HomeController@dangnhap');
Route::post('/sign-in', 'App\Http\Controllers\HomeController@sign_in');
Route::get('/dang-ky', 'App\Http\Controllers\HomeController@dangky');
Route::post('/sign-up', 'App\Http\Controllers\HomeController@sign_up');
Route::get('/log-out', 'App\Http\Controllers\HomeController@log_out');

//profile
Route::get('/thong-tin-ca-nhan/{customer_id}', 'App\Http\Controllers\ProfileController@profile');
Route::get('/them-thong-tin-ca-nhan/{customer_id}', 'App\Http\Controllers\ProfileController@add_profile');
Route::match(['get','post'],'/save-profile/{customer_id}', 'App\Http\Controllers\ProfileController@save_profile');

//product
Route::get('/san-pham','App\Http\Controllers\ProductController@show_product');
Route::get('/chi-tiet-san-pham/{product_id}','App\Http\Controllers\ProductController@product_details');
Route::get('/danh-muc-san-pham/{category_id}','App\Http\Controllers\ProductController@show_category_home');
Route::get('/thuong-hieu-san-pham/{brand_id}','App\Http\Controllers\ProductController@show_brand_home');
Route::get('/gioi-tinh/{sex_id}','App\Http\Controllers\ProductController@show_sex_home');
Route::get('/load-stock','App\Http\Controllers\ProductController@show_stock');

//cart
Route::post('/add-cart-ajax','App\Http\Controllers\CartController@add_cart_ajax');
Route::post('/update-cart-ajax','App\Http\Controllers\CartController@update_cart_ajax');
Route::get('/gio-hang/{customer_id}','App\Http\Controllers\CartController@show_cart_ajax');
Route::get('/delete-cart/{session_id}','App\Http\Controllers\CartController@delete_cart');
Route::get('/delete-all-cart','App\Http\Controllers\CartController@delete_all_cart');
Route::post('/confirm-order','App\Http\Controllers\CartController@confirm_order');

//coupon
Route::post('/check-coupon','App\Http\Controllers\CartController@check_coupon');
Route::get('/unset-coupon','App\Http\Controllers\CartController@unset_coupon');

//checkout
Route::post('/select-delivery-home','App\Http\Controllers\CartController@select_delivery_home');
Route::post('/calculate-fee','App\Http\Controllers\CartController@calculate_fee');
Route::get('/delele-fee','App\Http\Controllers\CartController@delete_fee');

// backend
Route::get('/admin','App\Http\Controllers\AdminController@index');
Route::get('/dashboard','App\Http\Controllers\AdminController@show_dashboard');
Route::get('/logout','App\Http\Controllers\AdminController@logout');
Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');
Route::post('/filter-by-date','App\Http\Controllers\AdminController@filter_by_date');
Route::post('/dashboard-filter','App\Http\Controllers\AdminController@dashboard_filter');

//coupon
Route::get('/insert-coupon','App\Http\Controllers\CouponController@insert_coupon');
Route::post('/insert-coupon-code','App\Http\Controllers\CouponController@insert_coupon_code');
Route::get('/all-coupon','App\Http\Controllers\CouponController@all_coupon');
Route::get('/delete-coupon/{coupon_id}','App\Http\Controllers\CouponController@delete_coupon');

//Category Product
Route::get('/add-category-product','App\Http\Controllers\CategoryProduct@add_category_product');
Route::get('/all-category-product','App\Http\Controllers\CategoryProduct@all_category_product');
Route::get('/edit-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@delete_category_product');

Route::get('/unactive-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@active_category_product');

Route::post('/save-category-product','App\Http\Controllers\categoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','App\Http\Controllers\categoryProduct@update_category_product');

//Brands Product
Route::get('/add-brand-product','App\Http\Controllers\BrandProduct@add_brand_product');
Route::get('/all-brand-product','App\Http\Controllers\BrandProduct@all_brand_product');
Route::get('/edit-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@delete_brand_product');

Route::get('/unactive-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@active_brand_product');

Route::post('/save-brand-product','App\Http\Controllers\BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@update_brand_product');

//Product
Route::get('/add-product','App\Http\Controllers\ProductController@add_product');
Route::get('/all-product','App\Http\Controllers\ProductController@all_product');
Route::get('/edit-product/{product_id}','App\Http\Controllers\ProductController@edit_product');
Route::get('/delete-product/{product_id}','App\Http\Controllers\ProductController@delete_product');

Route::get('/unactive-product/{product_id}','App\Http\Controllers\ProductController@unactive_product');
Route::get('/active-product/{product_id}','App\Http\Controllers\ProductController@active_product');

Route::post('/save-product','App\Http\Controllers\ProductController@save_product');
Route::post('/update-product/{product_id}','App\Http\Controllers\ProductController@update_product');

//Attribute
Route::get('/add-attribute/{product_id}','App\Http\Controllers\AttributeController@add_attribute');
Route::get('/delete-attribute/{attribute_id}','App\Http\Controllers\AttributeController@delete_attribute');
Route::match(['get','post'],'/save-attribute/{product_id}','App\Http\Controllers\AttributeController@save_attribute');

//images
Route::get('/add-images/{product_id}','App\Http\Controllers\ImagesController@add_images');
Route::get('delete-images/{image_id}','App\Http\Controllers\ImagesController@delete_images');
Route::post('save-images','App\Http\Controllers\ImagesController@save_images');
Route::post('insert-images/{pro_id}','App\Http\Controllers\ImagesController@insert_images');
Route::post('update-images','App\Http\Controllers\ImagesController@update_images');

//Banners
Route::get('/add-banner','App\Http\Controllers\BannerController@add_banner');
Route::post('/save-banner','App\Http\Controllers\BannerController@save_banner');
Route::get('delete-banner/{banner_id}','App\Http\Controllers\BannerController@delete_banner');

//Delivery
Route::get('/delivery','App\Http\Controllers\DeliveryController@delivery');
Route::post('/select-delivery','App\Http\Controllers\DeliveryController@select_delivery');
Route::post('/insert-delivery','App\Http\Controllers\DeliveryController@insert_delivery');
Route::post('/select-feeship','App\Http\Controllers\DeliveryController@select_feeship');
Route::post('/update-delivery','App\Http\Controllers\DeliveryController@update_delivery');

//Order
Route::get('/manage-order','App\Http\Controllers\OrderController@manage_order');
Route::get('/view-order/{order_code}','App\Http\Controllers\OrderController@view_order');
Route::post('/update-order-qty','App\Http\Controllers\OrderController@update_order_qty');

//Account
Route::get('/list-customer','App\Http\Controllers\AdminController@list_customer');
