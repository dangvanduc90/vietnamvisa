<!DOCTYPE html>
<html>

@include('backend.partials.head')
@yield('css')

<body class="">
    <div id="wrapper">
        @include('backend.partials.nav')
        <div id="page-wrapper" class="gray-bg">
            @include('backend.partials.header')
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>@yield('title')</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        @if(isset($parent_menu))
                        <li>
                            <a href="{{$parent_route}}">{{$parent_menu}}</a>
                        </li>
                        @endif
                        <li class="active">
                            <strong>{{$page_name}}</strong>
                        </li>
                    </ol>
                </div>
                @if(isset($route_button))
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="{{$route_button}}" class="btn btn-primary">{{$name_button}}</a>
                    </div>
                </div>
                @endif
            </div>

            <div class="wrapper wrapper-content">
               @yield('content')
            </div>
            @include('backend.partials.footer')
        </div>
    </div>
    @include('backend.partials.scripts')
    @yield('js')
</body>

</html>
