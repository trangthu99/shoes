<?php

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
Route::get('/password_remind',
    'Member\Auth\PasswordRemindController@showLinkRequestForm')->name('password_remind');
Route::post('/password_remind', 'Member\Auth\PasswordRemindController@sendNewPass');

Route::get('forgetPassword','ResetPasswordController@forgetpassword');
Route::post('reset_password','ResetPasswordController@resetPassword');
Route::post('forgetPassword','ResetPasswordController@sendMail');
Route::get('reset_password','ResetPasswordController@resetForm');
// Route::post('reset-Password','ResetPasswordController@toMail');

Route::get('/','Ccontroller@index');
Route::get('help','Ccontroller@help');

Route::get('login', 'LoginController@getLogin')->name('login');
Route::post('login','LoginController@postLogin')->name('login');
Route::get('logout','LoginController@logout');

//user
Route::get('user','LoginController@user');
Route::post('user','LoginController@updateinfo');

Route::post('cart/{action?}/{id?}','CartController@cart');
Route::get('cart/{action?}/{id?}','CartController@cart');

Route::get('order','OrderController@getOrder');
Route::post('order','OrderController@postOrder');
Route::post('updateinfo','OrderController@updateInfo');

Route::get('/product/{id?}', 'ProductController@getProduct')->name('rate_comment')->middleware('auth');
Route::post('/product/{id?}', 'ProductController@postProduct')->name('taskPost');

Route::get('search/{type}/{id}','Ccontroller@search');
Route::get('searchSale/{type}/{id}','Ccontroller@searchSale');

Route::get('register', 'RegisterController@getRegister')->name('register')->middleware('guest');
Route::post('register','RegisterController@postRegister')->name('guest.register');

Route::get('productdetail/{id}', 'ProductController@productDetail');
Route::post('productdetail/{id?}', 'ProductController@postProduct');

Route::get('order/follow','OrderController@followOrder');
Route::get('order/detail/{id}','OrderController@orderDetail');

Route::get('admin/login','AdminController@login');
Route::post('admin/login','AdminController@postLoginAdmin');

Route::get('/product/rate/{id?}', 'ProductController@getRate');
Route::post('/product/rate/{id?}', 'ProductController@postRate');

Route::prefix('admin')->middleware('adminLogin')->group(function(){

	Route::get('productedit/{id}','AdminController@productEdit');
	Route::post('productedit/{id}','AdminController@postProductEdit');

	Route::get('products','AdminController@products');
	Route::get('products/brandID/{id}','AdminController@product');
	
	Route::get('logout','AdminController@logout');

	Route::get('product/delete/{id?}','AdminController@productDelete');
	Route::get('product/search/keyword','AdminController@searchProducts');

	Route::get('/','AdminController@index');

	Route::get('productInsert','AdminController@insert');
	Route::post('productInsert','AdminController@postInsert');

	//rate
	
	Route::get('rateDetail/{id?}','AdminController@rateDetail');
	Route::get('delete/rate/{id}','AdminController@rateDelete');

	Route::get('rates','AdminController@rates');
	Route::get('rate/brandID/{id}','AdminController@rate');

	//brand
	Route::get('brands','AdminController@brands');
	Route::get('brands/insert','AdminController@getBrandInsert');
	Route::post('brands/insert','AdminController@postBrandInsert');
	Route::get('delete/brand/{id}','AdminController@brandDelete');
	Route::get('edit/brand/{id}','AdminController@getBrandEdit');
	Route::post('edit/brand/{id}','AdminController@postBrandEdit');

	//ordermethods
	Route::get('ordermethods','AdminController@ordermethods');
	Route::get('ordermethods/insert','AdminController@getOrderMethodInsert');
	Route::post('ordermethods/insert','AdminController@postOrderMethodInsert');
	Route::get('delete/ordermethod/{id}','AdminController@ordermethodDelete');
	Route::get('edit/ordermethod/{id}','AdminController@getOrderMethodEdit');
	Route::post('edit/ordermethod/{id}','AdminController@postOrderMethodEdit');

	//order
	Route::get('order/status/{id}','AdminController@order');
	Route::get('order','AdminController@orders');
	Route::get('delete/order/{id}','AdminController@orderDelete');
	Route::get('edit/order/{id}','AdminController@getOrderEdit');
	Route::post('edit/order/{id}','AdminController@postOrderEdit');

	//admin
	Route::get('/users','AdminController@admins');

	Route::get('useredit/{id}','AdminController@getEdit');
	Route::post('useredit/{id}','AdminController@adminEdit');

	Route::get('/userinsert','AdminController@getInsert');
	Route::post('/userinsert','AdminController@adminInsert');

	Route::get('admin/delete/{id?}','AdminController@adminDelete');

	//mức giá
	Route::get('/prices','AdminController@prices');

	Route::get('/priceInsert','AdminController@priceInsert');
	Route::post('/priceInsert','AdminController@postPriceInsert');

	Route::get('priceEdit/{id}','AdminController@priceEdit');
	Route::post('priceEdit/{id}','AdminController@postPriceEdit');

	Route::get('price/delete/{id?}','AdminController@priceDelete');

	//mức sale
	Route::get('/sales','AdminController@sales');

	Route::get('/saleInsert','AdminController@saleInsert');
	Route::post('/saleInsert','AdminController@postSaleInsert');

	Route::get('saleEdit/{id}','AdminController@saleEdit');
	Route::post('saleEdit/{id}','AdminController@postSaleEdit');

	Route::get('sale/delete/{id?}','AdminController@saleDelete');

	//product_size
	Route::get('productSizeDetail/{id}','AdminController@productSizeDetail');
	Route::get('productSizes/brandID/{id}','AdminController@productSizes');
	Route::get('productSizes','AdminController@productSize');

	Route::get('/productSizeEdit/{id}','AdminController@productSizeEdit');
	Route::post('/productSizeEdit/{id}','AdminController@postProductSizeEdit');

});