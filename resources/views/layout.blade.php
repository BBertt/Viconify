<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div id="sidebar" style="z-index: 10"></div>
    <main>
        @yield('content')
    </main>
    @vite('resources/js/app.tsx')
    @stack('scripts')
</body>
</html>
