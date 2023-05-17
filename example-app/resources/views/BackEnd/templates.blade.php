<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css', []) }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css', []) }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                @if (Request::is('admin') || Request::is('admin/index'))
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ url('admin', []) }}" class="nav-link">Home</a>

                    </li>
                @else
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ url('admin', []) }}" class="nav-link">Home</a>

                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a class="nav-link"> @yield('title')</a>

                    </li>
                @endif

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary">
            <!-- Brand Logo -->
            <a href="{{ url('admin', []) }}" class="brand-link">
                <img src="{{ url('dist/img/AdminLTELogo.png', []) }}" alt="AdminLTE Logo"
                    class="brand-image img-circle " style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ url('dist/img/user2-160x160.jpg', []) }}" class="img-circle " alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{ url('admin', []) }}" class="d-block">Alexander Pierce</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ url('admin', []) }}" class="<?php echo Request::is('admin') || Request::is('admin/index') ? 'active' : ''; ?> nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('', []) }}" class="<?php echo Request::is('admin/user/*') ? 'active' : ''; ?> nav-link">
                                <i class="fa-solid fa-house-laptop"></i>
                                <p>Main page</p>
                            </a>
                        </li>




                        <li class="nav-item <?php echo Request::is('admin/product/*') ? 'menu-open' : ''; ?> ">
                            <a href="" class="<?php echo Request::is('admin/product/*') ? 'active' : ''; ?> nav-link">
                                <i class="fab fa-product-hunt"></i>
                                <p>
                                    <p>Products</p>
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: <?php echo Request::is('admin/product/*') ? 'block' : 'none'; ?>;">
                                <li class="nav-item">
                                    <a href="{{ url('admin/product/table', []) }}"
                                        class="<?php echo Request::is('admin/product/table') ? 'active' : ''; ?> nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tables</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/product/add', []) }}" class="<?php echo Request::is('admin/product/add') ? 'active' : ''; ?> nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item <?php echo Request::is('admin/user/*') ? 'menu-open' : ''; ?> ">
                            <a href="" class="<?php echo Request::is('admin/user/*') ? 'active' : ''; ?> nav-link">
                                <i class="fab fa-product-hunt"></i>
                                <p>
                                    <p>User</p>
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: <?php echo Request::is('admin/user/*') ? 'block' : 'none'; ?>;">
                                <li class="nav-item">
                                    <a href="{{ url('admin/user/table', []) }}" class="<?php echo Request::is('admin/user/table') ? 'active' : ''; ?> nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tables</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('containt')

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ url('plugins/jquery/jquery.min.js', []) }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ url('plugins/jquery-ui/jquery-ui.min.js', []) }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js', []) }}"></script>
    <!-- ChartJS -->
    <script src="{{ url('plugins/chart.js/Chart.min.js', []) }}"></script>
    <!-- Sparkline -->
    <script src="{{ url('plugins/sparklines/sparkline.js', []) }}"></script>
    <!-- JQVMap -->
    <script src="{{ url('plugins/jqvmap/jquery.vmap.min.js', []) }}"></script>
    <script src="{{ url('plugins/jqvmap/maps/jquery.vmap.usa.js', []) }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ url('plugins/jquery-knob/jquery.knob.min.js', []) }}"></script>
    <!-- daterangepicker -->
    <script src="{{ url('plugins/moment/moment.min.js', []) }}"></script>
    <script src="{{ url('plugins/daterangepicker/daterangepicker.js', []) }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js', []) }}"></script>
    <!-- Summernote -->
    <script src="{{ url('plugins/summernote/summernote-bs4.min.js', []) }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js', []) }}"></script>
    <script src="{{ url('dist/js/adminlte.min.js', []) }}"></script>
</body>

</html>
