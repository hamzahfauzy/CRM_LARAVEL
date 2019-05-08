<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->    <!-- Bootstrap CSS-->

    <title>{{ config('app.name', 'LARAVEL') }}</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <div class="logo">
                            <h2>{{ config('app.name', 'LARAVEL') }}</h2>
                        </div>
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
                        <li>
                            <a href="{{ route('admin.home') }}">
                                <i class="fas fa-tachometer-alt"></i>DASHBOARD</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.category.data') }}">
                                <i class="fas fa-tags"></i>CATEGORIES</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.product.data') }}">
                                <i class="fas fa-suitcase"></i>PRODUCTS</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.transaction.data') }}">
                                <i class="fas fa-shopping-cart"></i>TRANSACTIONS</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.transaction.payments') }}">
                                <i class="fas fa-bar-chart-o"></i>TRANSACTION PAYMENTS</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.customer.data') }}">
                                <i class="fas fa-users"></i>CUSTOMERS</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.logout') }}">
                                <i class="fas fa-power-off"></i>LOGOUT</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <h2>{{ config('app.name', 'LARAVEL') }}</h2>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="{{ route('admin.home') }}">
                                <i class="fas fa-tachometer-alt"></i>DASHBOARD</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.category.data') }}">
                                <i class="fas fa-tags"></i>CATEGORIES</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.product.data') }}">
                                <i class="fas fa-suitcase"></i>PRODUCTS</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.transaction.data') }}">
                                <i class="fas fa-shopping-cart"></i>TRANSACTIONS</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.transaction.payments') }}">
                                <i class="fas fa-bar-chart-o"></i>TRANSACTION PAYMENTS</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.customer.data') }}">
                                <i class="fas fa-users"></i>CUSTOMERS</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.logout') }}">
                                <i class="fas fa-power-off"></i>LOGOUT</a>
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
                            
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

            @yield('content')

                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->

            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    </script>
    <script src="{{ asset('vendor/wow/wow.min.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('js/main2.js') }}"></script>

</body>

</html>
<!-- end document-->

