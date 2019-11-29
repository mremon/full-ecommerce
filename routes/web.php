<?php



Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes=======
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

//admin section==========
//Categories=======
Route::get('admin/categories', 'Admin\Category\CategoryController@category')->name('categories');
Route::post('admin/store/category', 'Admin\Category\CategoryController@storecategory')->name('store.category');
Route::get('delete/category/{id}', 'Admin\Category\CategoryController@deletecategory');
Route::get('edit/category/{id}', 'Admin\Category\CategoryController@editcategory');
Route::post('update/category/{id}', 'Admin\Category\CategoryController@updatecategory');

//Brands==========
Route::get('admin/brands', 'Admin\Category\BrandController@brand')->name('brands');
Route::post('admin/store/brand', 'Admin\Category\BrandController@storebrand')->name('store.brand');
Route::get('delete/brand/{id}', 'Admin\Category\BrandController@deletebrand');
Route::get('edit/brand/{id}', 'Admin\Category\BrandController@editbrand');
Route::post('update/brand/{id}', 'Admin\Category\BrandController@updatebrand');

//Sub Categories==========
Route::get('admin/sub/category', 'Admin\Category\SubcategoryController@subcategory')->name('sub.categories');
Route::post('admin/store/subcategory', 'Admin\Category\SubcategoryController@storesubcategory')->name('store.subcategory');
Route::get('delete/subcategory/{id}', 'Admin\Category\SubcategoryController@deletesubcategory');
Route::get('edit/subcategory/{id}', 'Admin\Category\SubcategoryController@editsubcategory');
Route::post('update/subcategory/{id}', 'Admin\Category\SubcategoryController@updatesubcategory');

//Coupon=========
Route::get('admin/coupon', 'Admin\CouponController@coupon')->name('admin.coupon');
Route::post('admin/store/coupon', 'Admin\CouponController@storecoupon')->name('store.coupon');
Route::get('delete/coupon/{id}', 'Admin\CouponController@deletecoupon');
Route::get('edit/coupon/{id}', 'Admin\CouponController@editcoupon');
Route::post('update/coupon/{id}', 'Admin\CouponController@updatecoupon');



//Offer handel==========
Route::get('set/offer', 'Admin\setOfferController@setoffer')->name('admin.offerhandel');
Route::post('update/date/{id}', 'Admin\setOfferController@updatedate');
Route::post('update/front/page/offer/title/{id}', 'Admin\setOfferController@updatefrontpageoffertitle');
Route::post('update/offer/banner/{id}', 'Admin\setOfferController@updateofferbanner');


//Newslater=========
Route::get('admin/newslater', 'Admin\Others\NewslaterController@newslater')->name('admin.newslater');
Route::get('delete/newslater/{id}', 'Admin\Others\NewslaterController@deletenewslater');


//front Setting=========
Route::get('admin/front/setting', 'Admin\frontsettingController@frontsetting')->name('admin.frontsetting');
Route::post('update/front/setting/{id}', 'Admin\frontsettingController@updatefrontsetting');


//product==========
Route::get('admin/product/all', 'Admin\Product\ProductController@index')->name('all.product');
Route::get('admin/product/add', 'Admin\Product\ProductController@create')->name('add.product');
Route::post('admin/store/product', 'Admin\Product\ProductController@storeproduct')->name('store.product');
Route::get('inactive/product/{id}', 'Admin\Product\ProductController@inactive');
Route::get('active/product/{id}', 'Admin\Product\ProductController@active');
Route::get('delete/product/{id}', 'Admin\Product\ProductController@deleteproduct');
Route::get('view/product/{id}', 'Admin\Product\ProductController@viewproduct');
Route::get('edit/product/{id}', 'Admin\Product\ProductController@editproduct');
Route::post('update/product/all/{id}', 'Admin\Product\ProductController@updateproductall');

		//Get SubCategory By Ajax
Route::get('get/subcategory/{category_id}', 'Admin\Product\ProductController@getsubcategory');


//Blog post category========
Route::get('post/categtory', 'Admin\Blog\PostcategoryController@postcategory')->name('post.categtory');
Route::post('store/post/category', 'Admin\Blog\PostcategoryController@storepostcategory')->name('store.post.category');
Route::get('delete/post/category/{id}', 'Admin\Blog\PostcategoryController@deletepostcategory');
Route::get('edit/post/category/{id}', 'Admin\Blog\PostcategoryController@editpostcategory');
Route::post('update/post/category/{id}', 'Admin\Blog\PostcategoryController@updatepostcategory');


//Blog post ==========
Route::get('add/blog/post', 'Admin\Blog\PostController@create')->name('add.blogpost');
Route::post('admin/store/post', 'Admin\Blog\PostController@storepost')->name('store.post');
Route::get('admin/all/blogpost', 'Admin\Blog\PostController@index')->name('all.blogpost');
Route::get('delete/post/{id}', 'Admin\Blog\PostController@destroypost');
Route::get('edit/post/{id}', 'Admin\Blog\PostController@editpost');
Route::post('update/post/{id}', 'Admin\Blog\PostController@updatepost');



//All Frontend controller are here===========

Route::post('store/newslater', 'FrontController@newslater')->name('store.newslater');
Route::post('search/result', 'FrontController@searchproduct')->name('search.product');
Route::get('product/details/{product_slug}/{id}', 'ProductController@productview');
Route::get('category/{category_slug}/{id}', 'FrontController@singlecategory');
Route::get('category/{category_slug}/{subcategory_slug}/{category_id}/{id}', 'FrontController@singlesubcategory');
Route::get('trends', 'FrontController@trendsshow')->name('trends.show');
Route::get('bestrated', 'FrontController@bestratedshow')->name('bestrated.show');
Route::get('special/offer/', 'FrontController@specialoffer')->name('seasonoffer.show');
Route::get('special/offer/flash', 'FrontController@flashoffer')->name('flashsale.show');



Route::get('contact', 'FrontController@contact')->name('contact');
Route::get('wholesale', 'FrontController@wholesale')->name('wholesale');


// Blog user
Route::get('blog', 'BlogController@blog')->name('blog');
Route::get('language/bangla', 'BlogController@bangla')->name('language.bangla');
Route::get('language/english', 'BlogController@english')->name('language.english');
Route::get('blog/post/{id}/{post_title_en_slug}', 'BlogController@singleposten');
Route::get('blog/post/{id}/{post_title_bn_slug}', 'BlogController@singlepostbn');



//Customer/User Profile related routes


//wishlist
Route::get('add/wishlist/{id}', 'WishlistController@addwishlist');
Route::get('user/wishlist', 'CartController@wishlistshow')->name('user.wishlist');

//add cart
Route::get('add/to/cart/{id}', 'CartController@addcart');
Route::get('check', 'CartController@check');
Route::get('product/cart', 'CartController@showCart')->name('show.cart');
Route::get('remove/cart/{rowId}', 'CartController@removeCart');
Route::post('update/cart/item', 'CartController@updateCart')->name('update.cartitem');
Route::post('cart/product/add/{id}', 'CartController@detailscartadd');
Route::get('cart/product/view/{id}', 'CartController@productcartview');
Route::post('insert/into/cart', 'CartController@insertproductcart')->name('insert.into.cart');

Route::get('user/checkout', 'CartController@checkout')->name('user.checkout');
Route::get('user/cart/allremove', 'CartController@cartallremove')->name('user.cart.allremove');

Route::post('user/apply/coupon', 'CartController@applycoupon')->name('apply.coupon');
Route::get('coupon/remove', 'CartController@couponremove')->name('coupon.remove');
Route::get('payment/page', 'CartController@paymentpage')->name('payment.step');

//paymeny process
Route::post('user/review', 'front@payment')->name('payment.process');



// Review
Route::post('user/payment/process', 'FrontController@review')->name('user.review');

// Socialite

 Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
 Route::get('/callback/{provider}', 'SocialController@callback');







