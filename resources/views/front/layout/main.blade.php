<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    @include('front.partials._head')
</head>

<body class="min-vh-100 d-flex flex-column">
    @include('front.partials._nav')

    @yield('content')

    @include('front.partials._footer')
    @include('front.partials._jslibs')
</body>

</html>