
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>PhizzaHut!</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}">

        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">

    </head>


    <body>

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo container-->
                    <div class="logo">
                        <!-- Image Logo -->
                        <a href="{{ url('/') }}" class="logo">
                            <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="32" class="logo-small">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="" height="20" class="logo-large">
                        </a>

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras topbar-custom">


                        <ul class="list-inline float-right mb-0">
                            @guest
                            <li class="logo">
                                <a href="{{ route('login') }}" class="btn btn-success waves-effect waves-light">LOGIN</a>
                                <a href="{{ route('register') }}" class="btn btn-info waves-effect waves-light">REGISTER</a>
                            </li>
                            @else
                            <li class="logo">
                                @can('isAdmin')
                                <a href="{{ route('transactionAdmin') }}" style="color: white;">View All User Transaction</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ route('alluser') }}" style="color: white;">View All User</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                                @elsecan('isMember')
                                <a href="{{ route('transaction') }}" style="color: white;">View Transaction History</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ route('viewCart') }}" style="color: white;">View Cart</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                                @endcan
                                <li class="list-inline-item dropdown notification-list">
                                   <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" style="color:white;" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->username }}</a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown" style="position: absolute; transform: translate3d(-116px, 60px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-end">
                                        <a class="dropdown-item" href="{{ route('logout') }}"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                    </div>
                                </li>
                            </li>
                            @endguest
                        </ul>
                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->
        </header>
        <!-- End Navigation Bar-->

        <div class="wrapper">
            <div class="container-fluid">
@yield('content')
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        © 2020 <b>Phizzahut!</b></span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->

        <!-- jQuery  -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
        <script src="{{ asset('assets/js/detect.js') }}"></script>
        <script src="{{ asset('assets/js/fastclick.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('assets/js/waves.js') }}"></script>
        <!-- skycons -->
        <script src="{{ asset('assets/plugins/skycons/skycons.min.js') }}"></script>

        <!-- skycons -->
        <script src="{{ asset('assets/plugins/peity/jquery.peity.min.js') }}"></script>

        <!--Morris Chart-->
        <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/raphael/raphael-min.js') }}"></script>

        <!-- dashboard -->
        <script src="{{ asset('assets/pages/dashboard.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>

    </body>
</html>
