<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Charles & Keith')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('style')
</head>
<body>
@include('templates.nav')

@yield('content')

<div class="py-5"></div>

<script src="{{ asset('js/app.js') }}"></script>
@stack('script')
<script>
    $(document).ready(function () {
        $('#myCarousel').find('.carousel-item').first().addClass('active');
    });
</script>
</body>
</html>
