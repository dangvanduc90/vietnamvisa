<?php

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::prefix('thiet-lap')->group(function () {
    	Route::get('/thong-tin-chung', 'Admin\WebinfoController@commonInfo')->name('thong-tin-chung');
    	Route::post('/thong-tin-chung/thay-doi', 'Admin\WebinfoController@postCommonInfo')->name('thong-tin-chung.post');

    	Route::get('/header', 'Admin\WebinfoController@headerInfo')->name('header');
    	Route::post('/header/thay-doi', 'Admin\WebinfoController@postHeaderInfo')->name('header.post');

    	Route::get('/menu', 'Admin\WebinfoController@menu')->name('menu');
    });
    Route::get('/', 'Admin\WebinfoController@commonInfo');

	//Content
	Route::resource('content', 'Admin\ContentController');
	Route::post('/mutile-update/content', 'Admin\ContentController@mutileUpdate')
	->name('mutileUpdate.content');

	//Section
	Route::resource('section', 'Admin\SectionController');
	Route::post('/mutile-update/section', 'Admin\SectionController@mutileUpdate')
	->name('mutileUpdate.section');

	Route::resource('contact', 'Admin\ContactController');
	Route::post('/mutile-update/contact', 'Admin\ContactController@mutileUpdate')
	->name('mutileUpdate.contact');

	//Post
	Route::resource('post', 'Admin\PostController');
	Route::post('/mutile-update/post', 'Admin\PostController@mutileUpdate')
	->name('mutileUpdate.post');
	Route::resource('product', 'Admin\ProductController');
	Route::post('/mutile-update/product', 'Admin\ProductController@mutileUpdate')
	->name('mutileUpdate.product');

	//Album
	Route::resource('album', 'Admin\AlbumController');
	Route::post('/mutile-update/album', 'Admin\AlbumController@mutileUpdate')
	->name('mutileUpdate.album');
	Route::get('/get-image/autocomplete', 'Admin\AlbumController@getImage')
	->name('get-image');

	//Category
	Route::resource('category', 'Admin\CategoryController');
	Route::post('/mutile-update/category', 'Admin\CategoryController@mutileUpdate')
	->name('mutileUpdate.category');

	Route::resource('category-product', 'Admin\CategoryProductController');
	Route::post('/mutile-update/category-product', 'Admin\CategoryProductController@mutileUpdate')
	->name('mutileUpdate.category-product');

	//Tag
	Route::resource('tag', 'Admin\TagController');
	Route::post('/mutile-update/tag', 'Admin\TagController@mutileUpdate')
	->name('mutileUpdate.tag');

	//Icon
	Route::resource('icon', 'Admin\IconController');
	Route::post('/mutile-update/icon', 'Admin\IconController@mutileUpdate')
	->name('mutileUpdate.icon');

	//Seo
	Route::resource('seo', 'Admin\SeoController');
	Route::post('/mutile-update/seo', 'Admin\SeoController@mutileUpdate')
	->name('mutileUpdate.seo');

	//Media
	Route::resource('media', 'Admin\MediaController');
	Route::post('/mutile-update/media', 'Admin\MediaController@mutileUpdate')
	->name('mutileUpdate.media');

	//Home
	Route::get('/home', 'Admin\HomeController@adminHome')->name('admin.home');

	//User
	Route::resource('user', 'Admin\UserController');
	Route::get('/profile', 'Admin\UserController@getProfile')->name('profile.get');
	Route::post('/profile', 'Admin\UserController@postProfile')->name('profile.post');
	Route::post('/mutile-update/user', 'Admin\UserController@mutileUpdate')
	->name('mutileUpdate.user');

	//Webinfo
	Route::resource('webinfo', 'Admin\WebinfoController');
	Route::post('/mutile-update/webinfo', 'Admin\WebinfoController@mutileUpdate')
	->name('mutileUpdate.webinfo');

	//Page
	Route::resource('page', 'Admin\PageController');
	Route::post('/mutile-update/page', 'Admin\PageController@mutileUpdate')
	->name('mutileUpdate.page');

	//Banner
	Route::resource('banner', 'Admin\BannerController');
	Route::post('/mutile-update/banner', 'Admin\BannerController@mutileUpdate')
	->name('mutileUpdate.banner');

	//Logs
	Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')
	->name('admin.logs');

	//Files
	Route::get('/files', function () {
    	return view('back-end.pages.files');
	})->name('admin.files');

	//Slug
	Route::get('/create-slug', 'Admin\HomeController@createSlug')
	->name('create-slug');
});

?>
