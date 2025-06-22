<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>{{ $website_settings->title }} - @yield('title')</title>
<meta property="og:title" content="{{ $website_settings->title }} - @yield('title')">
<meta name="twitter:title" content="{{ $website_settings->title }} - @yield('title')">
<meta property="og:site_name" content="{{ $website_settings->title }}">

<meta name="description" content="@yield('description', $website_settings->description)">
<meta property="og:description" content="@yield('description', $website_settings->description)">
<meta name="twitter:description" content="@yield('description', $website_settings->description)">

<meta property="og:url" content="{{ url()->current() }}">
<link rel="canonical" href="{{ url()->current() }}">
<meta property="og:type" content="website">

<meta name="keywords" content="{{ $website_settings->keywords }}">

<meta name="twitter:image" content="@yield('display_image', $website_settings->display_cover)">
<meta property="og:image" content="@yield('display_image', $website_settings->display_cover)">
<meta name="twitter:card" content="@yield('display_image', $website_settings->display_cover)">


<link rel="shortcut icon" href="{{ $website_settings->display_logo }}" type="image/x-icon">
<link rel="icon" type="image/x-icon" href="{{ $website_settings->display_logo }}">

<!-- Font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<!-- Bootstrap CSS -->
<link href="{{ asset('front/libs/bootstrap/css/bootstrap'. (LaravelLocalization::getCurrentLocaleDirection() == 'rtl' ? '.rtl' : '') .'.min.css') }}" rel="stylesheet">
<!-- Swiper Css -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<!-- Fonts Awesome -->
<link rel="stylesheet" href="{{ asset('front/libs/fontawesome-free-6.5.2-web/css/all.min.css') }}">
<!-- Sweet Alert2 -->
<link rel="stylesheet" href="{{ asset('front/libs/sweetalert2/sweet.css') }}">
<link rel="stylesheet" href="{{ asset('front/libs/OwlCarousel2-2.3.4/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('front/libs/OwlCarousel2-2.3.4/assets/owl.theme.default.min.css') }}">
<!-- Custom CSS -->
<link rel="stylesheet" href="{{ asset('front/css/main.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">