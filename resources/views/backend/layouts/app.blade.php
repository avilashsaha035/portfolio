<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@stack('title') | {{ 'Club Management' }}</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('assets/backend/plugins/fontawesome-free/css/all.min.css') }}">

        <!-- AdminLTE CSS -->
        <link rel="stylesheet" href="{{ asset('assets/backend/dist/css/adminlte.min.css') }}">

        @stack('css')
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">

        <div class="wrapper">

            <!-- Navbar -->
            @include('backend.includes.navbar')

            <!-- Sidebar -->
            @include('backend.includes.sidebar')

            <!-- Content Wrapper -->
            <div class="content-wrapper">

                <!-- Content Header -->
                <section class="content-header">
                    <div class="container-fluid">
                        <h1>@yield('page_title')</h1>
                    </div>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </section>
            </div>

            <!-- Footer -->
            @include('backend.includes.footer')

        </div>

        <!-- jQuery -->
        <script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap 4 -->
        <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- AdminLTE JS -->
        <script src="{{ asset('assets/backend/dist/js/adminlte.min.js') }}"></script>

        @stack('js')
    </body>
</html>
