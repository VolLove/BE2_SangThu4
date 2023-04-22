<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title> Eshop - @yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">
    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <!-- StyleSheet -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ url('css/bootstrap.css', []) }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ url('css/magnific-popup.min.css', []) }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('css/font-awesome.css', []) }}">
    <!-- Fancybox -->
    <link rel="stylesheet" href="{{ url('css/jquery.fancybox.min.css', []) }}">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="{{ url('css/themify-icons.css', []) }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ url('css/niceselect.css', []) }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ url('css/animate.css', []) }}">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{ url('css/flex-slider.min.css', []) }}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ url('css/owl-carousel.css', []) }}">
    <!-- Slicknav -->
    <link rel="stylesheet" href="{{ url('css/slicknav.min.css', []) }}">

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="{{ url('css/reset.css', []) }}">
    <link rel="stylesheet" href="{{ url('style.css', []) }}">
    <link rel="stylesheet" href="{{ url('css/responsive.css', []) }}">



</head>

<body class="js">
    <!-- Header -->
    <header class="header shop">
        <!-- Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-12">
                    </div>
                    <div class="col-lg-8 col-md-12 col-12">
                        <!-- Top Right -->
                        <div class="right-content">
                            <ul class="list-main">
                                @if (Auth::check())
                                    <li><i class="fa fa-user" aria-hidden="true"></i>
                                        <a href="{{ url('account') }}">My account</a>
                                    </li>
                                    <li><i class="fa fa-sign-out" aria-hidden="true"></i>
                                        <a href="{{ url('logout') }}">Logout</a>
                                    </li>
                                @else
                                    <li><i class="fa fa-sign-in" aria-hidden="true"></i>
                                        <a href="{{ url('login') }}">Login</a>
                                    </li>
                                    <li><a href="{{ url('registration') }}"><i class="fa fa-registered"
                                                aria-hidden="true"></i>
                                            Register</a></li>
                                @endif
                            </ul>
                        </div>
                        <!-- End Top Right -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->

        <div class="middle-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-12">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="{{ url('/', []) }}"><img src="images/logo.png" alt="logo"></a>
                        </div>
                        <!--/ End Logo -->
                        <div class="mobile-nav"></div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-12">
                        <div class="search-bar-top">
                            <div class="search-bar">
                                <select>
                                    <option selected="selected">All Category</option>
                                    <option>watch</option>
                                    <option>mobile</option>
                                    <option>kid’s item</option>
                                </select>
                                <form>
                                    <input name="search" placeholder="Search Products Here....." type="search">
                                    <button class="btnn"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-12">
                        <div class="right-bar">
                            <!-- Search Form -->
                            <div class="sinlge-bar">
                                <a href="{{ url('favourite', []) }}" class="single-icon"><i class="fa fa-heart-o"
                                        aria-hidden="true"></i></a>
                            </div>
                            <div class="sinlge-bar shopping">
                                <a href="{{ url('cart') }}" class="single-icon"><i class="ti-bag"></i> <span
                                        class="total-count">2</span></a>
                                <!-- Shopping Item -->
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>2 Items</span>
                                        <a href="{{ url('cart', []) }}">View Cart</a>
                                    </div>
                                    <ul class="shopping-list">
                                        <li>
                                            <a href="#" class="remove" title="Remove this item"><i
                                                    class="fa fa-remove"></i></a>
                                            <a class="cart-img" href="{{ url('product', []) }}"><img src=""
                                                    alt="#"></a>
                                            <h4><a href="{{ url('product', []) }}">Woman Ring</a></h4>
                                            <p class="quantity">1x - <span class="amount">$99.00</span></p>
                                        </li>
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Total</span>
                                            <span class="total-amount">$134.00</span>
                                        </div>
                                        <a href="{{ url('checkout', []) }}" class="btn animate">Checkout</a>
                                    </div>
                                </div>
                                <!--/ End Shopping Item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Inner -->
        <div class="header-inner">
            <div class="container">
                <div class="cat-nav-head">
                    <div class="row">
                        <div class="col-12">
                            <div class="menu-area">
                                <!-- Main Menu -->
                                <nav class="navbar navbar-expand-lg">
                                    <div class="navbar-collapse">
                                        <div class="nav-inner">
                                            <ul class="nav main-menu menu navbar-nav">
                                                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                                                <li><a href="{{ url('shopgrid') }}">Shop Grid</a></li>
                                                <li><a href="{{ url('cart') }}">Cart</a></li>
                                                <li><a href="{{ url('man') }}">Man</a></li>
                                                <li><a href="{{ url('women', []) }}">Woman</a></li>
                                                <li><a href="{{ url('kids', []) }}">Kids</a></li>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                                <!--/ End Main Menu -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Header Inner -->
    </header>
    <!--/ End Header -->

    @yield('containt')

    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Footer Top -->
        <div class="footer-top section">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer social">
                            <h4>Get In Tuch</h4>
                            <!-- Single Widget -->
                            <div class="contact">
                                <ul>
                                    <li>NO. 342 - London Oxford Street.</li>
                                    <li>012 United Kingdom.</li>
                                    <li>info@eshop.com</li>
                                    <li>+032 3456 7890</li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                            <ul>
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                <li><a href="#"><i class="ti-flickr"></i></a></li>
                                <li><a href="#"><i class="ti-instagram"></i></a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Top -->
        <div class="copyright">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="left">
                                <p>Copyright © 2020 <a href="http://www.wpthemesgrid.com">Wpthemesgrid</a> - All Rights
                                    Reserved.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="right">
                                <img src="images/payments.png" alt="#">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- /End Footer Area -->



    <!-- Jquery -->
    <script src="{{ url('js/jquery.min.js', []) }}"></script>
    <script src="{{ url('js/jquery-migrate-3.0.0.js', []) }}"></script>
    <script src="{{ url('js/jquery-ui.min.js', []) }}"></script>
    <!-- Popper JS -->
    <script src="{{ url('js/popper.min.js', []) }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ url('js/bootstrap.min.js', []) }}"></script>
    <!-- Slicknav JS -->
    <script src="{{ url('js/slicknav.min.js', []) }}"></script>
    <!-- Owl Carousel JS -->
    <script src="{{ url('js/owl-carousel.js', []) }}"></script>
    <!-- Magnific Popup JS -->
    <script src="{{ url('js/magnific-popup.js', []) }}"></script>
    <!-- Waypoints JS -->
    <script src="{{ url('js/waypoints.min.js', []) }}"></script>
    <!-- Countdown JS -->
    <script src="{{ url('js/finalcountdown.min.js', []) }}"></script>
    <!-- Nice Select JS -->
    <script src="{{ url('js/nicesellect.js', []) }}"></script>
    <!-- Flex Slider JS -->
    <script src="{{ url('js/flex-slider.js', []) }}"></script>
    <!-- ScrollUp JS -->
    <script src="{{ url('js/scrollup.js', []) }}"></script>
    <!-- Onepage Nav JS -->
    <script src="{{ url('js/onepage-nav.min.js', []) }}"></script>
    <!-- Easing JS -->
    <script ript src="{{ url('js/easing.js', []) }}"></script>
    <!-- Active JS -->
    <script src="{{ url('js/active.js', []) }}"></script>
</body>

</html>
