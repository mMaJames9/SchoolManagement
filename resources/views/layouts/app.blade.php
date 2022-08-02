<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">

        <link href="{{ asset('fonts/nunito-font.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/vendors/choices.js/choices.min.css') }}" />

        @yield('styles')

        <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">


        <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" defer></script>
        <script src="{{ asset('assets/vendors/choices.js/choices.min.js') }}" defer></script>


        <script src="{{ asset('assets/js/main.js') }}" defer></script>

        @yield('scripts')


    </head>

    <body>
        <div id="app">

            @include('partials._sidebar')

            <div id="main" class='layout-navbar'>
                <header class="mb-3">
                    @include('layouts.navigation')
                </header>

                    <div id="main-content">
                    <div class="page-heading">
                        {{ $slot }}
                    </div>

                    @include('partials._footer')
                </div>

            </div>

        </div>

        <script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
        @yield('custimize')
    </body>



</html>
