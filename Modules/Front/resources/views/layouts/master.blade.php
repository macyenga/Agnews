<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ $site_details->faviconLink() }}" type="image/x-icon">
    <link rel="icon" href="{{ $site_details->faviconLink() }}" type="image/x-icon">

    <x-feed-links/>

    {!! SEO::generate() !!}

    @include('front::partials.styles')

    @stack('styles')

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="{{ asset('home/js/html5shiv.js') }}"></script>
    <script src="{{ asset('home/js/respond.min.js') }}"></script>
    <![endif]-->

</head>

<body>

<div class="body-inner">

    @include('front::partials.trending-bar')

    @include('front::partials.top-bar')

    @include('front::partials.header')

    @include('front::partials.main-nav')

    <div class="gap-40"></div>

    @yield('content')

    @include('front::partials.footer')

    @include('front::partials.copyright')

    @include('front::partials.scripts')

    @include('sweetalert::alert')

    @stack('scripts')
</div><!-- Body inner end -->
</body>

</html>
