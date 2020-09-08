<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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

    </head>
    <body class="animsition">
        <div class="page-wrapper">
            <!-- HEADER MOBILE-->
            <header class="header-mobile d-block d-lg-none">
                <div class="header-mobile__bar">
                    <div class="container-fluid">
                        <div class="header-mobile-inner">
                            <a class="logo" href="#">
                                SISGEMBA ICON
                            </a>
                            <button class="hamburger hamburger--slider" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <nav class="navbar-mobile">
                    <div class="container-fluid">
                        <ul class="navbar-mobile__list list-unstyled">
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li>
                                        <a href="#">Dashboard 1</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-chart-bar"></i>Charts</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-table"></i>Tables</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="far fa-check-square"></i>Forms</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-calendar-alt"></i>Calendar</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-map-marker-alt"></i>Maps</a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-copy"></i>Pages</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li>
                                        <a href="#">Login</a>
                                    </li>
                                    <li>
                                        <a href="#">Register</a>
                                    </li>
                                    <li>
                                        <a href="#">Forget Password</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-desktop"></i>UI Elements</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li>
                                        <a href="#">Button</a>
                                    </li>
                                    <li>
                                        <a href="#">Badges</a>
                                    </li>
                                    <li>
                                        <a href="#">Tabs</a>
                                    </li>
                                    <li>
                                        <a href="#">Cards</a>
                                    </li>
                                    <li>
                                        <a href="#">Alerts</a>
                                    </li>
                                    <li>
                                        <a href="#">Progress Bars</a>
                                    </li>
                                    <li>
                                        <a href="#">Modals</a>
                                    </li>
                                    <li>
                                        <a href="#">Switchs</a>
                                    </li>
                                    <li>
                                        <a href="#">Grids</a>
                                    </li>
                                    <li>
                                        <a href="#">Fontawesome Icon</a>
                                    </li>
                                    <li>
                                        <a href="#">Typography</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- END HEADER MOBILE-->

            <!-- MENU SIDEBAR-->
            <aside class="menu-sidebar d-none d-lg-block">
                <div class="logo">
                    <a href="#">
                        SISGEMBA ICON
                    </a>
                </div>
                <div class="menu-sidebar__content js-scrollbar1">
                    <nav class="navbar-sidebar">
                        <ul class="list-unstyled navbar__list">
                            <li class="active has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="#">Dashboard 1</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-chart-bar"></i>Charts</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-table"></i>Tables</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="far fa-check-square"></i>Forms</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-calendar-alt"></i>Calendar</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-map-marker-alt"></i>Maps</a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-copy"></i>Pages</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="#">Login</a>
                                    </li>
                                    <li>
                                        <a href="#">Register</a>
                                    </li>
                                    <li>
                                        <a href="#">Forget Password</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-desktop"></i>UI Elements</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="#">Button</a>
                                    </li>
                                    <li>
                                        <a href="#">Badges</a>
                                    </li>
                                    <li>
                                        <a href="#">Tabs</a>
                                    </li>
                                    <li>
                                        <a href="#">Cards</a>
                                    </li>
                                    <li>
                                        <a href="#">Alerts</a>
                                    </li>
                                    <li>
                                        <a href="#">Progress Bars</a>
                                    </li>
                                    <li>
                                        <a href="#">Modals</a>
                                    </li>
                                    <li>
                                        <a href="#">Switchs</a>
                                    </li>
                                    <li>
                                        <a href="#">Grids</a>
                                    </li>
                                    <li>
                                        <a href="#">Fontawesome Icon</a>
                                    </li>
                                    <li>
                                        <a href="#">Typography</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END MENU SIDEBAR-->

            <!-- PAGE CONTAINER-->
            <div class="page-container">
                <!-- HEADER DESKTOP-->
                <header class="header-desktop">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="header-wrap">
                                <div class="form-header" >
                                </div>
                                <div class="header-button">
                                    <div class="account-wrap">
                                        <div class="account-item clearfix js-item-menu">
                                            <div class="image">
                                                <img src="" alt="John Doe" />
                                            </div>
                                            <div class="content">
                                                <a class="js-acc-btn" href="#">john doe</a>
                                            </div>
                                            <div class="account-dropdown js-dropdown">
                                                <div class="info clearfix">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="" alt="John Doe" />
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <h5 class="name">
                                                            <a href="#">john doe</a>
                                                        </h5>
                                                        <span class="email">johndoe@example.com</span>
                                                    </div>
                                                </div>
                                                <div class="account-dropdown__body">
                                                    <div class="account-dropdown__item">
                                                        <a href="#">
                                                            <i class="zmdi zmdi-account"></i>Account</a>
                                                    </div>
                                                    <div class="account-dropdown__item">
                                                        <a href="#">
                                                            <i class="zmdi zmdi-settings"></i>Setting</a>
                                                    </div>
                                                    <div class="account-dropdown__item">
                                                        <a href="#">
                                                            <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                    </div>
                                                </div>
                                                <div class="account-dropdown__footer">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- HEADER DESKTOP-->

                <!-- MAIN CONTENT-->

                <!-- END MAIN CONTENT-->
                <!-- END PAGE CONTAINER-->
            </div>

        </div>

        <!-- Bootstrap js, Popper and Jquery Asset -->
        <script src="{{ asset('js/app.js') }}"></script>

        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
