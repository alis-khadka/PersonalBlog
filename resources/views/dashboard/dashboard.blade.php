<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/custom-styles.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
{{--    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/font-awesome.css') }}"/>--}}
</head>
<body class="app sidebar-mini rtl">

<main class="app-content">
    @yield('content')
</main>
<script src="{{ asset('dashboard/js/jquery-1.10.2.js') }}"></script>
<script src="{{ asset('dashboard/js/popper.min.js') }}"></script>
<script src="{{ asset('dashboard/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dashboard/js/custom.js') }}"></script>
<script src="{{ asset('dashboard/js/custom-scripts.js') }}"></script>
</body>
</html>
