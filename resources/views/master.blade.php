<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<!-- Mirrored from pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/html/ltr/vertical-modern-menu-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Jan 2019 23:36:03 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
        content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/logo/inventaris.png">
    <link rel="shortcut icon" type="image/x-icon"
        href="../../../app-assets/images/logo/logoummm.png">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700"
        rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/app.min.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/charts/morris.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/animate/animate.min">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->

    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END Custom CSS-->
    @yield('style')
</head>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu-modern" data-col="2-columns">
    <!-- fixed-top-->
    <nav
        class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row position-relative">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item mr-auto"><img class="brand-logo"
                                alt="modern admin logo" src="../../../app-assets/images/logo/logoumm.png" height="67px;" width="235px;">
                       </li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item"><a
                                class="dropdown-toggle nav-link dropdown-user-link" href="#"
                                data-toggle="dropdown"><span class="mr-1">Hello, <span
                                        class="user-name text-bold-700">{{ Auth::user()->nama ?? "" }}</span></span><span
                                    class="avatar avatar-online"><img
                                        src="../../../app-assets/images/portrait/small/avatar-s-27.png"
                                        alt="avatar"><i></i></span></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="/logout"><i class="ft-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li>
                    <a class="menu-item" href="/user/index" data-i18n="nav.dash.sales">
                        <i class="la la-user"></i>User
                    </a>
                </li>
                <li>
                    <a class="menu-item" href="/vendor/index" data-i18n="nav.dash.sales">
                        <i class="la la-industry"></i>Vendor
                    </a>
                </li>
                <li class="nav-item has-sub"><a href=""><i class="la la-envelope"></i><span class="menu-title"
                    data-i18n="nav.dash.main">Administrasi</span><span
                    class="badge badge badge-info badge-pill float-right mr-2">4</span></a>
                    <ul class="menu-content" style="">
                        <li class=""><a class="menu-item" href="/pemilihanRutin/index"
                            data-i18n="nav.dash.ecommerce">Pemilihan Rutin</a>
                        </li>
                        <li class=""><a class="menu-item" href="/perbaikan/index" data-i18n="nav.dash.crypto">Perbaikan</a>
                        </li>
                        {{-- <li class=""><a class="menu-item" href="/infus/index" data-i18n="nav.dash.sales">Infus</a>
                        </li>
                        <li class=""><a class="menu-item" href="/pemusnahan/index" data-i18n="nav.dash.sales">Pemusnahan</a>
                        </li> --}}
                    </ul>
                </li>
                <li class="nav-item has-sub"><a href=""><i class="la la-book"></i><span class="menu-title"
                    data-i18n="nav.dash.main">Asset</span><span
                    class="badge badge badge-info badge-pill float-right mr-2">2</span></a>
                    <ul class="menu-content" style="">
                        </li>
                        <li class=""><a class="menu-item" href="/ruang/index" data-i18n="nav.dash.sales">Ruang</a>
                        </li>
                        <li class=""><a class="menu-item" href="/asset/index" data-i18n="nav.dash.sales">Asset</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="menu-item" href="/pengadaan/index" data-i18n="nav.dash.sales">
                        <i class="la la-building"></i>Pengadaan
                    </a>
                </li>
                <li>
                    <a class="menu-item" href="/shopingList/index" data-i18n="nav.dash.sales">
                        <i class="la la-shopping-cart"></i>Shopping List
                    </a>
                </li>
                {{-- <li>
                    <a class="menu-item" href="/maintenance/index" data-i18n="nav.dash.sales">
                        <i class="la la-warning"></i>Maintenance
                    </a>
                </li>
                <li>
                    <a class="menu-item" href="/troubleticket/index" data-i18n="nav.dash.sales">
                        <i class="la la-ticket"></i>Trouble Ticket
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                @yield('content-header')
            </div>
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>    
    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
            <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
                <span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2018 
                    <a class="text-bold-800 grey darken-2" href="#">Muhammad Alif Alhady H</a>, All rights reserved. 
                </span>
                <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with 
                    <i class="ft-heart pink"></i>
                </span>
            </p>
          </footer>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="../../../app-assets/vendors/js/charts/chart.min.js"></script>
    <script src="../../../app-assets/vendors/js/charts/raphael-min.js"></script>
    <script src="../../../app-assets/vendors/js/charts/morris.min.js"></script>
    <script src="../../../app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="../../../app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/toastr.min.js"></script>
    <script src="../../../app-assets/js/scripts/extensions/toastr.min.js"></script>
    <script src="../../../app-assets/data/jvector/visitor-data.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="../../../app-assets/js/core/app-menu.min.js"></script>
    <script src="../../../app-assets/js/core/app.min.js"></script>
    <script src="../../../app-assets/js/scripts/customizer.min.js"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="../../../app-assets/js/scripts/tables/datatables/datatable-basic.min.js"></script>
    <script src="../../../app-assets/js/scripts/pages/dashboard-sales.min.js"></script>
    <!-- END PAGE LEVEL JS-->
    <script>
    var token = $("meta[name='_token']").attr("content");
    var myDatatable = $(".datatable");
    
      if (myDatatable != null) {
          myDatatable.DataTable({});        
      }
    </script>
    @yield('script')
    @if(session('OK'))
        <script>
            toastr.success('{{ session("OK") }}', 'Success!');
        </script>
    @endif
    @if(session('ERR'))
        <script>
            toastr.error('{{ session("ERR") }}', 'Error!');
        </script>
    @endif
</body>

<!-- Mirrored from pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/html/ltr/vertical-modern-menu-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Jan 2019 23:36:03 GMT -->

</html>