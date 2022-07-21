<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/94ae44446c.js" crossorigin="anonymous"></script>
    <title>Spotify Search</title>
</head>

<body class="antialiased">
    <div id="app">
        @yield('content')
    </div>
    @routes
</body>
</html