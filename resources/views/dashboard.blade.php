@extends("layouts.admin-layout")
@section("title","Resturant Admin")
@section("content")
<?php


    $page = "main";
?>
<h2 class="mb-4">Overview</h2>
<div class="row g-4">
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card-custom1">
            <i class="fa-solid fa-users fa-2x mb-3"></i>
            <h4>Users</h4>
            <p class="mb-0">1,245 Active Users</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card-custom1">
            <i class="fa-solid fa-cart-shopping fa-2x mb-3"></i>
            <h4>Orders</h4>
            <p class="mb-0">325 New Orders</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12">
        <div class="card-custom1">
            <i class="fa-solid fa-chart-line fa-2x mb-3"></i>
            <h4>Sales</h4>
            <p class="mb-0">$12,500 This Month</p>
        </div>
    </div>
</div>

@endsection
