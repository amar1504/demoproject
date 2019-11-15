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
    #subcategoey Route
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


//Eshopper forgot password Route
Route::get('eshopper', 'Eshopper\\EshopperController@index')->name('eshopper');
Route::any('/getproduct','Eshopper\\EshopperController@featuresItem')->name('getproducts');
Route::get('eshopper/login','Eshopper\\EshopperController@userLogin')->name('userlogin');
Route::get('eshopper/product/{id?}','Eshopper\\EshopperController@product')->name('product');
Route::get('eshopper/forgotpassword/','Eshopper\\EshopperController@forgotPasswordview')->name('forgot.passwordview');
Route::post('eshopper/forgot-password/','Eshopper\\EshopperController@forgotPassword')->name('forgot.password');
Route::get('eshopper/product-details/{id?}','Eshopper\\EshopperController@productDetails')->name('product-details');
//wishlist
Route::get('eshopper/product/wishlist/{id?}','Eshopper\\EshopperController@wishList')->name('wishlist.add');
//user Profile
Route::get('eshopper/user-profile','Eshopper\\EshopperController@userProfile')->name('user.profile');
Route::post('eshopper/profile/update','Eshopper\\EshopperController@userProfileUpdate')->name('user.update');
Route::get('eshopper/profile/change-password','Eshopper\\EshopperController@changePassword')->name('user.changepassword');
Route::post('eshopper/profile/update-password','Eshopper\\EshopperController@updatePassword')->name('user.updatepassword');
Route::get('eshopper/profile/my-orders','Eshopper\\EshopperController@myOrders')->name('user.myorders');
Route::get('eshopper/profile/my-order-details/{id}','Eshopper\\EshopperController@myOrderDetails')->name('user.myorderdetails');


Route::prefix('/eshopper')->namespace('Eshopper\\')->group(function(){

    #cart Route
    Route::get('/cart/add/{id?}','CartController@addItem')->name('cart.add');
    Route::post('/cart/additem/','CartController@addQuantity')->name('cart.additems');
    Route::post('/cart/removeitem/','CartController@removeQuantity')->name('cart.removeitems');
    Route::get('/cart','CartController@index')->name('cart');
    Route::get('/cart/remove/{rowId}','CartController@removeItem')->name('cart.remove');
    Route::get('/cart/update/{rowId}','CartController@updateQty')->name('cart.update');
    Route::post('/cart/coupon','CartController@coupon')->name('cart.coupon');
    Route::post('/cart/checkout/items','CartController@checkout')->name('cart.checkout');
    Route::post('/cart/store/order','CartController@storeOrder')->name('cart.storeorder');

});


Route::prefix('/eshopper')->namespace('Eshoppeer\\')->group(function(){

    #shipping address Route
    Route::resource('/address', 'AddressController');
    Route::post('/address', 'AddressController@store')->name('address.store');
    Route::get('/address', 'AddressController@index')->name('address.index');
    Route::get('/address/create', 'AddressController@create')->name('address.create');
    Route::delete('/address/{address}', 'AddressController@destroy')->name('address.destroy');
    Route::put('/address/{address}', 'AddressController@update')->name('address.update');
    Route::get('/address/{address}', 'AddressController@show')->name('address.show');
    Route::get('/address/{address}/edit', 'AddressController@edit')->name('address.edit');
});

// Paypal Route
Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'AddMoneyController@payWithPaypal',));
Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'payment.status','uses' => 'AddMoneyController@getPaymentStatus',));