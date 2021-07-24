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
            My Orders
        </div>
    </div>
    <hr />
<section class="py-5">    
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Currency</th>
                    <th>Receipt</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->product->product_name }}</td>
                    <td>{{ $order->stripe_price / 100 }}</td>
                    <td>{{ $order->stripe_currency }}</td>
                    <td><a href="{{ $order->stripe_receipt_url }}">Receipt</a></td>
                    <td>{{ $order->stripe_status }}</td>
                </tr>							
                @endforeach
                @if(count($orders) == 0)
                <tr>
                    <td colspan="5" align="center">No Records Found.</td>
                </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="container px-4 px-lg-5 mt-5">
            <div class="d-flex justify-content-center">
                {!! $orders->links() !!}
            </div>
        </div>
    </div>
</section>
@stop