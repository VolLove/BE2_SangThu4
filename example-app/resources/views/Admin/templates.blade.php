<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | @yield('title')</title>
    <link rel="icon" type="image/png" href="{{ url('images/favicon.png', []) }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css', []) }}">
</head>

<body class="sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('admin', []) }}" class="nav-link">Home</a>

                </li>

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
                        <img src="{{ url('avatars/' . Auth::user()->avatar, []) }}" class="img-circle "
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{ url('admin', []) }}" class="d-block">{{ Auth::user()->name }}</a>
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
                        {{-- Main page --}}
                        <li class="nav-item ">
                            <a href="{{ url('', []) }}" class="nav-link">
                                <i class="nav-icon fa-regular fa-newspaper"></i>
                                <p>Main page</p>
                            </a>
                        </li>
                        {{-- Product --}}
                        <li class="nav-item <?php echo Request::is('admin/product/*') ? 'menu-open' : ''; ?> ">
                            <a href="{{ url('admin/product/table', []) }}" class="<?php echo Request::is('admin/product/*') ? 'active' : ''; ?> nav-link">
                                <i class="nav-icon  fab fa-product-hunt"></i>
                                <p>
                                    <p>Products</p>
                                </p>
                            </a>
                        </li>
                        {{-- Categories --}}
                        <li class="nav-item <?php echo Request::is('admin/categories/*') ? 'menu-open' : ''; ?> ">
                            <a href="{{ url('admin/categories/table', []) }}" class="<?php echo Request::is('admin/categories/*') ? 'active' : ''; ?> nav-link">
                                <i class="nav-icon fas fa-th-list"></i>
                                <p>
                                    <p>Categories</p>
                                </p>
                            </a>
                        </li>

                        {{-- manufacter --}}
                        <li class="nav-item <?php echo Request::is('admin/manufacter/*') ? 'menu-open' : ''; ?> ">
                            <a href="{{ url('admin/manufacter/table', []) }}" class="<?php echo Request::is('admin/manufacter/*') ? 'active' : ''; ?> nav-link">
                                <i class="nav-icon fas fa-industry"></i>
                                <p>
                                    <p>Manufacter</p>
                                </p>
                            </a>
                        </li>
                        {{-- bill --}}
                        <li class="nav-item <?php echo Request::is('admin/bill/') ? 'menu-open' : ''; ?> ">
                            <a href="{{ url('admin/bill/table', []) }}" class="<?php echo Request::is('admin/bill*') ? 'active' : ''; ?> nav-link">
                                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                                <p>
                                    <p>Bill</p>
                                </p>
                            </a>
                        </li>
                        {{-- User --}}
                        <li class="nav-item <?php echo Request::is('admin/user*') ? 'menu-open' : ''; ?> ">
                            <a href="{{ url('admin/user/table', []) }}" class="<?php echo Request::is('admin/user*') ? 'active' : ''; ?> nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    <p>User</p>
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('containt')
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

    </div>
    <!-- ./wrapper -->


    <!-- jQuery -->
    <script src="{{ url('plugins/jquery/jquery.min.js', []) }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ url('plugins/jquery-ui/jquery-ui.min.js', []) }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js', []) }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('dist/js/adminlte.min.js', []) }}"></script>

</body>

</html>
