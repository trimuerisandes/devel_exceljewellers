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
    
})->name('main');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/thankyou','ProductController@thankyou');

// Route::resource('product/item', 'ItemController');

// Route::resource('/product','PageController');

// Route::get('/product', 'PageController@product')->name('product');

Route::get('/shopcart','ItemController@cart');

Route::post('/add-setting', 'ItemController@addsetting');

Route::post('/add-cart', 'ItemController@addcart');

Route::post('/remove-item', 'ItemController@removeitem');

Route::post('/refresh','ItemController@cartrefresh');

// Category
Route::get('/category-engagement-ring','CategoryController@engagement_ring');

Route::get('/category-wedding-band','CategoryController@wedding_band');

Route::get('/category-fine-jewellery','CategoryController@fine_jewellery');

Route::get('/category-diamond','CategoryController@diamond');

// Route::get('/category-education','CategoryController@education');
// Route::get('/category-services','CategoryController@services');

// Items/product
Route::post('/reviews','ItemController@getreviews');
Route::post('/submit_review','ItemController@postreview');

Route::get('/engagement-ring/{id}','ProductController@engagement_ring');

Route::get('/wedding-band/{id}','ProductController@wedding_band');

Route::get('/fine-jewellery/{id}','ProductController@fine_jewellery');

Route::get('/local/{id}','ProductController@local');

Route::get('/complete-ring','ProductController@complete_ring');

// Jewellery shop
Route::get('/engagement-ring','JewelleryController@engagement_ring');

Route::get('/wedding-band','JewelleryController@wedding_band');

Route::get('/fine-jewellery','JewelleryController@fine_jewellery');

Route::get('/local','JewelleryController@local');

Route::get('/search','JewelleryController@search');
// Education
Route::get('/education-diamond','EducationController@diamond');
Route::get('/education-diamond-shape','EducationController@diamond_shape');
Route::get('/education-diamond-color','EducationController@diamond_color');
Route::get('/education-diamond-clarity','EducationController@diamond_clarity');
Route::get('/education-diamond-carat','EducationController@diamond_carat');
Route::get('/education-diamond-cut','EducationController@diamond_cut');

Route::get('/education-engagement','EducationController@engagement');
Route::get('/education-eng-style','EducationController@eng_style');
Route::get('/education-eng-setting','EducationController@eng_setting');
Route::get('/education-eng-size','EducationController@eng_size');

Route::get('/education-weddingband','EducationController@weddingband');
Route::get('/education-weddingband-style','EducationController@weddingband_style');
Route::get('/education-weddingband-metal','EducationController@weddingband_metal');
Route::get('/education-weddingband-size','EducationController@weddingband_size');

// Route::get('/education-diamond','EducationController@diamond_cut');
// Route::get('/education-diamond','EducationController@diamond_clarity');
// Route::get('/education-diamond','EducationController@diamond_color');
// Route::get('/education-diamond','EducationController@diamond_carat');

// Fav

Route::get('/wishlist','AccountController@wishlist');


// shopping cart
Route::post('/update-item','ItemController@updateitem');

Route::post('/apply-coupon','CouponController@apply_coupon');

Route::post('/remove_promo','CouponController@remove_promo');

// Stripe Payment

Route::post('/payment-stripe','StripeController@payment');

Route::get('/payment','StripeController@payment');

Route::post('/create-checkout-session','StripeController@create_checkout');

Route::post('/stripe-payment','StripeController@stripe_payment');

// 

Route::post('/payment-paypal','PaypalController@payment');

// Route::post('/payment','StripeController@payment');

Route::get('create-payment','PaypalController@createpayment');

Route::post('execute-payment','PaypalController@executepayment');

Route::post('/shipping-rate','ItemController@shipping_rate');

Route::post('/payment-type','ItemController@payment_type');


// Moissanite
Route::get('/moissanite','JewelleryController@moissanite');

Route::get('/moissanite/{id}','ProductController@moissanite');

Route::post('/getmoissanite','AjaxController@getmoissanite');
// Lab-Grown
Route::get('/lab-grown-diamond','JewelleryController@lab_grown');

Route::get('/lab-grown-diamond/{id}','ProductController@lab_grown');

Route::post('/getlab-diamond','AjaxController@getlab_grown');
// Diamonds
Route::get('/diamonds','JewelleryController@diamonds');

Route::get('/diamonds/{id}','ProductController@diamonds');

Route::post('/get-diamonds','AjaxController@getdiamonds');


// Paypal

Route::post('process','PaypalController@process');

// account

Route::post('/address','AccountController@address');

Route::get('/orders','AccountController@orders');

Route::post('/add_address','AccountController@add_address');

Route::post('/delete_address','AccountController@delete_address');

Route::post('/edit_address','AccountController@edit_address');

Route::post('/returns','AccountController@returns');

Route::post('/initiate-return','AccountController@initiate_returns');


Route::group(['middleware' => 'auth'], function () {
// Shopping Cart
	Route::post('/favourite','ItemController@favourite');

	Route::post('/remove-fav','ItemController@removefav');

});

Route::get('/checkout','ItemController@checkout')->name('checkout');

// Google
Route::get('/google-login', 'GoogleController@redirectToProvider');

Route::get('/callback', 'GoogleController@handleProviderCallback');

// ajax

Route::post('/engagement-ring','AjaxController@engagement_setting');

Route::post('/wedding-band','AjaxController@wedding_bands');

Route::post('/fine-jewellery','AjaxController@fine_jewellerys');

Route::post('/local','AjaxController@local');

Route::post('/search','AjaxController@search');

Route::post('/shop-cart-num','AjaxController@cart_num');
// Admin
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/add-eng/{id}','AdminController@add_eng_id');

Route::get('/add-eng','AdminController@add_eng');

Route::post('/eng-post','AdminController@eng_post');

Route::get('/add-wedding','AdminController@add_wedding');
Route::post('/wedding-post','AdminController@wedding_post');

Route::get('/add-jewellery/{id}','AdminController@add_jewellery_id');

Route::get('/add-jewellery','AdminController@add_jewellery');

Route::get('/remove-silver','AdminController@remove_silver');

Route::post('/jewellery-post1','AdminController@jewellery_post1');

Route::post('/eng-post1','AdminPanelController@eng_post1');

// 
// custom
Route::get('custom-design','CustomDesignController@index');

Route::get('custom-design/rings','CustomDesignController@rings');

Route::get('custom-design/wedding-band','CustomDesignController@wedding_band');

Route::get('custom-design/pendant','CustomDesignController@pendant');

Route::get('custom-design/earring','CustomDesignController@earring');

Route::get('custom-design/bracelet-chain','CustomDesignController@bracelet_chain');

// Service
Route::get('trade-up','ServiceController@trade_up');
Route::get('appraisal','ServiceController@appraisal');
Route::get('warranty','ServiceController@warrenty');
Route::get('repair','ServiceController@repair');
Route::get('consignment','ServiceController@consignment');
Route::get('trade-sell','ServiceController@trade_sell');
Route::get('insurrance','ServiceController@insurrance');
Route::get('layaway-and-financing','ServiceController@layaway');
Route::get('about','ServiceController@company_info');
Route::post('verragio_show','ServiceController@booking');

// nav
Route::get('contact','ServiceController@contact_us');
Route::post('send-mail','ServiceController@send_mail');
Route::get('location','ServiceController@location');
Route::get('shipping-returns','ServiceController@shipping_returns');
Route::get('terms-condition','ServiceController@terms_condition');
Route::get('privacy-policy','ServiceController@privacy_policy');

Route::get('error','PageController@error');

Route::post('currency','AjaxController@currency');


// Redirect

Route::get('brands/warranty',function(){
	return redirect('warranty');
});

Route::get('gia-diamond-search',function(){
	return redirect('diamonds');
});

Route::get('diamond',function(){
	return redirect('education-diamond');
});

Route::get('brands/malo',function(){
	return redirect('wedding-band?category=malo');
});

Route::get('brands/verragio',function(){
	return redirect('engagement-ring?category=verragio');
});

Route::get('gabriel-co/#/mens-wedding-bands',function(){
	return redirect('wedding-band?category=gabrielco');
});

Route::get('brands/gabriel-co',function(){
	return redirect('engagement-ring?category=gabrielco');
});

Route::get('gabriel-co',function(){
	return redirect('engagement-ring?category=gabrielco');
});

Route::get('brands/valina-bridals',function(){
	return redirect('engagement-ring?category=valina');
});

Route::get('brands/romance',function(){
	return redirect('engagement-ring?category=romance');
});

Route::get('engagement',function(){
	return redirect('education-engagement');
});

Route::get('services/jewelry-repair',function(){
	return redirect('repair');
});

Route::get('services/consignment',function(){
	return redirect('consignment');
});

Route::get('services/appraisals',function(){
	return redirect('/appraisal');
});

Route::get('services/insurrance-replacement',function(){
	return redirect('/insurrance');
});

Route::get('services/trade-and-sell',function(){
	return redirect('/trade-sell');
});

Route::get('product-tag/men/',function(){
	return redirect('wedding-band?category=men%20classic');
});

Route::get('home/black-seal-120-61-exceljewellers-1132321/',function(){
	return redirect('location');
});

// admin

Route::get('diamond-test','AdminPanelController@test');

Route::get('convert_vid_to_360','AdminPanelController@turn_video_to_360');

Route::get('upload_360','AdminPanelController@upload_360_view');

Route::post('upload_video_to_360','AdminPanelController@upload_video_to_360');

Route::post('search_data_360','AdminPanelController@search_data_360');

Route::get('change_360_data','AdminPanelController@change_360_data');

Route::get('/add-excel','AdminPanelController@excel_view');

Route::post('/excel_insert','AdminPanelController@excel_insert');

Route::post('/excel_insert_stuller','AdminPanelController@excel_insert_stuller');

Route::get('/img_to_list','AdminPanelController@image_to_list');

Route::get('/img_cleanup','AdminPanelController@image_cleanup');

Route::get('/folder_360_uppercase','AdminPanelController@make_360_folder_uppercase');

Route::get('/test123',function(){
	return view('mail.coupon_template');
});