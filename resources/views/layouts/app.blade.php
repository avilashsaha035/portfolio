<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@stack('frontend_title') | {{ 'Club Management System' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    @include('layouts.navigation')

    <div class="container mx-auto mt-6">
        @yield('content')
    </div>

</body>
</html>
