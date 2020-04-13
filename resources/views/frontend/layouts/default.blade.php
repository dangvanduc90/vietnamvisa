<!DOCTYPE html>
<html lang="vi">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8"/>
    <title>Vietnam Visa Voa</title>
    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width"/>
    <meta name="Keywords" content=""/>
    <meta name="Description" content=""/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="200">
    <meta property="og:title" content=""/>
    <meta property="og:description" content=""/>
    @include('frontend.partials.css')
    @yield('css')
</head>
<body id="home">
@include('frontend.partials.header')
@yield('content')
@include('frontend.partials.footer')
</body>
@include('frontend.partials.js')
@yield('js')
</html>
