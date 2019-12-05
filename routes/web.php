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
//Route::get('admin/product/create', 'Admin\\ProductController@index'); 
//Route::get('logout', 'Auth\LoginController@logout');
//Route::resource('admin/banner', 'Admin\\BannerController');
//Route::resource('admin/category', 'Admin\\CategoryController');
Route::resource('admin/cms', 'Admin\\cmsController');
//Route::resource('admin/configuration', 'Admin\\ConfigurationController');
//Route::resource('admin/coupon', 'Admin\\CouponController');
//Route::resource('admin/product', 'Admin\\ProductController');
//Route::resource('/address', 'AddressController');
Route::resource('admin/roles', 'Admin\\RolesController');
Route::resource('admin/users', 'Admin\\UsersController');
Route::post('eshopper/customer','Admin\\UsersController@storeCustomer')->name('customer.store');


Route::prefix('/admin')->group(function(){
    Route::middleware(['sessionTimeOut'])->group(function () {
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
});


Route::prefix('/admin')->namespace('Admin\\')->group(function(){
    Route::middleware(['sessionTimeOut'])->group(function () {
    #subcategoey Route
    Route::get('/subcategorylist', 'CategoryController@SubCategoryList')->name('subcateory.list');
    Route::get('/subcategory/create','CategoryController@createSubcategory')->name('subcategory.create')->middleware('checkRole');
    Route::get('/subcategorydetail/{id?}', 'CategoryController@showSubcategory')->name('subcategory.show');
    Route::get('/subcategoryedit/{id}', 'CategoryController@editSubcategory')->name('subcategory.edit')->middleware('checkRole');
    Route::post('/subcategoryup/{category}', 'CategoryController@updateSubcategory')->name('subcategory.update')->middleware('checkRole');
    Route::get('/subcategory/{id?}', 'CategoryController@showSubCat')->name('subcateory.view');
    Route::post('/subcategorystore', 'CategoryController@storeSubCategory')->name('subcateory.store')->middleware('checkRole');
    Route::post('/subcategorydestroy/{category}', 'CategoryController@destroySubCategory')->name('subcateory.destroy')->middleware('checkRole');

    #Banner Route
    Route::get('/banner','BannerController@index')->name('banner.index');
    Route::post('/banner','BannerController@store')->name('banner.store')->middleware('checkRole');
    Route::GET('/banner/create','BannerController@create')->name('banner.create')->middleware('checkRole');
    Route::GET('/banner/{banner}','BannerController@show')->name('banner.show');
    Route::post('/banner/{banner}','BannerController@update')->name('banner.update')->middleware('checkRole');
    Route::delete('/banner/{banner}','BannerController@destroy')->name('banner.destroy')->middleware('checkRole');
    Route::get('/banner/{banner}/edit','BannerController@edit')->name('banner.edit')->middleware('checkRole');

    #category Route
    Route::get('/category','CategoryController@index')->name('category.index');
    Route::post('/category','CategoryController@store')->name('category.store')->middleware('checkRole');
    Route::GET('/category/create','CategoryController@create')->name('category.create')->middleware('checkRole');
    Route::GET('/category/{category}','CategoryController@show')->name('category.show');
    Route::post('/category/{category}','CategoryController@update')->name('category.update')->middleware('checkRole');
    Route::delete('/category/{category}','CategoryController@destroy')->name('category.destroy')->middleware('checkRole');
    Route::get('/category/{category}/edit','CategoryController@edit')->name('category.edit')->middleware('checkRole');

    #CMS Route
    Route::get('/cms','cmsController@index')->name('cms.index');
    Route::post('/cms','cmsController@store')->name('cms.store')->middleware('checkRole');
    Route::GET('/cms/create','cmsController@create')->name('cms.create')->middleware('checkRole');
    Route::GET('/cms/{cms}','cmsController@show')->name('cms.show');
    Route::post('/cms/{cms}','cmsController@update')->name('cms.update')->middleware('checkRole');
    Route::delete('/cms/{cms}','cmsController@destroy')->name('cms.destroy')->middleware('checkRole');
    Route::get('/cms/{cms}/edit','cmsController@edit')->name('cms.edit')->middleware('checkRole');

    #Configuration Route
    Route::get('/configuration','ConfigurationController@index')->name('configuration.index');
    Route::post('/configuration','ConfigurationController@store')->name('configuration.store')->middleware('checkRole');
    Route::GET('/configuration/create','ConfigurationController@create')->name('configuration.create')->middleware('checkRole');
    Route::GET('/configuration/{configuration}','ConfigurationController@show')->name('configuration.show');
    Route::post('/configuration/{configuration}','ConfigurationController@update')->name('configuration.update')->middleware('checkRole');
    Route::delete('/configuration/{configuration}','ConfigurationController@destroy')->name('configuration.destroy')->middleware('checkRole');
    Route::get('/configuration/{configuration}/edit','ConfigurationController@edit')->name('configuration.edit')->middleware('checkRole');
   
    #Coupon Route
    Route::get('/coupon','CouponController@index')->name('coupon.index');
    Route::post('/coupon','CouponController@store')->name('coupon.store')->middleware('checkRole');
    Route::GET('/coupon/create','CouponController@create')->name('coupon.create')->middleware('checkRole');
    Route::GET('/coupon/{coupon}','CouponController@show')->name('coupon.show');
    Route::post('/coupon/{coupon}','CouponController@update')->name('coupon.update')->middleware('checkRole');
    Route::delete('/coupon/{coupon}','CouponController@destroy')->name('coupon.destroy')->middleware('checkRole');
    Route::get('/coupon/{coupon}/edit','CouponController@edit')->name('coupon.edit')->middleware('checkRole');

    #Product Route
    Route::get('/product','ProductController@index')->name('product.index');
    Route::post('/product','ProductController@store')->name('product.store')->middleware('checkRole');
    Route::GET('/product/create','ProductController@create')->name('product.create')->middleware('checkRole');
    Route::GET('/product/{product}','ProductController@show')->name('product.show');
    Route::post('/product/{product}','ProductController@update')->name('product.update')->middleware('checkRole');
    Route::delete('/product/{product}','ProductController@destroy')->name('product.destroy')->middleware('checkRole');
    Route::get('/product/{product}/edit','ProductController@edit')->name('product.edit')->middleware('checkRole');

    #Roles Route
    Route::get('/roles','RolesController@index')->name('roles.index');
    Route::post('/roles','RolesController@store')->name('roles.store')->middleware('checkRole');
    Route::GET('/roles/create','RolesController@create')->name('roles.create')->middleware('checkRole');
    Route::GET('/roles/{roles}','RolesController@show')->name('roles.show');
    Route::post('/roles/{roles}','RolesController@update')->name('roles.update')->middleware('checkRole');
    Route::delete('/roles/{roles}','RolesController@destroy')->name('roles.destroy')->middleware('checkRole');
    Route::get('/roles/{roles}/edit','RolesController@edit')->name('roles.edit')->middleware('checkRole');

    #User Route
    Route::get('/users','UsersController@index')->name('users.index');
    Route::post('/users','UsersController@store')->name('users.store')->middleware('checkRole');
    Route::GET('/users/create','UsersController@create')->name('users.create')->middleware('checkRole');
    Route::GET('/users/{users}','UsersController@show')->name('users.show');
    Route::post('/users/{users}','UsersController@update')->name('users.update')->middleware('checkRole');
    Route::delete('/users/{users}','UsersController@destroy')->name('users.destroy')->middleware('checkRole');
    Route::get('/users/{users}/edit','UsersController@edit')->name('users.edit')->middleware('checkRole');

    #Report Route
    Route::get('/report/sale-report','ReportController@saleReport')->name('sale.report');
    Route::get('/report/cutomer-report','BargraphContoller@index')->name('customer.report');
    Route::get('/report/coupon-report','ReportController@couponReport')->name('coupon.report');

    });

});

Route::post('/dropdown','Admin\\ProductController@dropdownCat')->name('dropdown_route');
Route::any('/getproduct','Eshopper\\EshopperController@featuresItem')->name('getproducts');
Route::get('eshopper', 'Eshopper\\EshopperController@index')->name('eshopper');

Route::prefix('/eshopper')->namespace('Eshopper\\')->group(function(){
   
    #Login Route
    Route::get('/login','EshopperController@userLogin')->name('userlogin');
    Route::middleware(['sessionTimeOut'])->group(function () {
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
    Route::get('/profile/my/wish-list','EshopperController@myWishList')->name('user.mywishlist');

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
});


Route::prefix('/eshopper')->namespace('Eshoppeer\\')->group(function(){
    Route::middleware(['sessionTimeOut'])->group(function () {
    #shipping address Route
    
    Route::post('/address', 'AddressController@store')->name('address.store');
    Route::get('/address', 'AddressController@index')->name('address.index');
    Route::get('/address/create', 'AddressController@create')->name('address.create');
    Route::delete('/address/{address}', 'AddressController@destroy')->name('address.destroy');
    Route::post('/address/{address}', 'AddressController@update')->name('address.update');
    Route::get('/address/{address}', 'AddressController@show')->name('address.show');
    Route::get('/address/{address}/edit', 'AddressController@edit')->name('address.edit');
    });
});

// Paypal Route
Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'AddMoneyController@payWithPaypal',));
Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'payment.status','uses' => 'AddMoneyController@getPaymentStatus',));

//mailchimp subscription Route
Route::get('manageMailChimp', 'MailChimpController@manageMailChimp');
Route::post('subscribe',['as'=>'subscribe','uses'=>'MailChimpController@subscribe']);
Route::post('sendCompaign',['as'=>'sendCompaign','uses'=>'MailChimpController@sendCompaign']);

// Google Login Route
Route::get('google', function () {
    return view('googleAuth');
});
Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');


