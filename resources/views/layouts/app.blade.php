<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 11 Task List App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('styles')
</head>
<body class="container mx-auto mt-10 max-w-lg">
    <h1 class="mb-4 text-2xl">@yield('title')</h1>

    <div class="">
        @if(session()->has('success'))
            <div class="">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>
