<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title',"Charles & Keith")</title>



    <!-- Styles -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    @stack('style')
</head>
<body>
    <div id="app">

        @include('layouts.nav')

        <div class="py-4 mb-4"></div>

        @auth
            <div class="container">
                <div class="row g-3">
                    <div class="col-12 col-lg-4 col-xl-3">
                        @include('layouts.sidebar')
                    </div>
                    <div class="col-12 col-lg-8 col-xl-9">
                        @yield('content')
                    </div>
                </div>
            </div>
        @endauth

        @guest
        <main class="py-4">
            @yield('content')
        </main>
        @endguest
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/dashboard.js') }}" ></script>
    @stack('script')
    @include('layouts.status')
</body>
</html>
