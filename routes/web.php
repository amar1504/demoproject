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
    Route::get('/subcategory/{id?}', 'CategoryController@showSubCat');
    Route::post('/subcategorystore', 'CategoryController@storeSubCategory')->name('subcateory.store');
    Route::post('/subcategorydestroy/{category}', 'CategoryController@destroySubCategory')->name('subcateory.destroy');
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

//subscription Route
Route::get('manageMailChimp', 'MailChimpController@manageMailChimp');
Route::post('subscribe',['as'=>'subscribe','uses'=>'MailChimpController@subscribe']);
Route::post('sendCompaign',['as'=>'sendCompaign','uses'=>'MailChimpController@sendCompaign']);






/*
//Eshopper forgot password Route
Route::get('eshopper', 'Eshopper\\EshopperController@index')->name('eshopper');
Route::get('eshopper/login','Eshopper\\EshopperController@userLogin')->name('userlogin');
Route::get('eshopper/product/{id?}','Eshopper\\EshopperController@product')->name('product');
Route::get('eshopper/forgotpassword/','Eshopper\\EshopperController@forgotPasswordview')->name('forgot.passwordview');
Route::post('eshopper/forgot-password/','Eshopper\\EshopperController@forgotPassword')->name('forgot.password');
Route::get('eshopper/product-details/{id?}','Eshopper\\EshopperController@productDetails')->name('product-details');
//wishlist
Route::get('eshopper/product/wishlist/{id?}','Eshopper\\EshopperController@wishList')->name('wishlist.add');
//Account 
Route::get('eshopper/user-profile','Eshopper\\EshopperController@userProfile')->name('user.profile');
Route::post('eshopper/profile/update','Eshopper\\EshopperController@userProfileUpdate')->name('user.update');
Route::get('eshopper/profile/change-password','Eshopper\\EshopperController@changePassword')->name('user.changepassword');
Route::post('eshopper/profile/update-password','Eshopper\\EshopperController@updatePassword')->name('user.updatepassword');
Route::get('eshopper/profile/my-orders','Eshopper\\EshopperController@myOrders')->name('user.myorders');
Route::get('eshopper/profile/my-order-details/{id}','Eshopper\\EshopperController@myOrderDetails')->name('user.myorderdetails');
Route::get('eshopper/profile/track-my-order','Eshopper\\EshopperController@trackOrderView')->name('user.trackorderview');
Route::post('eshopper/profile/track-my-order/your-order','Eshopper\\EshopperController@trackOrder')->name('user.trackorder');
//contact us cutomer -Route
Route::get('eshopper/contact-us','Eshopper\\EshopperController@contactUsView')->name('view.contactus');
Route::post('eshopper/contact-us/contact','Eshopper\\EshopperController@contactUs')->name('contactus.add');
*/


/*
Route::get('admin/banner','Admin\BannerController@index')->name('banner.index');
Route::POST('admin/banner','Admin\BannerController@store')->name('banner.store');
Route::GET('admin/banner/create','Admin\BannerController@create')->name('banner.create');
*/