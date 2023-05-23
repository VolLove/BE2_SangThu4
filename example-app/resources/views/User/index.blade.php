@extends('User.headerPage')
@section('title', 'Dashboard')
@section('containt')
    <!-- Slider Area -->
    <section class="hero-slider">
        <!-- Single Slider -->
        <div class="single-slider">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-9 offset-lg-3 col-12">
                        <div class="text-inner">
                            <div class="row">
                                <div class="col-lg-7 col-12">
                                    <div class="hero-text">
                                        <p>{{ $product }}</p>
                                        <div class="button">
                                            <a href="{{ route('shopgrid') }}" class="btn">Shop Now!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Single Slider -->
    </section>
    <!--/ End Slider Area -->

    <!-- Start Small Banner  -->
    <section class="small-banner section" style="padding: 100px 0">
        <div class="container-fluid">
            <div class="row">
                @foreach ($products as $product)
                    <!-- Single Banner  -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-banner">
                            <img src="https://via.placeholder.com/600x370" alt="#">
                            <div class="content">
                                <p>Man's Collectons</p>
                                <h3>Summer travel <br> collection</h3>
                                <a href="#">Discover Now</a>
                            </div>
                        </div>
                    </div>
                    <!-- /End Single Banner  -->
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Small Banner -->
@endsection
