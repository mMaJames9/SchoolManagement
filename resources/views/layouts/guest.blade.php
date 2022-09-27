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

        <link rel="stylesheet" type="text/css" href="{{ asset('pages/css/pages-icons.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('pages/css/themes/corporate.css') }}" class="main-stylesheet" />

        <script type="text/javascript">
            window.onload = function()
            {
                // fix for windows 8
                if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
                document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="{{ asset("pages/css/windows.chrome.fix.css") }}" />'
            }
        </script>
    </head>

    <body class="fixed-header menu-pin menu-behind">

        {{ $slot }}

        <script type="text/javascript" src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/jquery/jquery-3.2.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/modernizr.custom.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
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
        <script type="text/javascript" src="{{ asset('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
        <!-- END VENDOR JS -->
        <script type="text/javascript" src="{{ asset('pages/js/pages.min.js') }}"></script>
        <script type="text/javascript">
            $(function()
            {
                $('#form-login').validate()
            })
        </script>
    </body>
</html>
