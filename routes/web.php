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

//subcategoey route
Route::get('admin/subcategorylist', 'Admin\\CategoryController@SubCategoryList')->name('subcateory.list');
Route::get('admin/subcategory/create','Admin\\CategoryController@createSubcategory')->name('subcategory.create');

Route::get('admin/subcategorydetail/{id?}', 'Admin\\CategoryController@showSubcategory')->name('subcategory.show');
Route::get('admin/subcategoryedit/{id}', 'Admin\\CategoryController@editSubcategory')->name('subcategory.edit');
Route::post('admin/subcategoryup/{category}', 'Admin\\CategoryController@updateSubcategory')->name('subcategory.update');

//Route::get('/dropdown', ['as' => 'dropdown' ,'uses' => 'Admin\\ProductController@dropdown']);
Route::post('/dropdown','Admin\\ProductController@dropdownCat')->name('dropdown_route');


//Eshopper
Route::get('eshopper', 'Eshopper\\EshopperController@index')->name('eshopper');
Route::any('/getproduct','Eshopper\\EshopperController@featuresItem')->name('getproducts');
Route::get('eshopper/login','Eshopper\\EshopperController@userLogin')->name('userlogin');
Route::get('eshopper/product/{id?}','Eshopper\\EshopperController@product')->name('product');

Route::get('eshopper/forgotpassword/','Eshopper\\EshopperController@forgotPasswordview')->name('forgot.passwordview');
Route::post('eshopper/forgot-password/','Eshopper\\EshopperController@forgotPassword')->name('forgot.password');
Route::get('eshopper/product-details/{id?}','Eshopper\\EshopperController@productDetails')->name('product-details');



/*
Route::get('admin/banner','Admin\BannerController@index')->name('banner.index');
Route::POST('admin/banner','Admin\BannerController@store')->name('banner.store');
Route::GET('admin/banner/create','Admin\BannerController@create')->name('banner.create');
*/

Route::resource('eshopper/address', 'Eshoppeer\\AddressController');
Route::post('eshopper/address', 'Eshoppeer\\AddressController@store')->name('address.store');
Route::get('eshopper/address', 'Eshoppeer\\AddressController@index')->name('address.index');
Route::get('eshopper/address/create', 'Eshoppeer\\AddressController@create')->name('address.create');
Route::delete('eshopper/address/{address}', 'Eshoppeer\\AddressController@destroy')->name('address.destroy');
Route::put('eshopper/address/{address}', 'Eshoppeer\\AddressController@update')->name('address.update');
Route::get('eshopper/address/{address}', 'Eshoppeer\\AddressController@show')->name('address.show');
Route::get('eshopper/address/{address}/edit', 'Eshoppeer\\AddressController@edit')->name('address.edit');
