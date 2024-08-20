@extends('vendor.layouts.master')
@section('title')
    {{$settings->site_name}} || Dashboard
@endsection
@section('content')
    <section id="wsus__dashboard">
        <style>
            .wsus__dashboard_item {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                text-align: center;
                width: 100%; /* Ensures the item fills its container */
                height: 150px; /* Adjust the height as needed */
                margin-bottom: 20px; /* Add space between boxes */
                padding: 10px; /* Add padding inside the boxes */
                border-radius: 5px; /* Optional: add rounded corners */
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Optional: add shadow for better visibility */
            }
        </style>
        <div class="container-fluid">
            @include('vendor.layouts.sidebar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content">
                        <div class="wsus__dashboard">
                            <div class="row">
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="{{route('vendor.orders.index')}}">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Today's Orders</p>
                                        <h4 style="color:#ffff">{{$todaysOrder}}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="{{route('vendor.orders.index')}}">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Today's Pending Orders</p>
                                        <h4 style="color:#ffff">{{$todaysPendingOrder}}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="{{route('vendor.orders.index')}}">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Total Orders</p>
                                        <h4 style="color:#ffff">{{$totalOrder}}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="{{route('vendor.orders.index')}}">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Total Pending Orders</p>
                                        <h4 style="color:#ffff">{{$totalPendingOrder}}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="{{route('vendor.orders.index')}}">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Completed Orders</p>
                                        <h4 style="color:#ffff">{{$totalCompleteOrder}}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="{{route('vendor.products.index')}}">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Total Products</p>
                                        <h4 style="color:#ffff">{{$totalProducts}}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="javascript:;">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Today's Earnings</p>
                                        <h4 style="color:#ffff">{{$settings->currency_icon}}{{$todaysEarnings}}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="javascript:;">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>This Month's Earnings</p>
                                        <h4 style="color:#ffff">{{$settings->currency_icon}}{{$monthEarnings}}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="javascript:;">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>This Year's Earnings</p>
                                        <h4 style="color:#ffff">{{$settings->currency_icon}}{{$yearEarnings}}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="javascript:;">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Total Earnings</p>
                                        <h4 style="color:#ffff">{{$settings->currency_icon}}{{$toalEarnings}}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="{{route('vendor.reviews.index')}}">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Total Reviews</p>
                                        <h4 style="color:#ffff">{{$totalReviews}}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="{{route('vendor.shop-profile.index')}}">
                                        <i class="fas fa-user-shield"></i>
                                        <p>Shop Profile</p>
                                        <h4 style="color:#ffff">-</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
