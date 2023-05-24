@extends('User.headerPage')
@section('title', 'Dashboard')
@section('containt')

    <div class="container pt-1">
        <!--/ End Header -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible" style="height: 100px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>

                {{ session('success') }}
            </div>
        @endif
        @if (session('errors'))
            <div class="alert alert-warning alert-dismissible" style="height: 100px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
                {{ session('errors') }}
            </div>
        @endif
        @if (session('warning'))
            <div class="alert alert-danger alert-dismissible"style="height: 100px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i>Warning!</h5>
                {{ session('warning') }}
            </div>
        @endif
    </div>
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
                                        <p></p>
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
@endsection
