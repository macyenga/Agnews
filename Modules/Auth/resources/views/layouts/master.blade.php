<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr"> <!-- Set direction to LTR globally -->

<head>
    <title>{{ !empty($title) ? $title . ' | ' . config('app.name') : config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ $siteDetails->faviconLink() }}">

    @include('auth::partials.styles')
    @stack('styles')

    <style>
        .swal2-title {
            font-size: 1.4rem !important;
        }
    </style>

</head>
<body class="active-ripple theme-darkpurple">
<!-- BEGIN LOADING -->
<div id="loader">
    <div class="spinner"></div>
</div><!-- /loader -->
<!-- END LOADING -->

<!-- BEGIN WRAPPER -->
<div class="fixed-modal-bg"></div>
<a href="#" class="btn btn-primary btn-icon btn-round btn-lg" id="toggle-dark-mode">
    <i class="icon-bulb"></i>
</a>
<div class="modal-page shadow">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">

                @yield('content')

            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /.modal-page -->
<!-- END WRAPPER -->

@include('auth::partials.scripts')
@stack('scripts')

@include('sweetalert::alert')

</body>

</html>
