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
    return redirect()->route('eshopper');
});

Auth::routes();
Route::get('/home', ['as' => 'home' ,'uses' => 'HomeController@index']);
Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('report', 'reportController');
Route::get('logout', 'Auth\LoginController@logout');
//Route::get('admin/product/create', 'Admin\\ProductController@index'); 

Route::resource('admin/banner', 'Admin\\BannerController');
Route::resource('admin/category', 'Admin\\CategoryController');
Route::resource('admin/cms', 'Admin\\cmsController');
Route::resource('admin/configuration', 'Admin\\ConfigurationController');
Route::resource('admin/coupon', 'Admin\\CouponController');
Route::resource('admin/product', 'Admin\\ProductController');
Route::resource('admin/roles', 'Admin\\RolesController');
Route::resource('admin/users', 'Admin\\UsersController');


Route::prefix('/admin')->group(function(){

    #contact us admin Route
    Route::get('/contact-us','HomeController@contactUsList')->name('contactus.list');
    Route::get('/contact-us/{id?}','HomeController@contactUsShow')->name('contactus.show');
    Route::get('/contact-us/reply/{id?}','HomeController@contactUsReply')->name('contactus.reply');
    Route::post('/contact-us/reply/send/to-customer','HomeController@contactUsReplyUpdate')->name('contactus.replyupdate');
    Route::get('/orders/list','HomeController@customerOrdersList')->name('order.list');
    Route::get('/orders/details/{id?}','HomeController@customerOrderDetails')->name('order.details');
    Route::get('/orders/change-status/{id?}','HomeController@changeStatus')->name('order.changestatus');
    Route::post('/orders/update-status','HomeController@updateStatus')->name('order.updatestatus');

});


Route::prefix('/admin')->namespace('Admin\\')->group(function(){
    #subcategoey Route
    Route::get('/subcategorylist', 'CategoryController@SubCategoryList')->name('subcateory.list');
    Route::get('/subcategory/create','CategoryController@createSubcategory')->name('subcategory.create');
    Route::get('/subcategorydetail/{id?}', 'CategoryController@showSubcategory')->name('subcategory.show');
    Route::get('/subcategoryedit/{id}', 'CategoryController@editSubcategory')->name('subcategory.edit');
    Route::post('/subcategoryup/{category}', 'CategoryController@updateSubcategory')->name('subcategory.update');
    Route::get('/subcategory/{id?}', 'CategoryController@showSubCat')->name('subcateory.view');
    Route::post('/subcategorystore', 'CategoryController@storeSubCategory')->name('subcateory.store');
    Route::post('/subcategorydestroy/{category}', 'CategoryController@destroySubCategory')->name('subcateory.destroy');

    #Banner Route
    Route::get('/banner','BannerController@index')->name('banner.index');
    Route::post('/banner','BannerController@store')->name('banner.store');
    Route::GET('/banner/create','BannerController@create')->name('banner.create');
    Route::GET('/banner/{banner}','BannerController@show')->name('banner.show');
    Route::post('/banner/{banner}','BannerController@update')->name('banner.update');
    Route::delete('/banner/{banner}','BannerController@destroy')->name('banner.destroy');
    Route::get('/banner/{banner}/edit','BannerController@edit')->name('banner.edit');

    #category Route
    Route::get('/category','CategoryController@index')->name('category.index');
    Route::post('/category','CategoryController@store')->name('category.store');
    Route::GET('/category/create','CategoryController@create')->name('category.create');
    Route::GET('/category/{category}','CategoryController@show')->name('category.show');
    Route::post('/category/{category}','CategoryController@update')->name('category.update');
    Route::delete('/category/{category}','CategoryController@destroy')->name('category.destroy');
    Route::get('/category/{category}/edit','CategoryController@edit')->name('category.edit');

    #CMS Route
    Route::get('/cms','cmsController@index')->name('cms.index');
    Route::post('/cms','cmsController@store')->name('cms.store');
    Route::GET('/cms/create','cmsController@create')->name('cms.create');
    Route::GET('/cms/{cms}','cmsController@show')->name('cms.show');
    Route::post('/cms/{cms}','cmsController@update')->name('cms.update');
    Route::delete('/cms/{cms}','cmsController@destroy')->name('cms.destroy');
    Route::get('/cms/{cms}/edit','cmsController@edit')->name('cms.edit');

    #Configuration Route
    Route::get('/configuration','ConfigurationController@index')->name('configuration.index');
    Route::post('/configuration','ConfigurationController@store')->name('configuration.store');
    Route::GET('/configuration/create','ConfigurationController@create')->name('configuration.create');
    Route::GET('/configuration/{configuration}','ConfigurationController@show')->name('configuration.show');
    Route::post('/configuration/{configuration}','ConfigurationController@update')->name('configuration.update');
    Route::delete('/configuration/{configuration}','ConfigurationController@destroy')->name('configuration.destroy');
    Route::get('/configuration/{configuration}/edit','ConfigurationController@edit')->name('configuration.edit');
   
    #Coupon Route
    Route::get('/coupon','CouponController@index')->name('coupon.index');
    Route::post('/coupon','CouponController@store')->name('coupon.store');
    Route::GET('/coupon/create','CouponController@create')->name('coupon.create');
    Route::GET('/coupon/{coupon}','CouponController@show')->name('coupon.show');
    Route::post('/coupon/{coupon}','CouponController@update')->name('coupon.update');
    Route::delete('/coupon/{coupon}','CouponController@destroy')->name('coupon.destroy');
    Route::get('/coupon/{coupon}/edit','CouponController@edit')->name('coupon.edit');

    #Product Route
    Route::get('/product','ProductController@index')->name('product.index');
    Route::post('/product','ProductController@store')->name('product.store');
    Route::GET('/product/create','ProductController@create')->name('product.create');
    Route::GET('/product/{product}','ProductController@show')->name('product.show');
    Route::post('/product/{product}','ProductController@update')->name('product.update');
    Route::delete('/product/{product}','ProductController@destroy')->name('product.destroy');
    Route::get('/product/{product}/edit','ProductController@edit')->name('product.edit');

    #Roles Route
    Route::get('/roles','RolesController@index')->name('roles.index');
    Route::post('/roles','RolesController@store')->name('roles.store');
    Route::GET('/roles/create','RolesController@create')->name('roles.create');
    Route::GET('/roles/{roles}','RolesController@show')->name('roles.show');
    Route::post('/roles/{roles}','RolesController@update')->name('roles.update');
    Route::delete('/roles/{roles}','RolesController@destroy')->name('roles.destroy');
    Route::get('/roles/{roles}/edit','RolesController@edit')->name('roles.edit');

    #User Route
    Route::get('/users','UsersController@index')->name('users.index');
    Route::post('/users','UsersController@store')->name('users.store');
    Route::GET('/users/create','UsersController@create')->name('users.create');
    Route::GET('/users/{users}','UsersController@show')->name('users.show');
    Route::post('/users/{users}','UsersController@update')->name('users.update');
    Route::delete('/users/{users}','UsersController@destroy')->name('users.destroy');
    Route::get('/users/{users}/edit','UsersController@edit')->name('users.edit');

});


//Route::get('/dropdown', ['as' => 'dropdown' ,'uses' => 'Admin\\ProductController@dropdown']);
Route::post('/dropdown','Admin\\ProductController@dropdownCat')->name('dropdown_route');
Route::any('/getproduct','Eshopper\\EshopperController@featuresItem')->name('getproducts');
Route::get('eshopper', 'Eshopper\\EshopperController@index')->name('eshopper');

Route::prefix('/eshopper')->namespace('Eshopper\\')->group(function(){

    #Login Route
    Route::get('/login','EshopperController@userLogin')->name('userlogin');
    Route::get('/product/{id?}','EshopperController@product')->name('product');
    
    #Eshopper forgot password Route
    Route::get('/forgotpassword/','EshopperController@forgotPasswordview')->name('forgot.passwordview');
    Route::post('/forgot-password/','EshopperController@forgotPassword')->name('forgot.password');
    Route::get('/product-details/{id?}','EshopperController@productDetails')->name('product-details');
    
    #wishlist
    Route::get('/product/wishlist/{id?}','EshopperController@wishList')->name('wishlist.add');
    
    #Account Route
    Route::get('/user-profile','EshopperController@userProfile')->name('user.profile');
    Route::post('/profile/update','EshopperController@userProfileUpdate')->name('user.update');
    Route::get('/profile/change-password','EshopperController@changePassword')->name('user.changepassword');
    Route::post('/profile/update-password','EshopperController@updatePassword')->name('user.updatepassword');
    Route::get('/profile/my-orders','EshopperController@myOrders')->name('user.myorders');
    Route::get('/profile/my-order-details/{id}','EshopperController@myOrderDetails')->name('user.myorderdetails');
    Route::get('/profile/track-my-order','EshopperController@trackOrderView')->name('user.trackorderview');
    Route::post('/profile/track-my-order/your-order','EshopperController@trackOrder')->name('user.trackorder');
    Route::get('/profile/track/{id}','EshopperController@trackOrderFromOrderList')->name('user.trackorderList');

     #about us Route
     Route::get('/about', 'EshopperController@aboutUs')->name('about');
     #privacy terms Route
     Route::get('/privacy-terms', 'EshopperController@privacyTerms')->name('privacy');
     #return refund Route
     Route::get('/return-refund', 'EshopperController@returnRefund')->name('returnrefund');
     #purchase protection Route
     Route::get('/purchase-protection', 'EshopperController@purchaseProtection')->name('purchaseprotection');

    #contact us cutomer Route
    Route::get('/contact-us','EshopperController@contactUsView')->name('view.contactus');
    Route::post('/contact-us/contact','EshopperController@contactUs')->name('contactus.add');

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

//mailchimp subscription Route
Route::get('manageMailChimp', 'MailChimpController@manageMailChimp');
Route::post('subscribe',['as'=>'subscribe','uses'=>'MailChimpController@subscribe']);
Route::post('sendCompaign',['as'=>'sendCompaign','uses'=>'MailChimpController@sendCompaign']);






