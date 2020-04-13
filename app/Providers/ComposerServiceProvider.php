<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Admin\Webinfo;
use Harimayco\Menu\Facades\Menu;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function htmlChildMenu($obj){
        $_html = '';
        $_html .= "<li class='menu-item menu-item-type-post_type menu-item-object-page'>";
        $_html .= "<a href='".$obj['link']."'>";
        $_html .= " ".$obj['label'];
        $_html .= "</a>";
        if(sizeof($obj['child']) > 0){
            $_html .= '<ul class="sub-menu">';
            foreach($obj['child'] as $_menu){
                $_html .= $this->htmlChildMenu($_menu);
            }
            $_html .= '</ul>';
        }
        $_html .= '</li>';
        return $_html;
    }

    public function boot()
    {

        View::composer('front-end.layouts.*', function ($view) {
            $webinfo = Webinfo::where('name','thong-tin-chung')->first();
            if($webinfo == null) abort(404);
            $headerinfo = Webinfo::where('name','header')->first();
            if($headerinfo == null) abort(404);
            $menu = Menu::getByName('Main menu');
            $htmlMenu = '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home">
                            <a href="'.route('home').'">
                                <i class="fa fa-home" aria-hidden="true"></i>
                            </a>
                        </li>';
            foreach($menu as $_menu){
                $liClass = "menu-item menu-item-type-post_type menu-item-object-page menu-item-home";
                if(sizeof($_menu['child']) > 0){
                    $liClass .= "long-menu menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children";
                }
                $htmlMenu .= "<li class='".$liClass."'>";
                $htmlMenu .= "<a href='".$_menu['link']."'>";
                $htmlMenu .= " ".$_menu['label'];
                $htmlMenu .= "</a>";
                if(sizeof($_menu['child']) > 0){
                    $htmlMenu .= '<ul class="sub-menu">';
                    foreach($_menu['child'] as $_m){
                        $htmlMenu .= $this->htmlChildMenu($_m);
                    }
                    $htmlMenu .= '</ul>';
                }
                $htmlMenu .= '</li>';
            }

            $menu2 = Menu::getByName('Footer menu');
            $htmlMenu2 = '';
            foreach($menu2 as $_menu){
                $_tmp = '<div class="col-md-3 footer-sidebar col-sm-12">';
                $_tmp .= '<div class="title-side-ft">'.$_menu['label'].'</div>';
                if(sizeof($_menu['child']) > 0){
                    $_tmp .= '<ul class="menu-footer">';
                    foreach($_menu['child'] as $_m){
                         $_tmp .= '<li><a href="'.$_m['link'].'">'.$_m['label'].'</a></li>';
                    }
                    $_tmp .= '</ul>';
                }
                $_tmp .= '</div>';
                $htmlMenu2 .= $_tmp;
            }

            $view->with(['menu'=> $htmlMenu]);
            $view->with(['footer_menu'=> $htmlMenu2]);
            $view->with(['webinfo'=>json_decode($webinfo->content)]);
            $view->with(['headerinfo'=>json_decode($headerinfo->content)]);
        });
        //START CONTENT
        View::composer('backend.content.*', function ($view) {
            $view->with(['flag'=>'content','page_name'=>'CONTENT', 'name_session'=>'content']);
        });
        View::composer(['backend.content.create', 'backend.content.edit'], function ($view) {
            $view->with(['parent_menu'=>'Danh sách - CONTENT', 'parent_route'=>route('content.index')]);
        });
        View::composer(['backend.content.list', 'backend.content.edit'], function ($view) {
            $view->with(['name_button'=>'Thêm mới',
                        'route_button'=>route('content.create'),
                        'route_update'=>route('mutileUpdate.content')]);
        });
        //END CONTENT

        //START SECTION
        View::composer('backend.section.*', function ($view) {
            $view->with(['flag'=>'section','page_name'=>'SECTION', 'name_session'=>'section']);
        });
        View::composer(['backend.section.create', 'backend.section.edit'], function ($view) {
            $view->with(['parent_menu'=>'Danh sách - SECTION', 'parent_route'=>route('section.index')]);
        });
        View::composer(['backend.section.list', 'backend.section.edit'], function ($view) {
            $view->with(['name_button'=>'Thêm mới',
                        'route_button'=>route('section.create'),
                        'route_update'=>route('mutileUpdate.section')]);
        });
        //END SECTION

        //START SECTION
        View::composer('backend.contact.*', function ($view) {
            $view->with(['flag'=>'contact','page_name'=>'LIÊN HỆ', 'name_session'=>'contact']);
        });
        View::composer(['backend.contact.create', 'backend.contact.edit'], function ($view) {
            $view->with(['parent_menu'=>'Danh sách - LIÊN HỆ', 'parent_route'=>route('contact.index')]);
        });
        View::composer(['backend.contact.list', 'backend.contact.edit'], function ($view) {
            $view->with(['name_button'=>'Thêm mới',
                        'route_button'=>route('contact.create'),
                        'route_update'=>route('mutileUpdate.contact')]);
        });
        //END SECTION

        View::composer('backend.pages.files', function ($view) {
            $view->with(['page_name'=>'Files', 'flag'=>'files']);
        });

        View::composer('backend.pages.home', function ($view) {
            $view->with(['page_name'=>'Bảng Tin', 'flag'=>'admin-home']);
        });

        //START USER
        View::composer('backend.users.*', function ($view) {
            $view->with(['flag'=>'users','page_name'=>'Người Dùng', 'name_session'=>'user']);
        });
        View::composer(['backend.users.create', 'backend.users.edit'], function ($view) {
            $view->with(['parent_menu'=>'Danh sách - Người Dùng', 'parent_route'=>route('user.index')]);
        });
        View::composer(['backend.users.list', 'backend.users.edit'], function ($view) {
            $view->with(['name_button'=>'Thêm mới',
                        'route_button'=>route('user.create'),
                        'route_update'=>route('mutileUpdate.user')]);
        });
        //END USER

        // //START WEB INFO
        // View::composer('backend.webinfo.*', function ($view) {
        //     $view->with(['flag'=>'webinfo','page_name'=>'Thông Tin Website', 'name_session'=>'webinfo']);
        // });
        // View::composer(['backend.webinfo.create', 'backend.webinfo.edit'], function ($view) {
        //     $view->with(['parent_menu'=>'Danh sách - Thông Tin Website', 'parent_route'=>route('webinfo.index')]);
        // });
        // View::composer(['backend.webinfo.list', 'backend.webinfo.edit'], function ($view) {
        //     $view->with(['name_button'=>'Thêm mới',
        //                 'route_button'=>route('webinfo.create'),
        //                 'route_update'=>route('mutileUpdate.webinfo')]);
        // });
        // //END WEB INFO

        //START PAGE
        View::composer('backend.page.*', function ($view) {
            $view->with(['flag'=>'page','page_name'=>'Trang', 'name_session'=>'page']);
        });
        View::composer(['backend.page.create', 'backend.page.edit'], function ($view) {
            $view->with(['parent_menu'=>'Danh sách - Trang', 'parent_route'=>route('page.index')]);
        });
        View::composer(['backend.page.list', 'backend.page.edit'], function ($view) {
            $view->with(['name_button'=>'Thêm mới',
                        'route_button'=>route('page.create'),
                        'route_update'=>route('mutileUpdate.page')]);
        });
        //END PAGE

        //START BANNER
        View::composer('backend.banner.*', function ($view) {
            $view->with(['flag'=>'banner','page_name'=>'Banner', 'name_session'=>'banner']);
        });
        View::composer(['backend.banner.create', 'backend.banner.edit'], function ($view) {
            $view->with(['parent_menu'=>'Danh sách - Banner', 'parent_route'=>route('banner.index')]);
        });
        View::composer(['backend.banner.list', 'backend.banner.edit'], function ($view) {
            $view->with(['name_button'=>'Thêm mới',
                        'route_button'=>route('banner.create'),
                        'route_update'=>route('mutileUpdate.banner')]);
        });
        //END BANNER

        //START SEO
        View::composer('backend.seo.*', function ($view) {
            $view->with(['flag'=>'seo','page_name'=>'SEO', 'name_session'=>'seo']);
        });
        View::composer(['backend.seo.create', 'backend.seo.edit'], function ($view) {
            $view->with(['parent_menu'=>'Danh sách - SEO', 'parent_route'=>route('seo.index')]);
        });
        View::composer(['backend.seo.list', 'backend.seo.edit'], function ($view) {
            $view->with(['name_button'=>'Thêm mới',
                        'route_button'=>route('seo.create'),
                        'route_update'=>route('mutileUpdate.seo')]);
        });
        //END SEO

        //START MEDIA
        View::composer('backend.media.*', function ($view) {
            $view->with(['flag'=>'media','page_name'=>'MEDIA', 'name_session'=>'media']);
        });
        View::composer(['backend.media.create', 'backend.media.edit'], function ($view) {
            $view->with(['parent_menu'=>'Danh sách - MEDIA', 'parent_route'=>route('media.index')]);
        });
        View::composer(['backend.media.list', 'backend.media.edit'], function ($view) {
            $view->with(['name_button'=>'Thêm mới',
                        'route_button'=>route('media.create'),
                        'route_update'=>route('mutileUpdate.media')]);
        });
        //END MEDIA

        //START ICON
        View::composer('backend.icon.*', function ($view) {
            $view->with(['flag'=>'icon','page_name'=>'ICON', 'name_session'=>'icon']);
        });
        View::composer(['backend.media.create', 'backend.media.edit'], function ($view) {
            $view->with(['parent_menu'=>'Danh sách - ICON', 'parent_route'=>route('icon.index')]);
        });
        View::composer(['backend.icon.list', 'backend.icon.edit'], function ($view) {
            $view->with(['name_button'=>'Thêm mới',
                        'route_button'=>route('icon.create'),
                        'route_update'=>route('mutileUpdate.icon')]);
        });
        //END ICON

        //START TAG
        View::composer('backend.tag.*', function ($view) {
            $view->with(['flag'=>'tag','page_name'=>'TAG', 'name_session'=>'tag']);
        });
        View::composer(['backend.tag.create', 'backend.tag.edit'], function ($view) {
            $view->with(['parent_menu'=>'Danh sách - TAGS', 'parent_route'=>route('tag.index')]);
        });
        View::composer(['backend.tag.list', 'backend.tag.edit'], function ($view) {
            $view->with(['name_button'=>'Thêm mới',
                        'route_button'=>route('tag.create'),
                        'route_update'=>route('mutileUpdate.tag')]);
        });
        //END TAG

        //START CATEGORY
        View::composer('backend.category.*', function ($view) {
            $view->with(['flag'=>'category','page_name'=>'CHUYÊN MỤC', 'name_session'=>'category']);
        });
        View::composer(['backend.category.create', 'backend.category.edit'], function ($view) {
            $view->with(['parent_menu'=>'Danh sách - CHUYÊN MỤC', 'parent_route'=>route('category.index')]);
        });
        View::composer(['backend.category.list', 'backend.category.edit'], function ($view) {
            $view->with(['name_button'=>'Thêm mới',
                        'route_button'=>route('category.create'),
                        'route_update'=>route('mutileUpdate.category')]);
        });
        //END CATEGORY

        //START CATEGORY
        View::composer('backend.category-product.*', function ($view) {
            $view->with(['flag'=>'category-product','page_name'=>'DANH MỤC SẢN PHẨM', 'name_session'=>'category-product']);
        });
        View::composer(['backend.category-product.create', 'backend.category-product.edit'], function ($view) {
            $view->with(['parent_menu'=>'Danh sách - DANH MỤC SẢN PHẨM', 'parent_route'=>route('category-product.index')]);
        });
        View::composer(['backend.category-product.list', 'backend.category-product.edit'], function ($view) {
            $view->with(['name_button'=>'Thêm mới',
                        'route_button'=>route('category-product.create'),
                        'route_update'=>route('mutileUpdate.category-product')]);
        });
        //END CATEGORY

        //START POST
        View::composer('backend.post.*', function ($view) {
            $view->with(['flag'=>'post','page_name'=>'BÀI VIẾT', 'name_session'=>'post']);
        });
        View::composer(['backend.post.create', 'backend.post.edit'], function ($view) {
            $view->with(['parent_menu'=>'Danh sách - BÀI VIẾT', 'parent_route'=>route('post.index')]);
        });
        View::composer(['backend.post.list', 'backend.post.edit'], function ($view) {
            $view->with(['name_button'=>'Thêm mới',
                        'route_button'=>route('post.create'),
                        'route_update'=>route('mutileUpdate.post')]);
        });
        //END POST

        //START POST
        View::composer('backend.product.*', function ($view) {
            $view->with(['flag'=>'product','page_name'=>'SẢN PHẨM', 'name_session'=>'product']);
        });
        View::composer(['backend.product.create', 'backend.product.edit'], function ($view) {
            $view->with(['parent_menu'=>'Danh sách - SẢN PHẨM', 'parent_route'=>route('product.index')]);
        });
        View::composer(['backend.product.list', 'backend.product.edit'], function ($view) {
            $view->with(['name_button'=>'Thêm mới',
                        'route_button'=>route('product.create'),
                        'route_update'=>route('mutileUpdate.product')]);
        });
        //END POST

        //START ALBUM
        View::composer('backend.album.*', function ($view) {
            $view->with(['flag'=>'album','page_name'=>'ALBUM', 'name_session'=>'album']);
        });
        View::composer(['backend.album.create', 'backend.album.edit'], function ($view) {
            $view->with(['parent_menu'=>'Danh sách - ALBUM', 'parent_route'=>route('album.index')]);
        });
        View::composer(['backend.album.list', 'backend.album.edit'], function ($view) {
            $view->with(['name_button'=>'Thêm mới',
                        'route_button'=>route('album.create'),
                        'route_update'=>route('mutileUpdate.album')]);
        });
        //END ALBUM


        // View::composer(
        //     'partials.navigation', 'App\Http\ViewComposers\NavigationViewComposer'
        // );
    }
}
