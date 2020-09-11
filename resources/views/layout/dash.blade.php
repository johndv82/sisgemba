<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('titulo')</title>

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!--Bootstrap css Asset  -->
    <link rel="stylesheet" href="{{ asset('css/app.css')  }}">

    <!-- Fontfaces CSS-->
    <link href="{{asset('fonts/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('fonts/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('fonts/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('css/vendor/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('css/vendor/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('css/vendor/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('css/vendor/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('css/vendor/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('css/vendor/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('css/vendor/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS Asset-->
    <link href="{{asset('css/theme.css')}}" rel="stylesheet" media="all">

    <!-- Estilo Datatables Jquery -->
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body class="animsition">
<div class="page-wrapper">
    @include('layout.partial.header-mobile')
    @include('layout.partial.menu-sidebar')

    <!-- PAGE CONTAINER-->
    <div class="page-container">
        @include('layout.partial.header-desktop')

        @include('layout.partial.main-content')
    </div>
    <!-- END PAGE CONTAINER-->
</div>

<!-- Bootstrap js, Popper and Jquery Asset -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

@yield('scripts')
</body>
</html>
