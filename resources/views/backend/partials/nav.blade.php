<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
{{--            @include('backend.partials.nav-header')--}}
            <li class={{in_array($flag, ['thong-tin-chung', 'header', 'menu', 'page', 'banner', 'section', 'content', 'files']) ? "active" : ""}}>
                <a href="#"><i class="fa fa-wrench"></i> <span class="nav-label">Thiết lập website</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class={{$flag == "thong-tin-chung"  ? "active" : ""}}><a href="{{route('thong-tin-chung')}}">Thông tin chung</a></li>
                    <li class={{$flag == "page"  ? "active" : ""}}><a href="{{route('page.index')}}">Danh sách trang</a></li>
                    <li class={{$flag == "header"  ? "active" : ""}}><a href="{{route('header')}}">Header / Footer</a></li>
                    <li class={{$flag == "menu"  ? "active" : ""}}><a href="{{route('menu')}}">Menu</a></li>
                    <li class={{$flag == "banner"  ? "active" : ""}}><a href="{{route('banner.index')}}">Banner</a></li>
                    <li class={{$flag == "section"  ? "active" : ""}}><a href="{{route('section.index')}}">Cấu hình Section</a></li>
                    <li class={{$flag == "content"  ? "active" : ""}}><a href="{{route('content.index')}}">Cấu hình Content</a></li>
                    <li class={{$flag == "files"  ? "active" : ""}}><a href="{{route('admin.files')}}">Source Files</a></li>
                </ul>
            </li>

            <li class={{in_array($flag, ['category', 'post', 'contact']) ? "active" : ""}}>
                <a href="#"><i class="fa fa-tags"></i> <span class="nav-label">Tin tức</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class={{$flag == "category"  ? "active" : ""}}><a href="{{route('category.index')}}">Chuyên mục</a></li>
                    <li class={{$flag == "post"  ? "active" : ""}}><a href="{{route('post.index')}}">Bài viết</a></li>
                    <li class={{$flag == "contact"  ? "active" : ""}}><a href="{{route('contact.index')}}">Liên hệ</a></li>
                </ul>
            </li>

            <li class={{in_array($flag, ['category-product', 'product']) ? "active" : ""}}>
                <a href="#"><i class="fa fa-star"></i> <span class="nav-label">Sản phẩm</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class={{$flag == "category-product"  ? "active" : ""}}><a href="{{route('category-product.index')}}">Danh mục</a></li>
                    <li class={{$flag == "product"  ? "active" : ""}}><a href="{{route('product.index')}}">Sản phẩm</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
