@extends('User.headerPage')
@section('title', 'Check out')
@section('containt')
    @if (session('cantsave'))
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
            {{ session('cantsave') }}
        </div>
    @endif
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="blog-single.html">Checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Checkout -->
    <section class="shop checkout section">
        <div class="container">
            <form class="form" method="post" action="{{ route('pay') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="checkout-form">
                            <h2>Make Your Checkout Here</h2>
                            <p>Please register in order to checkout more quickly</p>
                            @if (session('errors'))
                                <div class="alert alert-warning alert-dismissible" style="height: 100px;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
                                    {{ session('errors') }}
                                </div>
                            @endif
                            <!-- Form -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group create-account">
                                        <input id="cbox" type="checkbox" name="defaultInfo">
                                        <label>use default address</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Phone Number<span>*</span></label>
                                        <input type="tel" class="@error('phone') is-invalid @enderror" name="phone">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Address <span>*</span></label>
                                        <input type="text" class="@error('address') is-invalid @enderror" name="address">
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <!--/ End Form -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="order-details">
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>CART TOTALS</h2>
                                <div class="content">
                                    <ul>
                                        @php
                                            $total = 0;
                                            foreach ((array) session('cart') as $key => $value) {
                                                $total += $value['price'] * $value['quantity'];
                                            }
                                        @endphp
                                        <li>Sub Total<span>{{ number_format($total) }} VND</span></li>
                                        <li>(+) Shipping<span>{{ number_format(20000) }} VND</span></li>
                                        <input type="hidden" name="shipping" value="20000">
                                        <li class="last">Total<span>{{ number_format($total + 20000) }} VND</span></li>
                                    </ul>
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Button Widget -->
                            <div class="single-widget get-button">
                                <div class="content">
                                    <div class="button">
                                        <button type="submit" class="btn">proceed to checkout</button>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Button Widget -->
                        </div>
                    </div>
            </form>

        </div>
        </div>
    </section>
    <!--/ End Checkout -->

    <!-- Start Shop Services Area  -->
    <section class="shop-services section home">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Free shiping</h4>
                        <p>Orders over $100</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Free Return</h4>
                        <p>Within 30 days returns</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Sucure Payment</h4>
                        <p>100% secure payment</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>Best Peice</h4>
                        <p>Guaranteed price</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Services -->

    <!-- Start Shop Newsletter  -->
    <section class="shop-newsletter section">
        <div class="container">
            <div class="inner-top">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-12">
                        <!-- Start Newsletter Inner -->
                        <div class="inner">
                            <h4>Newsletter</h4>
                            <p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
                            <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                                <input name="EMAIL" placeholder="Your email address" required="" type="email">
                                <button class="btn">Subscribe</button>
                            </form>
                        </div>
                        <!-- End Newsletter Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Newsletter -->
@endsection
