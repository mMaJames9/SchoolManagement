<!DOCTYPE html>
<html lang="en">
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

        <link rel="stylesheet" type="text/css" href="{{ asset('pages/css/pages-icons.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('pages/css/themes/corporate.css') }}" class="main-stylesheet" />

        <style type="text/css">
            @media print {
                body
                {
                    zoom: 80%;
                }
                table
                {
                    page-break-after:auto !important;
                }
                tr
                {
                    page-break-inside:avoid !important;
                    page-break-before:avoid !important;
                    page-break-after:always !important;
                }
                .last-row
                {
                    page-break-inside:avoid !important;
                    page-break-before:avoid !important;
                    page-break-after:always !important;
                }
                thead
                {
                    display:table-header-group !important;
                }
                tfoot
                {
                    display:table-footer-group !important;
                }
                @page
                {
                    -webkit-print-color-adjust: exact;
                }

                div.outer {
                    page-break-after: always;
                }

                div.no-fit {
                    overflow: hidden;
                }

                img.fit-size {
                    width: 100%;
                }

                .w-300 {
                    width: 300px;
                    border: 2px solid red;
                    margin-bottom: 1em;
                }

                .w-600 {
                    width: 600px;
                    margin-bottom: 1em;
                    padding: 3px;
                    border: 3px dashed gray;
                }

                .w-1000 {
                    width: 1000px;
                    border: 2px solid red;
                    margin-bottom: 1em;
                }
            }
        </style>

        {{-- <script defer>
            "use strict";
            window.print();
            window.onafterprint = back;

            function back()
            {
                window.history.back();
            }
        </script> --}}
    </head>
    <body class="bg-white">

        @include('admin.bulletins.tableau')

    </body>
</html>
