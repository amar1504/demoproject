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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', ['as' => 'home' ,'uses' => 'HomeController@index']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('report', 'reportController');
Route::resource('admin/users', 'Admin\\UsersController');
Route::resource('admin/users', 'Admin\\UsersController');
Route::get('logout', 'Auth\LoginController@logout');
Route::resource('admin/roles', 'Admin\\rolesController');
Route::resource('admin/roles', 'Admin\\RolesController');
Route::resource('admin/configuration', 'Admin\\ConfigurationController');
Route::resource('admin/banner', 'Admin\\BannerController');
Route::resource('admin/banner', 'Admin\\BannerController');
Route::resource('admin/banner', 'Admin\\BannerController');
Route::resource('admin/category', 'Admin\\categoryController');
Route::resource('admin/category', 'Admin\\CategoryController');
Route::resource('admin/category', 'Admin\\CategoryController');
Route::get('admin/subcategory/{id?}', 'Admin\\CategoryController@showSubCat');
Route::get('admin/product/create', 'Admin\\ProductController@index');
Route::resource('admin/product', 'Admin\\ProductController');
Route::resource('admin/coupon', 'Admin\\CouponController');

//Route::get('/dropdown', ['as' => 'dropdown' ,'uses' => 'Admin\\ProductController@dropdown']);
Route::post('/dropdown','Admin\\ProductController@dropdownCat')->name('dropdown_route');

//Eshopper
Route::get('eshopper', 'Eshopper\\EshopperController@index')->name('eshopper');
Route::any('/getproduct','Eshopper\\EshopperController@featuresItem')->name('getproducts');
Route::get('eshopper/login','Eshopper\\EshopperController@userLogin')->name('userlogin');
Route::get('eshopper/product/{id?}','Eshopper\\EshopperController@product')->name('product');

