<!DOCTYPE html>
<html lang="en" dir="ltr" class="ltr">

<head>
    <title>{{ !empty($title) ? $title . ' | ' . config('app.name') : config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="fontiran.com:license" content="NE29X">
    <link rel="shortcut icon" href="{{ $siteDetails->faviconLink() }}">

    @include('panel::partials.styles')

    <!-- BEGIN PAGE CSS -->
    <style>
        #page-content {
            min-height: 87vh;
        }

        .header-right {
            transition: .3s all;
        }

        .logo-con img {
            max-width: 9rem;
            max-height: 4rem;
        }

        .sidebar-collapse .logo-con img {
            max-width: 100%;
            max-height: 100%;
        }
    </style>
    @stack('styles')
    <!-- END PAGE CSS -->
</head>
<body class="active-ripple theme-darkpurple fix-header sidebar-extra">
<!-- BEGIN LOEADING -->
<div id="loader">
    <div class="spinner"></div>
</div><!-- /loader -->
<!-- END LOEADING -->

@include('panel::partials.header')

<!-- BEGIN WRAPPER -->
<div id="wrapper">

    @include('panel::partials.sidebar')

    <!-- BEGIN PAGE CONTENT -->
    <div id="page-content">
        <div id="inner-content">
            <div class="row">

                @yield('content')

            </div><!-- /.row -->
        </div><!-- /#inner-content -->
    </div><!-- /#page-content -->
    <!-- END PAGE CONTENT -->

</div><!-- /#wrapper -->
<!-- END WRAPPER -->

@include('panel::partials.footer')

@include('panel::partials.scripts')

<!-- BEGIN PAGE JAVASCRIPT -->
@stack('scripts')
<!-- END PAGE JAVASCRIPT -->

@include('sweetalert::alert')
</body>

</html>
