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
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('public/assets/app-8f9e4b88.css')}}">
    <script src="{{asset('public/assets/app-5f39cc03.js')}}" defer></script>
</head>
<body class="body flex flex-col !h-screen">
    @include('components.header')
    <main class="flex-auto">
        @yield('content')
    </main>
    @include('components.footer')
</body>
</html>
