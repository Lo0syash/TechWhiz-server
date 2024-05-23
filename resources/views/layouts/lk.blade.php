<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/public/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/public/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>@yield('lk-title')</title>
    @vite('resources/css/app-lk.css')
    @vite('resources/js/app-lk.js')
</head>
<body class="body">
@include('components.lk-header')
<main>
    @yield('lk-content')
</main>
</body>
</html>
