<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Avilash Saha</title>

        <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>

        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>

    <body class="bg-gray-100">

        @include('frontend.includes.header')

        <div class="container mx-auto mt-6">
            @yield('content')
        </div>

        @include('frontend.includes.footer')


        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script src="{{ asset('assets/frontend/js/script.js') }}"></script>

    </body>
</html>
