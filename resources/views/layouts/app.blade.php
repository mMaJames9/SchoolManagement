<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Application de gestion scolaire de l'établissement Fondation Fozeu et Magakou">
        <meta name="author" content="Fondation Fozeu et Magakou">
        <meta name="keywords" content="fozeu-magakou.space, fozeu, magakou, fondation fozeu, fozeu et magakou, magakou, fozeu magakou">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image/png" href="{{ asset('pages/ico/60.png') }}">
        <link rel="icon" type="image/png" sizes="76x76" href="{{ asset('pages/ico/76.png') }}">
        <link rel="icon" type="image/png" sizes="120x120" href="{{ asset('pages/ico/120.png') }}">
        <link rel="icon" type="image/png" sizes="152x152" href="{{ asset('pages/ico/152.png') }}">

        <meta name="apple-mobile-web-app-capable" content="yes">

        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">

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

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/nvd3/nv.d3.min.css') }}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/mapplic/css/mapplic.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/rickshaw/rickshaw.min.css') }}" />

        <link rel="stylesheet" type="text/css" href="{{ asset('pages/css/pages-icons.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('pages/css/themes/corporate.css') }}" class="main-stylesheet" />
    </head>

    <body class="fixed-header menu-pin menu-behind">

        @include('partials._sidebar')

        <div class="page-container">

            @include('layouts.navigation')

            <div class="page-content-wrapper">

                <div class="content sm-gutter">
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

        <script type="text/javascript" src="{{ asset('assets/plugins/nvd3/lib/d3.v3.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/nvd3/nv.d3.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/nvd3/src/utils.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/nvd3/src/tooltip.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/nvd3/src/interactiveLayer.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/nvd3/src/models/axis.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/nvd3/src/models/line.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/nvd3/src/models/lineWithFocusChart.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/mapplic/js/hammer.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/mapplic/js/jquery.mousewheel.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/mapplic/js/mapplic.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/rickshaw/rickshaw.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/skycons/skycons.js') }}"></script>

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
