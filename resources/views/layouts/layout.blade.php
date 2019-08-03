<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page_title') - Oddstackr.com@stack('page_title')</title>

<<<<<<< HEAD
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="/css/app.css" rel="stylesheet" type="text/css">
=======
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="/css/app.css" rel="stylesheet" type="text/css">
        
        <link href="/css/main.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="app">
            @yield('page')
        </div>
>>>>>>> 4e779fe48763318f4e4c7fb26d3c3d85037b02ce

    <link href="/css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="app">
    @yield('page')
</div>

<script src="/js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<<<<<<< HEAD
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="/js/script.js"></script>
</body>
=======
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="/js/script.js"></script>
    </body>
>>>>>>> 4e779fe48763318f4e4c7fb26d3c3d85037b02ce
</html>