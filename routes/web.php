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




Route::middleware('guest')->get('/sign_in', 'CAuth\Authentication@login')->name('sign_in');


Route::middleware('guest')->post('/register', 'CAuth\Authentication@register')->name('register');
Route::middleware('guest')->get('/verify_account/{token}', 'CAuth\Authentication@verify_account')->name('verify_account');
Route::get('email_password_reset', 'CAuth\Authentication@emailPasswordReset')->name('emailPasswordResetView');
Route::get('sendResetEmail', 'CAuth\Authentication@sendResetEmail')->name('sendResetEmail');
Route::get('reset_password/{token}', 'CAuth\Authentication@reset_password')->name('reset_password');
Route::patch('reset_password_action', 'CAuth\Authentication@reset_password_action')->name('reset_password_action');

// filter 
Route::get('product/sort', 'FilterController@sort')->name('products.sort');
Route::get('volume.filter', 'FilterController@sort')->name('volume.filter');


Route::group(['prefix' => 'manage', 'middleware' => ['role:superadministrator|administration', 'auth']], function () {
	Route::get('/dashboard', ['uses'=>'AdminController@index','as'=>'dashboard']); 
	Route::resource('brands', 'BrandController');
	Route::resource('categories', 'CategoryController');
	Route::resource('volumes', 'VolumeController');
	Route::resource('roles', 'RoleController');
	Route::resource('permissions', 'PermissionController');
	Route::resource('users', 'UserController');
	Route::resource('carousels', 'CarouselController');
	Route::resource('products', 'ProductController');
	Route::post('add_product_volumes', 'ProductController@add_product_volumes')->name('add_product_volumes');
	Route::get('product_volume_index/{id}', 'ProductController@product_volume_index')->name('product_volume_index');
	Route::get('product_volume_edit/{id}', 'ProductController@product_volume_edit')->name('product_volumes.edit');
	Route::put('update_product_volume/{id}', 'ProductController@update_product_volume')->name('update.product_volume');
	Route::get('products-volume/{id}', 'ProductController@add_products_volume')->name('products.add_volume');
	Route::get('viewOrder/{id}/{notification_id?}', 'OrderController@viewOrder')->name('viewOrder');
	Route::get('orders', 'OrderController@index')->name('orders.index');

});

Route::middleware('auth')->group(function(){
	Route::get('account_info', 'UserController@accountInfo')->name('account_info');
});

Route::get('choose_language/{locale}', function ($locale) {
	session()->put('locale', $locale);
	App::setLocale(Session::get('locale'));
	// dd(Session::get('locale'));
	return redirect()->back();
})->name('lang');

Route::group(
	[
		// 'prefix' => '{locale}', 
		// 'where' => ['locale' => '[a-zA-Z]{2}'], 
		'middleware' => 'localization'
	], 
	function() {
		Route::middleware('guest')->get('/login', 'Pages\LoginPageController@loginPage')->name('login');
		Route::middleware('guest')->get('/register', 'Pages\RegisterPageController@registerPage')->name('register');
		Route::get('/', 'Pages\HomePageController@homePage')->name('/');
		Route::get('products/{category}', 'Pages\ProductPageController@productPage')->name('products');
		Route::get('drinks/{slug}', 'Pages\HomePageController@productSingle')->name('productSingle');
		Route::get('cartPage', 'ProductController@cartPage')->name('cartPage');
		Route::get('checkout', 'OrderController@checkOut')->name('checkOut');
		Route::get('buyDirectly', 'OrderController@buyDirectly')->name('buyDirectly');
	}
);
Route::post('/logout', 'CAuth\Authentication@logout')->name('logout'); 




Route::get('add_to_cart', 'ProductController@add_to_cart')->name('add_to_cart');
Route::get('updateCart/{key}', 'ProductController@updateCart')->name('updateCart');
Route::get('removeItemFromCart/{key}', 'ProductController@removeItemFromCart')->name('removeItemFromCart');
Route::post('/orderProduct', 'OrderController@orderProduct')->name('orderProduct');
Route::get('confirm_delivery_code/{deliveryCode}', 'OrderController@confirmDeliveryCode')->name('confirmDeliveryCode');
Route::get('getNotifications', 'NotificationController@index')->name('notifications.index');
Route::get('confirmPayment/{id}', 'OrderController@confirmPayment')->name('confirmPayment');

Route::get('test', function () {
	// $cart = Cart::content();
	// dd(\App\User::whereRoleIs('superadministrator')->get());
	// foreach ($cart as $key => $value) {
	// 	$v = $value->id;
	// 	dd($v);
	// }
	// dd((Auth::user()->unreadNotifications[0]->data['data']['cart']));
	// foreach (Auth::user()->notifications as $key => $value) {
	// 	print_r($value);
	// }
	// $order = \App\Order::find(12)->cart;
	// dd(unserialize($order));
	$notifications = Auth::user()->unreadNotifications;
	return $notifications;
});

// Route::get('test_template', function () {
// 	return view('pages.invoice');
// });
















// Route::get('/productss', function () {
// 	return view('products');
// });

// Route::get('/registers', function () {
// 	return view('register');
// });

// Route::get('/logins', function () {
// 		return view('login');
// });

// Route::get('/test', function () {
// 	return view('test');
// });