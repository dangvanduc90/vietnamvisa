<?php

Route::namespace('Admin')->group(function () {
//    auth admin
    Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'LoginController@login')->name('post.admin.login');

    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', 'LoginController@logout')->name('admin.logout');
        Route::group(['middleware' => ['auth:admin']], function () {
            Route::get('/home', 'HomeController@index');
        });

        Route::prefix('thiet-lap')->group(function () {
            Route::get('/thong-tin-chung', 'WebinfoController@commonInfo')->name('thong-tin-chung');
            Route::post('/thong-tin-chung/thay-doi', 'WebinfoController@postCommonInfo')->name('thong-tin-chung.post');

            Route::get('/header', 'WebinfoController@headerInfo')->name('header');
            Route::post('/header/thay-doi', 'WebinfoController@postHeaderInfo')->name('header.post');

            Route::get('/menu', 'WebinfoController@menu')->name('menu');
        });
        Route::get('/', 'WebinfoController@commonInfo')->name('admin.home');

        //Content
        Route::resource('content', 'ContentController');
        Route::post('/mutile-update/content', 'ContentController@mutileUpdate')
            ->name('mutileUpdate.content');

        //Section
        Route::resource('section', 'SectionController');
        Route::post('/mutile-update/section', 'SectionController@mutileUpdate')
            ->name('mutileUpdate.section');

        Route::resource('contact', 'ContactController');
        Route::post('/mutile-update/contact', 'ContactController@mutileUpdate')
            ->name('mutileUpdate.contact');

        //Post
        Route::resource('post', 'PostController');
        Route::post('/mutile-update/post', 'PostController@mutileUpdate')
            ->name('mutileUpdate.post');
        Route::resource('product', 'ProductController');
        Route::post('/mutile-update/product', 'ProductController@mutileUpdate')
            ->name('mutileUpdate.product');

        //Album
        Route::resource('album', 'AlbumController');
        Route::post('/mutile-update/album', 'AlbumController@mutileUpdate')
            ->name('mutileUpdate.album');
        Route::get('/get-image/autocomplete', 'AlbumController@getImage')
            ->name('get-image');

        //Category
        Route::resource('category', 'CategoryController');
        Route::post('/mutile-update/category', 'CategoryController@mutileUpdate')
            ->name('mutileUpdate.category');

        Route::resource('category-product', 'CategoryProductController');
        Route::post('/mutile-update/category-product', 'CategoryProductController@mutileUpdate')
            ->name('mutileUpdate.category-product');

        //Tag
        Route::resource('tag', 'TagController');
        Route::post('/mutile-update/tag', 'TagController@mutileUpdate')
            ->name('mutileUpdate.tag');

        //Icon
        Route::resource('icon', 'IconController');
        Route::post('/mutile-update/icon', 'IconController@mutileUpdate')
            ->name('mutileUpdate.icon');

        //Seo
        Route::resource('seo', 'SeoController');
        Route::post('/mutile-update/seo', 'SeoController@mutileUpdate')
            ->name('mutileUpdate.seo');

        //Media
        Route::resource('media', 'MediaController');
        Route::post('/mutile-update/media', 'MediaController@mutileUpdate')
            ->name('mutileUpdate.media');

        //Home
        Route::get('/home', 'HomeController@adminHome')->name('admin.home');

        //User
        Route::resource('user', 'UserController');
        Route::get('/profile', 'UserController@getProfile')->name('profile.get');
        Route::post('/profile', 'UserController@postProfile')->name('profile.post');
        Route::post('/mutile-update/user', 'UserController@mutileUpdate')
            ->name('mutileUpdate.user');

        //Webinfo
        Route::resource('webinfo', 'WebinfoController');
        Route::post('/mutile-update/webinfo', 'WebinfoController@mutileUpdate')
            ->name('mutileUpdate.webinfo');

        //Page
        Route::resource('page', 'PageController');
        Route::post('/mutile-update/page', 'PageController@mutileUpdate')
            ->name('mutileUpdate.page');

        //Banner
        Route::resource('banner', 'BannerController');
        Route::post('/mutile-update/banner', 'BannerController@mutileUpdate')
            ->name('mutileUpdate.banner');
        //Slug
        Route::get('/create-slug', 'HomeController@createSlug')
            ->name('create-slug');

        Route::prefix('visa')->group(function () {
            Route::resource('person', 'VisaPersonController');
            Route::post('/mutile-update/person', 'VisaPersonController@mutileUpdate')
                ->name('mutileUpdate.person');

            Route::resource('month', 'VisaMonthController');
            Route::post('/mutile-update/month', 'VisaMonthController@mutileUpdate')
                ->name('mutileUpdate.month');

            Route::resource('purpose', 'VisaPurposeController');
            Route::post('/mutile-update/purpose', 'VisaPurposeController@mutileUpdate')
                ->name('mutileUpdate.purpose');

            Route::resource('urgent', 'UrgentController');
            Route::post('/mutile-update/urgent', 'UrgentController@mutileUpdate')
                ->name('mutileUpdate.urgent');

            Route::resource('stamping', 'StampingController');
            Route::post('/mutile-update/stamping', 'StampingController@mutileUpdate')
                ->name('mutileUpdate.stamping');
        });

    });

});

//Logs
Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')
    ->name('admin.logs');

//Files
Route::get('/files', function () {
    return view('backend.pages.files');
})->name('admin.files');
