@extends('User.headerPage')
@section('title', 'Cart')
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
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a>Cart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Shopping Summery -->
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>PRODUCT</th>
                                <th>NAME</th>
                                <th class="text-center">UNIT PRICE</th>
                                <th class="text-center">QUANTITY</th>
                                <th class="text-center">TOTAL</th>
                                <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @if (session('cart'))
                                @foreach (session('cart') as $id => $details)
                                    @php
                                        $total += $details['price'] * $details['quantity'];
                                    @endphp
                                    <tr data-id="{{ $id }}">
                                        <td class="image" data-th="image"><img
                                                src="{{ url('images/' . $details['image'], []) }}"
                                                alt="{{ $details['image'] }}"></td>
                                        <td data-th="Product">
                                            <p class="product-name"><a href="">{{ $details['product_name'] }}</a></p>
                                        </td>
                                        <td data-th="Price">
                                            <span>{{ number_format($details['price']) }}</span>
                                        </td>
                                        <td data-th="Quantity">
                                            <!-- Input Order -->
                                            <form action="{{ route('update_cart', $id) }}" method="post">
                                                @csrf
                                                <div
                                                    class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                                                    <div class="col">
                                                        <input type="number" name="quantity" min="1"
                                                            class="input-numberc" value="{{ $details['quantity'] }}">
                                                    </div>
                                                    <div class="col">
                                                        <input type="submit" class="btn" value="Update">

                                                    </div>

                                                </div>

                                            </form>
                                            <!--/ End Input Order -->
                                        </td>
                                        <td data-th="Total">
                                            <span>{{ number_format($details['price'] * $details['quantity']) }}
                                                VND
                                            </span>
                                        </td>
                                        <td class="action" data-th="Remove"><a href="{{ route('cart.remove', $id) }}"><i
                                                    class="ti-trash remove-icon"></i></a></td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->

                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-5 col-12">
                            </div>
                            <div class="col-lg-4 col-md-7 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal<span>{{ number_format($total) }} VND</span></li>
                                    </ul>
                                    <div class="button5">
                                        <a href="{{ route('checkout', []) }}" class="btn">Checkout</a>
                                        <a href="{{ route('shopgrid', []) }}" class="btn">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->
@endsection
