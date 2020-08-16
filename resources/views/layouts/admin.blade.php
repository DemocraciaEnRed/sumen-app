<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @yield('metatags')

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('stylesheets')

    <!-- Scripts -->
    @yield('headscripts')
    <script src="{{ asset('js/vendor.js') }}" defer></script>
    <script src="{{ asset('js/manifest.js') }}" defer></script>
    <script src="{{ asset('js/admin-app.js') }}" defer></script>
</head>

<body>
    <div id="app">
        @include('layouts.navbar')
        @include('partials.flashMessage')
        @include('layouts.header')
        @yield('content')
    </div>
    @include('layouts.footer')
    <script type="text/javascript">
        window.addEventListener('keydown',function(e){if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){if(e.target.nodeName=='INPUT'&&e.target.type=='text'){e.preventDefault();return false;}}},true);
    </script>
</body>

</html>