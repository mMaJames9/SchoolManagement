<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="apple-touch-icon" href="{{ asset('pages/ico/60.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('pages/ico/76.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('pages/ico/120.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('pages/ico/152.png') }}">
        <meta name="apple-mobile-web-app-capable" content="yes">

        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">
        <meta content="" name="description" />
        <meta content="" name="author" />

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/pace/pace-theme-flash.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/font-awesome/css/all.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/switchery/css/switchery.min.css') }}" media="screen" />

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables-responsive/css/datatables.responsive.css') }}" />
        
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap-datepicker/css/datepicker3.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" />

        <link rel="stylesheet" type="text/css" href="{{ asset('pages/css/pages-icons.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('pages/css/themes/corporate.css') }}" class="main-stylesheet" />
    </head>

    <body class="fixed-header menu-pin menu-behind">

        @include('partials._sidebar')

        <div class="page-container">

            @include('layouts.navigation')

            <div class="page-content-wrapper">

                <div class="content">
                    {{ $slot }}
                </div>

                @include('partials._footer')

            </div>

            @include('partials._notifications')

        </div>

        <script type="text/javascript" src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/jquery/jquery-3.2.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/modernizr.custom.js') }}"></script>
        <script type="text/javascript" src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/popper/umd/popper.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/jquery/jquery-easy.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/jquery-unveil/jquery.unveil.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/jquery-ios-list/jquery.ioslist.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/jquery-actual/jquery.actual.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/classie/classie.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/switchery/js/switchery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/datatables-responsive/js/datatables.responsive.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/datatables-responsive/js/lodash.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('assets/plugins/jquery-inputmask/jquery.inputmask.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>

        <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-form-wizard/js/jquery.bootstrap.wizard.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('pages/js/pages.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('assets/js/datatables.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/inputmask.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/form_wizard.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/notifications.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/scripts.js') }}"></script>

        @yield('scripts')

    </body>
</html>
