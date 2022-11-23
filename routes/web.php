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
// Home
Route::get('/', 'ProductController@list');

//static pages
Route::get('about', 'StaticController@about');
Route::get('services', 'StaticController@services');
Route::get('faq', 'StaticController@faq');
Route::get('contact', 'StaticController@contact');

//products
Route::get('products', 'ProductController@list');
Route::get('products/{id}', 'ProductController@show');

//Cart
Route::get('cart', 'CartController@showCart')->name('cart');
Route::post('addToCart', 'CartController@addToCart')->name('addToCart');

//Orders
Route::get('orders/{id}', 'OrdController@show');
Route::post('createOrder', 'OrdController@create')->name('createOrder');
Route::get('orderSuccess', 'OrdController@orderSuccess')->name('orderSuccess');

//shoes
Route::get('shoes', 'ShoeController@list');
Route::get('shoes/{id}', 'ShoeController@show');
Route::get('addShoes', 'ShoeController@showCreateForm')->name('addShoes');
Route::post('addShoes', 'ShoeController@create');
Route::get('updateShoe/{id}', 'ShoeController@showUpdateForm')->name('updateShoe');
Route::post('updateShoe/{id}', 'ShoeController@update');

//books
Route::get('books', 'BookController@list');
Route::get('books/{id}', 'BookController@show');
Route::get('addBooks', 'BookController@showCreateForm')->name('addBooks');
Route::post('addBooks', 'BookController@create');
Route::get('updateBook/{id}', 'ShoeController@showUpdateForm')->name('updateBook');
Route::post('updateBook/{id}', 'ShoeController@update');

//funkoPops
Route::get('funkoPops', 'FunkoPopController@list');
Route::get('funkoPops/{id}', 'FunkoPopController@show');
Route::get('addFunkoPops', 'FunkoPopController@showCreateForm')->name('addFunkoPops');
Route::post('addFunkoPops', 'FunkoPopController@create');
Route::get('updateFunkoPop/{id}', 'FunkoPopController@showUpdateForm')->name('updateFunkoPop');
Route::post('updateFunkoPop/{id}', 'FunkoPopController@update');

// API
#Route::put('api/cards', 'CardController@create');
#Route::delete('api/cards/{card_id}', 'CardController@delete');
#Route::put('api/cards/{card_id}/', 'ItemController@create');
#Route::post('api/item/{id}', 'ItemController@update');
#Route::delete('api/item/{id}', 'ItemController@delete');

// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');;
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
Route::get('recoverPassword', 'Auth\RegisterController@recoverPassword')->name('recoverPassword');

//User Management
Route::get('user', 'UserController@show')->name('user');
Route::get('editUser', 'UserController@showEditForm')->name('editUser');
Route::post('editUser', 'UserController@edit');
Route::get('showOrders/{user}', 'UserController@showOrders');

//Admin area
Route::get('adminDashboard', 'AdminController@dashboard')->name('adminDashboard');

Route::get('adminItemsDashboard', 'AdminController@itemDashboard')->name('adminItemsDashboard');


Route::get('adminUsersDashboard', 'AdminController@userDashboard')->name('adminUsersDashboard');
Route::get('adminEditUser', 'AdminController@userEditForm')->name('adminEditUser');
Route::post('adminEditUser', 'AdminController@userEdit');

Route::post('adminBanUser', 'AdminController@banUser')->name('adminBanUser');
//Route::get('editUser', 'UserController@showEditForm')->name('editUser');
//Route::post('editUser', 'UserController@edit');