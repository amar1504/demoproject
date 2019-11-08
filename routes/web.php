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
Route::get('admin/product/create', 'Admin\\ProductController@index');
Route::resource('admin/product', 'Admin\\ProductController');
Route::resource('admin/coupon', 'Admin\\CouponController');

Route::prefix('/admin')->namespace('Admin\\')->group(function(){
    //subcategoey route
    Route::get('/subcategorylist', 'CategoryController@SubCategoryList')->name('subcateory.list');
    Route::get('/subcategory/create','CategoryController@createSubcategory')->name('subcategory.create');
    Route::get('/subcategorydetail/{id?}', 'CategoryController@showSubcategory')->name('subcategory.show');
    Route::get('/subcategoryedit/{id}', 'CategoryController@editSubcategory')->name('subcategory.edit');
    Route::post('/subcategoryup/{category}', 'CategoryController@updateSubcategory')->name('subcategory.update');
    Route::get('/subcategory/{id?}', 'CategoryController@showSubCat');
    Route::post('/subcategorystore', 'CategoryController@storeSubCategory')->name('subcateory.store');
    Route::post('/subcategorydestroy/{category}', 'CategoryController@destroySubCategory')->name('subcateory.destroy');
});


//Route::get('/dropdown', ['as' => 'dropdown' ,'uses' => 'Admin\\ProductController@dropdown']);
Route::post('/dropdown','Admin\\ProductController@dropdownCat')->name('dropdown_route');


/*
Route::get('admin/banner','Admin\BannerController@index')->name('banner.index');
Route::POST('admin/banner','Admin\BannerController@store')->name('banner.store');
Route::GET('admin/banner/create','Admin\BannerController@create')->name('banner.create');
*/


//Eshopper forgot password
Route::get('eshopper', 'Eshopper\\EshopperController@index')->name('eshopper');
Route::any('/getproduct','Eshopper\\EshopperController@featuresItem')->name('getproducts');
Route::get('eshopper/login','Eshopper\\EshopperController@userLogin')->name('userlogin');
Route::get('eshopper/product/{id?}','Eshopper\\EshopperController@product')->name('product');

Route::get('eshopper/forgotpassword/','Eshopper\\EshopperController@forgotPasswordview')->name('forgot.passwordview');
Route::post('eshopper/forgot-password/','Eshopper\\EshopperController@forgotPassword')->name('forgot.password');
Route::get('eshopper/product-details/{id?}','Eshopper\\EshopperController@productDetails')->name('product-details');


Route::prefix('/eshopper')->namespace('Eshopper\\')->group(function(){

    //cart
    Route::get('/cart/add/{id}','CartController@addItem')->name('cart.add');
    Route::get('/cart','CartController@index')->name('cart');
    Route::get('/cart/remove/{rowId}','CartController@removeItem')->name('cart.remove');
    Route::get('/cart/update/{rowId}','CartController@updateQty')->name('cart.update');

});


Route::prefix('/eshopper')->namespace('Eshoppeer\\')->group(function(){

    //shipping address
    Route::resource('/address', 'AddressController');
    Route::post('/address', 'AddressController@store')->name('address.store');
    Route::get('/address', 'AddressController@index')->name('address.index');
    Route::get('/address/create', 'AddressController@create')->name('address.create');
    Route::delete('/address/{address}', 'AddressController@destroy')->name('address.destroy');
    Route::put('/address/{address}', 'AddressController@update')->name('address.update');
    Route::get('/address/{address}', 'AddressController@show')->name('address.show');
    Route::get('/address/{address}/edit', 'AddressController@edit')->name('address.edit');
});