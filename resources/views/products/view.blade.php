@extends('layouts.login')
@section('content')
<style>
    .content {
        text-align: center;
    }    
    .title {
        font-size: 24px;
        padding-top: 10px;
    }
</style>
<div class="content">
        <div class="title m-b-md">
            Product Listing
        </div>
    </div>
    <hr />
<section class="py-5">    
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            
            @foreach($products as $y)                
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{ $y->product_name }}</h5>
                                <!-- Product price-->
                                ₹ {{ $y->product_price }}
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/products/{{ $y->id }}">View options</a></div>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
        <div class="container px-4 px-lg-5 mt-5">
            <div class="d-flex justify-content-center">
                {!! $products->links() !!}
            </div>
        </div>
    </div>
</section>
@stop